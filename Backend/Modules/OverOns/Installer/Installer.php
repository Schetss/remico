<?php

namespace Backend\Modules\OverOns\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Over ons module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Installer extends ModuleInstaller
{
    public function install()
    {
        // import the sql
        $this->importSQL(dirname(__FILE__) . '/Data/install.sql');

        // install the module in the database
        $this->addModule('OverOns');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'OverOns');

        $this->setActionRights(1, 'OverOns', 'Index');
        $this->setActionRights(1, 'OverOns', 'Add');
        $this->setActionRights(1, 'OverOns', 'Edit');
        $this->setActionRights(1, 'OverOns', 'Delete');
        $this->setActionRights(1, 'over_ons', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('OverOns', 'block', 'OverOns');
        $this->insertExtra('OverOns', 'block', 'OverOnsDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'OverOns',
            'over_ons/index',
            array('over_ons/add','over_ons/edit')
        );

    }
}
