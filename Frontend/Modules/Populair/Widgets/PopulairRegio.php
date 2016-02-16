<?php

namespace Frontend\Modules\Populair\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Populair\Engine\Model as FrontendPopulairModel;

/**
 * This is a widget for the populaire regio's
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class PopulairRegio extends FrontendBaseWidget
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
        $PopulairRegio1 = FrontendPopulairModel::getAllRegio1();
        $this->tpl->assign('widgetPopulairRegio1', $PopulairRegio1);

        $PopulairRegio2 = FrontendPopulairModel::getAllRegio2();
        $this->tpl->assign('widgetPopulairRegio2', $PopulairRegio2);

        $PopulairRegio3 = FrontendPopulairModel::getAllRegio3();
        $this->tpl->assign('widgetPopulairRegio3', $PopulairRegio3);
    }
}
