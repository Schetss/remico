<?php

namespace Frontend\Modules\Geschiedenis\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Geschiedenis\Engine\Model as FrontendGeschiedenisModel;

/** Geschiedenis
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class GeschiedenisWidget extends FrontendBaseWidget
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
        $GeschiedenisWidget = FrontendGeschiedenisModel::getAllGeschiedenis();
        $this->tpl->assign('widgetGeschiedenis', $GeschiedenisWidget);
    }
}
