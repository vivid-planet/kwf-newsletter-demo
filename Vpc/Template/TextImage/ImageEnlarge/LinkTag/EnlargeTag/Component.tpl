<? if ($this->imageUrl) { ?>
<div class="vpsEnlargeTagData">
    <? if($this->row->show_link) { ?>
    <p class="link"><?=$this->component($this->link)?></p>
    <? } ?>
</div>
<a href="<?=$this->imageUrl?>" rel="enlarge_<?=$this->width?>_<?=$this->height?>">
    <p class="vpsEnlargeTagData title"><?=$this->row->title?></p>
    <input type="hidden" class="options" value="<?=htmlspecialchars(Zend_Json::encode($this->options))?>" />
<? } ?>