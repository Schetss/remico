<?php

namespace Frontend\Modules\Kopenverkopen\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Kopenverkopen\Engine\Model as FrontendKopenverkopenModel;

/**
 * This is a widget for the Kopen - Verkopen
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class KopenverkopenWidget extends FrontendBaseWidget
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
        $KopenverkopenWidget = FrontendKopenverkopenModel::getAllKopenVerkopen();
        $this->tpl->assign('widgetKopenVerkopen', $KopenverkopenWidget);
    }
}
