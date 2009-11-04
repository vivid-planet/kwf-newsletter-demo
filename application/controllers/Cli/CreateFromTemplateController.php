<?php
class Cli_CreateFromTemplateController extends Vps_Controller_Action_Cli_Abstract
{
    public static function getHelp()
    {
        return "create a new web from the template";
    }

    public static function getHelpOptions()
    {
        return array(
            array(
                'param'=> 'id',
                'value'=>'id',
                'allowBlank' => false,
                'help' => 'unique appliaction id'
            ),
            array(
                'param'=> 'className',
                'value'=>'Name',
                'allowBlank' => true,
                'help' => '(optional) name prefix for classes (Vps_ClassName); without Vps_'
            ),
            array(
                'param'=> 'name',
                'value'=>'Name',
                'allowBlank' => false,
                'help' => 'application name'
            ),
            array(
                'param'=> 'debug',
                'help' => 'debug output'
            )
        );
    }

    public function indexAction()
    {
        $id = $this->_getParam('id');
        if (!preg_match('#^[a-z0-9-]+$#', $id)) {
            throw new Vps_ClientException("Invalid id");
        }

        $name = $this->_getParam('name');

        $className = $this->_getParam('className');
        if (!$className) {
            $className = preg_replace('#[^a-z0-9]#i', '', $name);
        }
        if (!preg_match('#^[a-zA-Z0-9]+$#', $className)) {
            throw new Vps_ClientException("Invalid className");
        }
        

        echo "id: $id\n";
        echo "className: $className (Vps_$className)\n";
        echo "name: $name\n";
        echo "continue?  [Y/n]";
        $stdin = fopen('php://stdin', 'r');
        $input = trim(strtolower(fgets($stdin, 2)));
        fclose($stdin);
        if (!($input == '' || $input == 'j' || $input == 'y')) {
            exit;
        }

        $debug = $this->_getParam('debug');

        $webs = explode("\n", `svn ls http://svn/trunk/vps-projekte`);
        if (in_array($id.'/', $webs)) {
            throw new Vps_ClientException("Web $id exists already in svn");
        }

        $info = new SimpleXMLElement(`svn info --xml`);
        $sourceSvnUrl = (string)$info->entry->url;
        $svnUrl = "http://svn/trunk/vps-projekte/$id";


        $cmd = "svn cp $sourceSvnUrl $svnUrl -m \"Neues Web von Template erstellt\"";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $tmp = tempnam('/tmp', 'cft');
        unlink($tmp);
        $cmd = "svn co $svnUrl $tmp";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "svn rm $tmp/application/controllers/Cli";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "svn mv $tmp/Vps/Template $tmp/Vps/$className";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "svn mv $tmp/Vpc/Template $tmp/Vpc/$className";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "find $tmp -name '*.php' | xargs perl -p -i -e 's/Vps_Template_/Vps_{$className}_/g'";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "find $tmp -name '*.php' | xargs perl -p -i -e 's/Vpc_Template_/Vpc_{$className}_/g'";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cfg = file_get_contents($tmp.'/application/config.ini');
        $cfg = str_replace('template', $id, $cfg);
        $cfg = str_replace('Vps_Template_', "Vps_{$className}_", $cfg);
        $cfg = str_replace('Vpc_Template_', "Vpc_{$className}_", $cfg);
        $cfg = str_replace('Vps Template', $name, $cfg);
        file_put_contents($tmp.'/application/config.ini', $cfg);

        $cmd = "svn ci $tmp -m \"Template für neues Web angepasst\"";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);


        $cmd = "echo \"CREATE DATABASE $id\" | mysql";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cfg = Vps_Registry::get('dao')->getDbConfig();
        $cmd = "mysqldump $cfg[dbname] | mysql $id";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);


        //checkout in public
        $cmd = "svn up /www/public/vps-projekte/$id";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        copy("/www/public/vps-projekte/template/application/include_path", "/www/public/vps-projekte/$id/application/include_path");
        $cfg = file_get_contents("/www/public/vps-projekte/template/application/config.db.ini");
        $cfg = str_replace('template', $id, $cfg);
        file_put_contents("/www/public/vps-projekte/$id/application/config.db.ini", $cfg);

        $cmd = "cd /www/public/vps-projekte/$id && php bootstrap.php update";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);


        //uploads von template kopieren
        $cfg = new Vps_Config_Web('vivid', array('webPath' => "/www/public/vps-projekte/$id"));
        $cmd = "cp -r ".Vps_Registry::get('config')->uploads." $cfg->uploads";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        //checkout bei user
        $cmd = "svn co $svnUrl ../$id";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        copy("application/include_path", "../$id/application/include_path");
        $cfg = file_get_contents("application/config.db.ini");
        $cfg = str_replace('template', $id, $cfg);
        file_put_contents("../$id/application/config.db.ini", $cfg);

        $cmd = "cd ../$id && php bootstrap.php import --server=vivid";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        echo "\nfertig.\n";
        exit;
    }
}
