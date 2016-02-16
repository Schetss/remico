<?php

namespace Backend\Modules\Kopenverkopen\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the kopenverkopen module
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
        $this->addModule('Kopenverkopen');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Kopenverkopen');

        $this->setActionRights(1, 'Kopenverkopen', 'Index');
        $this->setActionRights(1, 'Kopenverkopen', 'Add');
        $this->setActionRights(1, 'Kopenverkopen', 'Edit');
        $this->setActionRights(1, 'Kopenverkopen', 'Delete');
        $this->setActionRights(1, 'kopenverkopen', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('Kopenverkopen', 'block', 'Kopenverkopen');
        $this->insertExtra('Kopenverkopen', 'block', 'KopenverkopenDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Kopenverkopen',
            'kopenverkopen/index',
            array('kopenverkopen/add','kopenverkopen/edit')
        );

    }
}
