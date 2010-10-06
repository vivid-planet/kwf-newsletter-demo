<? if (count($this->menu)) { ?>
    <div class="<?=$this->cssClass;?>">
        <ul>
            <? foreach ($this->menu as $i=>$m) { ?>
                <?
                $imagePath = preg_replace('/[^A-Za-z0-9]/i','',$m->name);
                $imagePath = strtolower(substr($imagePath, 0, 1)).substr($imagePath, 1).'.png';
                ?>
                <li class="<?=$m->class;?>">
                    <?=$this->componentLink($m, '<img src="/assets/web/images/mainMenuIcon/'.$imagePath.'" alt="'.$m->name.'" />');?>
                </li>
            <? } ?>
        </ul>
        <div class="clear"></div>
    </div>
<? } ?>
