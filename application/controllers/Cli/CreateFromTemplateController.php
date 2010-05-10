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
                'allowBlank' => true,
                'help' => '(optional) unique appliaction id'
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

        $name = $this->_getParam('name');

        $className = $this->_getParam('className');
        if (!$className) {
            $className = preg_replace('#[^a-z0-9]#i', '', $name);
        }
        if (!preg_match('#^[a-zA-Z0-9]+$#', $className)) {
            throw new Vps_ClientException("Invalid className");
        }
        $id = $this->_getParam('id');
        if (!$id) {
            $id = strtolower($name);
        }
        $id = preg_replace('#[^a-z0-9]#i', '', $id);

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
        $templatePath = getcwd();
        $dbCfg = Vps_Registry::get('dao')->getDbConfig(); //holen bevor ordner gewechselt wird


        $cmd = "ssh git.vivid-planet.com -C 'bash -c \"if [ -d /git/$id ]; then exit 1; else exit 0; fi\"'";
        $ret = null;
        system($cmd, $ret);
        if ($ret == 1) {
            echo "Web $id exists already in git.vivid-planet.com/git/$id\n";
            exit;
        }

        if (file_exists('../'.$id)) {
            echo "Working Copy for Web exists already at ../$id\n";
            exit;
        }

        $cmd = "ssh git.vivid-planet.com -C 'cp -r /git/template /git/$id'";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $tmp = tempnam('/tmp', 'cft');
        unlink($tmp);
        $cmd = "git clone ssh://git.vivid-planet.com/git/$id ../$id";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);
        chdir("../$id");

        $cmd = "git rm -r application/controllers/Cli";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "git mv Vps/Template Vps/$className";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "git mv Vpc/Template Vpc/$className";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "find . -name '*.php' | xargs perl -p -i -e 's/Vps_Template_/Vps_{$className}_/g'";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "find . -name '*.php' | xargs perl -p -i -e 's/Vpc_Template_/Vpc_{$className}_/g'";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cfg = file_get_contents('application/config.ini');
        $cfg = str_replace('template', $id, $cfg);
        $cfg = str_replace('Vps_Template_', "Vps_{$className}_", $cfg);
        $cfg = str_replace('Vpc_Template_', "Vpc_{$className}_", $cfg);
        $cfg = str_replace('Vps Template', $name, $cfg);
        file_put_contents('application/config.ini', $cfg);

        $cmd = "git commit -am \"Template fuer neues Web angepasst\"";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        if (file_exists($templatePath."/application/include_path")) {
            copy($templatePath."/application/include_path", "application/include_path");
        }
        if (file_exists($templatePath."/application/update")) {
            copy($templatePath."/application/update", "application/update");
        }
        $cfg = file_get_contents($templatePath."/application/config.db.ini");
        $cfg = str_replace('template', $id, $cfg);
        file_put_contents("application/config.db.ini", $cfg);
        $newDbConfig = new Zend_Config_Ini('application/config.db.ini', 'database');
        $newDbConfig = $newDbConfig->web->toArray();

        $cmd = "echo \"SHOW DATABASES\" | mysql";
        if ($debug) echo "$cmd\n";
        exec($cmd, $databases);
        if (in_array($newDbConfig['dbname'], $databases)) {
            echo "Database $newDbConfig[dbname] exists already\n";
            echo "Delete the existing database? [N/y]";
            $stdin = fopen('php://stdin', 'r');
            $input = trim(strtolower(fgets($stdin, 2)));
            fclose($stdin);
            if (!($input == 'j' || $input == 'y')) {
                exit;
            }
            $cmd = "echo \"DROP DATABASE $newDbConfig[dbname]\" | mysql";
            if ($debug) echo "$cmd\n";
            $this->_systemCheckRet($cmd);
        }

        $cmd = "echo \"CREATE DATABASE $newDbConfig[dbname]\" | mysql";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "mysqldump $dbCfg[dbname] | mysql $newDbConfig[dbname]";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);


        $cmd = "php bootstrap.php update";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "php bootstrap.php create-users";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cfg = new Vps_Config_Web(Vps_Setup::getConfigSection(), array('webPath' => getcwd()));
        $cmd = "cp -r ".Vps_Registry::get('config')->uploads." $cfg->uploads";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        echo "\nfertig.\n";
        exit;
    }
}
