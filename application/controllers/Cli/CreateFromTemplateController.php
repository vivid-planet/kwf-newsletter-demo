<?php
class Cli_CreateFromTemplateController extends Vps_Controller_Action_Cli_Abstract
{
    public static function getHelp()
    {
        return "generate benchmark-log statistics";
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
                'help' => 'name prefix for classes (Vps_Foo)'
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
            ),
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
        $debug = $this->_getParam('debug');

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

        $cmd = "find -name '*.php' $tmp | xargs perl -p -i -e ’s/Vps_Template_/Vps_$className_/g’";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cmd = "find -name '*.php' $tmp | xargs perl -p -i -e ’s/Vpc_Template_/Vpc_$className_/g’";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        $cfg = file_get_contents($tmp.'/application/config.ini');
        $cfg = str_replace($cfg, 'template', $id);
        $cfg = str_replace($cfg, 'Vps_Template_', "Vps_$className_");
        $cfg = str_replace($cfg, 'Vpc_Template_', "Vpc_$className_");
        $cfg = str_replace($cfg, 'Vps Template', $name);
        file_put_contents($tmp.'/application/config.ini', $cfg);

        $cmd = "svn ci $tmp -m \"Template für neues Web angepasst\"";
        if ($debug) echo "$cmd\n";
        $this->_systemCheckRet($cmd);

        echo "\nfertig.\n";
        exit;
    }
}
