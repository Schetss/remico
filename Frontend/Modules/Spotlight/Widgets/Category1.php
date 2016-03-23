<?php

namespace Frontend\Modules\Spotlight\Widgets;

use Frontend\Core\Engine\Base\Widget;
use Frontend\Core\Engine\Navigation;
use Frontend\Modules\Spotlight\Engine\Model as FrontendSpotlightModel;

/**
 * This is a widget with the Spotlight-categories
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Category1 extends Widget
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
        $Category1a = FrontendSpotlightModel::getAllCategory1a();
        $this->tpl->assign('widgetCategory1a', $Category1a);

        $Category1b = FrontendSpotlightModel::getAllCategory1b();
        $this->tpl->assign('widgetCategory1b', $Category1b);

        $Category1c = FrontendSpotlightModel::getAllCategory1c();
        $this->tpl->assign('widgetCategory1c', $Category1c);
    }
}
