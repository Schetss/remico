<?php

namespace Frontend\Modules\SmallBlocks\Widgets;

use Frontend\Core\Engine\Base\Widget;
use Frontend\Core\Engine\Navigation;
use Frontend\Modules\SmallBlocks\Engine\Model as FrontendSmallBlocksModel;

/**
 * This is a widget with the Small blocks-categories
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Category1Widget extends Widget
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
        // get categories
        $Category1Widget = FrontendSmallBlocksModel::getAllCategory1();
        $this->tpl->assign('widgetCategory1', $Category1Widget);
    }
}
