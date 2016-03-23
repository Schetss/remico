<?php

namespace Frontend\Modules\Testimonials\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Testimonials\Engine\Model as FrontendTestimonialsModel;

/**
 * This is a widget for the Testiomials
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class TestimonialsWidget extends FrontendBaseWidget
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
        $TestimonialsWidget = FrontendTestimonialsModel::getAllTestimonials();
        $this->tpl->assign('widgetTestimonials', $TestimonialsWidget);
    }
}
