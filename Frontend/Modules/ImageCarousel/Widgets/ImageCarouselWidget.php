<?php

namespace Frontend\Modules\ImageCarousel\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\ImageCarousel\Engine\Model as FrontendImageCarouselModel;

/**
 * This is a widget for the Kopen - Verkopen
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class ImageCarouselWidget extends FrontendBaseWidget
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
        $ImageCarouselWidget = FrontendImageCarouselModel::getAllImageCarousel();
        $this->tpl->assign('widgetImageCarousel', $ImageCarouselWidget);
    }
}
