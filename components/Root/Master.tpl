<?=$this->doctype('XHTML1_STRICT');?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?=$this->component($this->boxes['title']);?>
        <?=$this->component($this->boxes['metaTags']);?>
        <?=$this->assets('Frontend');?>
        <?=$this->debugData();?>
        <link rel="shortcut icon" href="/assets/web/images/favicon.ico" /> 
    </head>
    <body class="frontend">
        <div id="page">
            <div id="outerHeader">
                <div id="header">
                    <div class="left" id="logo">
                        <a href="/">
                            <?=$this->image('/assets/web/images/logo.png','RegioTool');?>
                        </a>
                    </div>
                    <div id="slogan" class="webStandard">
                        The open source framework for <span class="rich">rich websites</span> and <span class="smart">smart backends</span>
                    </div>
                    <div class="clear"></div>
                    <div id="mainMenu">
                        <?=$this->component($this->boxes['mainMenu']);?>
                    </div>
                </div>
            </div>
            <div id="outerContent">
                <div id="content">
                    <?if ($this->hasContent($this->boxes['subMenu'])) {?>
                        <div class="left" id="subMenu">
                            <?=$this->component($this->boxes['subMenu']);?>
                        </div>
                    <?}?>
                    <div class="left" id="innerContent" style="width:<?=$this->componentWidth($this->data)?>px;">
                        <?=$this->component($this->data);?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="outerFooter">
                <div id="footer" class="webStandard">
                    <div class="menu">
                        <?=$this->component($this->boxes['bottomMenu']);?>
                    </div>
                    <div class="vivid">
                        <a href="http://www.vivid-planet.com" title="Vivid Planet Software GmbH" rel="popup_blank">
                            <img src="/assets/web/images/vividPlanetDark.png" alt="Vivid Planet Software GmbH" />
                        </a>
                    </div>
                    <div class="based">
                        <p>KOALA web framework is an open source software of Vivid Planet Software GmbH</p>
                        <p>Based on
                            <a href="http://www.sencha.com/products/extjs/" rel="popup_blank">
                                <?=$this->image('/assets/web/images/extjs.png', 'ExtJS')?>
                            </a>
                            and
                            <a href="http://framework.zend.com/" rel="popup_blank">
                                <?=$this->image('/assets/web/images/zend.png', 'Zend Framework')?>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <?=$this->statisticCode();?>
    </body>
</html>
