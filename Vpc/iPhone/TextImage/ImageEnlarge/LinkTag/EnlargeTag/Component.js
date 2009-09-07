
Vpc.Basic.ImageEnlarge.tplHeader = new Ext.XTemplate(
    '<span>{title}</span>',
    '<a class="closeButton" href="#">',
        ''+trlVps('close')+' X',
    '</a>',
    '{fullSizeLink}',
    '<div class="clear"></div>'
);

Vpc.Basic.ImageEnlarge.tplFooter = new Ext.XTemplate(
    '<div class="prevBtn">{previousImageButton}</div>',
    '<div class="title"><p class="title">{link}</p></div>',
    '<div class="nextBtn">{nextImageButton}</div>'
);
