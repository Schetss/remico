<?php

namespace Frontend\Modules\OverOns\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\OverOns\Engine\Model as FrontendOverOnsModel;

/**
 * This is a widget for the Over Ons
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class OverOnsWidget extends FrontendBaseWidget
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
        $OverOnsWidget = FrontendOverOnsModel::getAllOverOns();
        $this->tpl->assign('widgetOverOns', $OverOnsWidget);
    }
}
