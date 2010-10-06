<div class="entry">
    <span class="publishDate">
        <?=$this->date($this->item->row->publish_date)?><br/>
    </span>
    <strong><?=$this->componentLink($this->item->parent, $this->item->name, null, array(), $this->item->componentId)?></strong>
</div>
