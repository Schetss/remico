<?php

namespace Frontend\Modules\Makelaars\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Makelaars\Engine\Model as FrontendMakelaarsModel;

/**
 * This is a widget for the Makelaars
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class GeertWidget extends FrontendBaseWidget
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
        $GeertWidget = FrontendMakelaarsModel::getGeert();
        $this->tpl->assign('widgetGeert', $GeertWidget);
    }
}
