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
class Categories extends Widget
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
        $categories = FrontendSmallBlocksModel::getAllCategories();

        // any categories?
        if (!empty($categories)) {
            // build link
            $link = Navigation::getURLForBlock('SmallBlocks', 'category');

            // loop and reset url
            foreach ($categories as &$row) {
                $row['url'] = $link . '/' . $row['url'];
            }
        }

        // assign comments
        $this->tpl->assign('widgetSmallBlocksCategories', $categories);
    }
}
