<div class="<?=$this->cssClass?>">
    <? if ($this->authedUser) { ?>
        <div class="account">
            <ul>
                <li class="mail"><?=$this->authedUser->email;?></li>
                <? if ($this->myProfile) { ?>
                <li class="profile">
                    <?=$this->componentLink($this->myProfile, '
                        <span class="beforeButton"></span>
                        <span class="button">'.trlVps('My Profile').'</span>
                        <span class="afterButton"></span>
                    ');?>
                    <div class="clear"></div>
                </li>
                <? } ?>
                <? foreach ($this->links as $l) { ?>
                    <li>
                        <?=$this->componentLink($l, '
                            <span class="beforeButton"></span>
                            <span class="button">'.$l.'</span>
                            <span class="afterButton"></span>
                        ');?>
                        <div class="clear"></div>
                    </li>
                <? } ?>
                <li class="upgrade">
                    <a href="?upgrade">
                        <span class="beforeButton"></span>
                        <span class="button"><?=trlVps('Upgrade');?></span>
                        <span class="afterButton"></span>
                        <div class="clear"></div>
                    </a>
                </li>
                <li class="logout">
                    <a href="?logout">
                        <span class="beforeButton"></span>
                        <span class="button"><?=trlVps('Logout');?></span>
                        <span class="afterButton"></span>
                        <div class="clear"></div>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    <? } else { ?>
        <ul>
            <li>
                <?=$this->componentLink($this->login, '
                    <span class="beforeButton"></span>
                    <span class="button">'.trlVps('Login').'</span>
                    <span class="afterButton"></span>
                ');?>
                <div class="clear"></div>
            </li>
            <li class="register">
                <?=$this->componentLink($this->register, '
                    <span class="beforeButton"></span>
                    <span class="button">'.trlVps('Register').'</span>
                    <span class="afterButton"></span>
                ');?>
                <div class="clear"></div>
            </li>
            <? if ($this->lostPassword) { ?>
                <li>
                    <?=$this->componentLink($this->lostPassword, '
                        <span class="beforeButton"></span>
                        <span class="button">'.trlVps('Lost password').'</span>
                        <span class="afterButton"></span>
                    ');?>
                    <div class="clear"></div>
                </li>
            <? } ?>
        </ul>
    <? } ?>
</div>
