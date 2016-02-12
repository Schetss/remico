<?php

namespace Frontend\Modules\Mailchimp\Widgets;

use Frontend\Core\Engine\Base\Widget;
use Frontend\Core\Engine\Navigation;
use Frontend\Modules\Mailchimp\Engine\Model as FrontendMailchimpModel;

/**
 * This is a widget with the Mailchimp-categories
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class MailchimpSubscribe extends Widget
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
        $subscribe = FrontendMailchimpModel::getAllSubscribe();

        // // any categories?
        // if (!empty($categories)) {
        //     // build link
        //     $link = Navigation::getURLForBlock('Mailchimp', 'category');

        //     // loop and reset url
        //     foreach ($categories as &$row) {
        //         $row['url'] = $link . '/' . $row['url'];
        //     }
        // }

        // assign comments
        $this->tpl->assign('widgetMailchimpSubscribe', $subscribe);
    }
}
