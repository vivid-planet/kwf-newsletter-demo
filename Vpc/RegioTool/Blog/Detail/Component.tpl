<div class="<?=$this->cssClass?>">
    <h1><?=$this->title;?></h1>
    <div class="publishDate">
        <?=$this->date($this->row->publish_date);?>
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
    <div class="infoContainer"><?=$this->component($this->content);?></div>
    <? if ($this->placeholder['backLink']) { ?>
        <p class="back clear">
            <?=$this->componentLink($this->data->parent, '&laquo; '.$this->placeholder['backLink']);?>
        </p>
    <? } ?>
</div>
