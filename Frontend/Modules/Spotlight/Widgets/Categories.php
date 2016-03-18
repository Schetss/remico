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
        $categories = FrontendSpotlightModel::getAllCategories();

        // any categories?
        if (!empty($categories)) {
            // build link
            $link = Navigation::getURLForBlock('Spotlight', 'category');

            // loop and reset url
            foreach ($categories as &$row) {
                $row['url'] = $link . '/' . $row['url'];
            }
        }

        // assign comments
        $this->tpl->assign('widgetSpotlightCategories', $categories);
    }
}
