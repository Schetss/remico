<?php

namespace Frontend\Modules\Vastgoedzoeker\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Vastgoedzoeker\Engine\Model as FrontendVastgoedzoekerModel;

/**
 * This is a widget for the Vastgoedzoeker
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class ContentWidget extends FrontendBaseWidget
{
    /**
     * Execute the extra
     */
    public function execute()
    {
        parent::execute();
        $this->loadTemplate();
        $this->parse();
    }

    /**
    * Parse
    */

    private function parse()
    {
        $canonicalUrl = '';

        if (isset($_GET['ref']) && $_GET['ref'] != '') {
            $canonicalUrl = htmlspecialchars($_GET['ref']);
        }

        $this->content = FrontendVastgoedzoekerModel::getContent($canonicalUrl);
      
        $this->contentdetail = FrontendVastgoedzoekerModel::getDetailsE($canonicalUrl);

        $this->contentdetail2 = FrontendVastgoedzoekerModel::getDetailsV($canonicalUrl);
        
        if($this->content != array(0)) {
            $this->tpl->assign('content', $this->content['d']['EstateList']);
        }

        else {
             $this->tpl->assign('content',  "");
        }

        if($this->contentdetail != array(0)) {
            $this->tpl->assign('contentdetail', $this->contentdetail);
        }

        else {
            $this->tpl->assign('contentdetail',  "");
        }

        if($this->contentdetail2 != array(0)) {
            $this->tpl->assign('contentdetail2', $this->contentdetail2);
        }

        else {
            $this->tpl->assign('contentdetail2',  "");
        }
      

        $this->content2 = FrontendVastgoedzoekerModel::getContentChild($canonicalUrl);
        
        if($this->content2 != array(0)) {
            $this->tpl->assign('contentChild', $this->content2['d']['EstateList']);
        }
        else {
            $this->tpl->assign('contentChild',  "");
        }
    }


}
