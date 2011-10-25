<div class="<?=$this->cssClass;?> kwfTabs">
    <?
    $i = 0;
    foreach ($this->listItems as $child) {
        $class = 'listItem ';
        if ($i == 0) $class .= 'kwcFirst ';
        if ($i == count($this->children)-1) $class .= 'kwcLast ';
        if ($i % 2 == 0) {
            $class .= 'kwcEven ';
        } else {
            $class .= 'kwcOdd ';
        }
        $class = trim($class);
        ?>
        <div class="<?=$class;?> kwfTabsLink <? if ($i == 0) echo 'kwfTabsLinkActive'; ?>">
            <div class="beforeTab"></div>
            <div class="tab"><?=$child['title'];?></div>
            <div class="afterTab"></div>
            <div class="clear"></div>
        </div>
        <div class="<?=$class;?> kwfTabsContent <? if ($i == 0) echo 'kwfTabsContentActive'; ?>">
            <?=$this->component($child['data']);?>
        </div>
        <?
        $i++;
    } ?>
</div>
