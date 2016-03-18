<?php

namespace Backend\Modules\Diensten\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Diensten module
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
        $this->addModule('Diensten');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Diensten');

        $this->setActionRights(1, 'Diensten', 'Index');
        $this->setActionRights(1, 'Diensten', 'Add');
        $this->setActionRights(1, 'Diensten', 'Edit');
        $this->setActionRights(1, 'Diensten', 'Delete');
        $this->setActionRights(1, 'diensten', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('Diensten', 'block', 'Diensten');
        $this->insertExtra('Diensten', 'block', 'DienstenDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Diensten',
            'diensten/index',
            array('diensten/add','diensten/edit')
        );

    }
}
