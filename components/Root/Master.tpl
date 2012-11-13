<?=$this->doctype('XHTML1_STRICT');?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?=$this->component($this->title);?>
        <?=$this->assets('Frontend');?>
        <?=$this->debugData();?>
        <link rel="shortcut icon" href="/assets/web/images/favicon.ico" />
    </head>
    <body class="frontend">
        <div id="page">
            <div id="outerHeader">
                <div id="header">&nbsp;</div>
            </div>
            <div id="outerContent">
                <div id="content">
                    <div id="innerContent">
                        <div style="width: <?=$this->componentWidth($this->data)?>px">
                            <?=$this->componentWithMaster($this->componentWithMaster);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
