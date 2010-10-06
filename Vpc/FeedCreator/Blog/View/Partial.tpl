<a name="<?= $this->item->componentId; ?>"></a>
<div class="entry">
    <div class="text">
        <h2>
            <?=$this->ifHasContent($this->item);?>
                <?=$this->componentLink($this->item);?>
            <?=$this->ifHasContent();?>
            <?=$this->ifHasNoContent($this->item);?>
                <?=$this->item->row->title?>
            <?=$this->ifHasNoContent();?>
        </h2>
    </div>
    <div class="publishDate">
        <?=$this->date($this->item->publish_date);?>
        <?
        $cats = $this->item->categories;
        if ($cats) { ?>
            | <?=trl('Category')?>:
            <? $nci = 0;
            foreach ($cats as $nc) {
                if ($nci++ >= 1) echo ', ';
                echo $this->componentLink($nc);
            }
        } ?>
    </div>

    <div class="clear"></div>

    <div class="teaser">
        <p><?=$this->mailEncodeText($this->item->row->teaser);?></p>
        <p class="readMore">
            <?=$this->ifHasContent($this->item);?>
                <?=$this->componentLink($this->item, $this->item->trlVps('Read more') . ' &raquo;');?>
            <?=$this->ifHasContent();?>
        </p>
    </div>
    <div class="clear"></div>
</div>
