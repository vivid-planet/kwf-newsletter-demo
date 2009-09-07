<?= $this->doctype('XHTML1_STRICT') ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>404 - File not found - Titel</title>
        <?= $this->assets('Frontend') ?>
        <?= $this->debugData() ?>
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
                        <p><strong>Fehlermeldung</strong></p>
                        <h2>404 - File not found</h2>
                        <p>Leider ist die eingegebene Adresse (<strong><?= $this->requestUri ?></strong>) auf dieser Seite nicht vorhanden.</p>
                        <ul>
                            <li>
                                Wenn Sie die Adresse selbst eingegeben haben, überprüfen Sie die Schreibweise.<br/>
                                Beachten Sie die Groß- und Kleinschreibung!!
                            </li>
                            <li>
                                Überprüfen Sie die Seite, von der Sie gekommen sind.<br/><br/>
                            </li>
                        </ul>
                        <p><strong><a href="/">&laquo; Zurück zur Startseite</a></strong></p>
                    </div>
                </div>
            </div>
            <div id="outerFooter">
                <div id="footer">&nbsp;</div>
            </div>
        </div>
        <?= $this->statisticCode() ?>
    </body>
</html>


