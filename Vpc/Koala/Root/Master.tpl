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
                    <div class="right" id="cityTool">
                        <a href="/citytool">
                            <?=$this->image('/assets/web/images/cityToolBanner.png','CityTool');?>
                        </a>
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
                    <div class="left<?if ($this->hasContent($this->boxes['subMenu'])) {?> withSub<?}?>" id="innerContent">
                        <?=$this->component($this->data);?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="outerFooter">
                <div id="footer" class="webStandard">
                    <?=$this->component($this->boxes['bottomMenu']);?>
                    <p><strong>RegioTool</strong> ist ein Produkt der Vivid Planet Software GmbH</p>
                    <a href="http://www.vivid-planet.com" title="Vivid Planet Software GmbH" rel="popup_blank">
                        <img src="/assets/web/images/vividPlanetDark.png" alt="Vivid Planet Software GmbH" />
                    </a>
                </div>
            </div>
        </div>
        <?=$this->statisticCode();?>
    </body>
</html>
