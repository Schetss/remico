<?php

namespace Backend\Modules\SmallBlocks;

use Backend\Core\Engine\Base\Config as BaseConfig;

/**
 * This is the configuration-object for the Small blocks module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
final class Config extends BaseConfig
{
    /**
     * The default action
     *
     * @var string
     */
    protected $defaultAction = 'Index';

    /**
     * The disabled actions
     *
     * @var array
     */
    protected $disabledActions = array();
}
