<?php

namespace Frontend\Modules\Vastgoedzoeker\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Vastgoedzoeker\Engine\Model as FrontendVastgoedzoekerModel;

/**
 * This is a widget for the Vastgoedzoeker
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class NederlandsWidget extends FrontendBaseWidget
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
        $this->list = FrontendVastgoedzoekerModel::getNed();
        $this->count = FrontendVastgoedzoekerModel::getCount();

        $this->tpl->assign('list', (array)$this->list);
        $this->tpl->assign('estatelist', $this->list['d']['EstateList']);

        $this->tpl->assign('estatecount', $this->count);
    }
}
