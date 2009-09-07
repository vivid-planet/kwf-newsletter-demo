<?php
/**
 * @group web
 * checkt, ob links funktionieren
 */
class Linking extends Vps_Test_SeleniumTestCase
{
    function testLinking()
    {
        $this->open("/");
        $this->clickAndWait("link=Home");
    }
}