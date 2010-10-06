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
                            <img src="/assets/web/images/logo.jpg" alt="FeedCreator" />
                        </a>
                    </div>
                    <div class="right" id="login">
                        <?=$this->component($this->boxes['userBox']);?>
                    </div>
                    <div class="clear"></div>
                    <div id="mainMenu">
                        <?=$this->component($this->boxes['mainMenu']);?>
                    </div>
                </div>
            </div>
            <div id="outerContent">
                <div id="content">
                    <div class="left" id="subMenu">
                        <?=$this->component($this->boxes['subMenu']);?>
                        <?=$this->component($this->boxes['blogCategories']);?>
                    </div>
                    <div class="left<?=$this->ifHasContent($this->boxes['subMenu']);?> withSub<?=$this->ifHasContent();?><?=$this->ifHasContent($this->boxes['blogCategories']);?> withSub<?=$this->ifHasContent();?>" id="innerContent">
                        <?=$this->component($this->data);?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="outerFooter">
                <div id="footer">
                    <?=$this->component($this->boxes['bottomMenu']);?>
                </div>
            </div>
        </div>
        <?=$this->statisticCode();?>
    </body>
</html>
