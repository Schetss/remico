<?php

namespace Backend\Modules\Vastgoedzoeker\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Vastgoedzoeker module
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
        $this->addModule('Vastgoedzoeker');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Vastgoedzoeker');

        $this->setActionRights(1, 'Vastgoedzoeker', 'Index');
        $this->setActionRights(1, 'Vastgoedzoeker', 'Add');
        $this->setActionRights(1, 'Vastgoedzoeker', 'Edit');
        $this->setActionRights(1, 'Vastgoedzoeker', 'Delete');
        $this->setActionRights(1, 'vastgoedzoeker', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('Vastgoedzoeker', 'block', 'Vastgoedzoeker');
        $this->insertExtra('Vastgoedzoeker', 'block', 'VastgoedzoekerDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Vastgoedzoeker',
            'vastgoedzoeker/index',
            array('vastgoedzoeker/add','vastgoedzoeker/edit')
        );

    }
}
