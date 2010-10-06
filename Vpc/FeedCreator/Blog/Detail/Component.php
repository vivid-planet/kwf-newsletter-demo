<?php
class Vpc_FeedCreator_Blog_Detail_Component extends Vpc_News_Detail_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['cssClass'] = 'webStandard';
        $ret['placeholder']['backLink'] = trlVps('Back to Overview');
        $ret['generators']['child']['component']['content'] = 'Vpc_Paragraphs_Component';
        return $ret;
    }
}
