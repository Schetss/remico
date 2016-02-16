<?php

namespace Backend\Modules\Populair\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Populair module
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
        $this->addModule('Populair');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Populair');

        $this->setActionRights(1, 'Populair', 'Index');
        $this->setActionRights(1, 'Populair', 'Add');
        $this->setActionRights(1, 'Populair', 'Edit');
        $this->setActionRights(1, 'Populair', 'Delete');
        $this->setActionRights(1, 'populair', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('Populair', 'block', 'Populair');
        $this->insertExtra('Populair', 'block', 'PopulairDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Populair',
            'populair/index',
            array('populair/add','populair/edit')
        );

    }
}
