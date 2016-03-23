<?php

namespace Backend\Modules\Makelaars\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Makelaars module
 *
 * @author Stijn Schets <s>
 */
class Installer extends ModuleInstaller
{
    public function install()
    {
        // import the sql
        $this->importSQL(dirname(__FILE__) . '/Data/install.sql');

        // install the module in the database
        $this->addModule('Makelaars');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Makelaars');

        $this->setActionRights(1, 'Makelaars', 'Index');
        $this->setActionRights(1, 'Makelaars', 'Add');
        $this->setActionRights(1, 'Makelaars', 'Edit');
        $this->setActionRights(1, 'Makelaars', 'Delete');
        $this->setActionRights(1, 'makelaars', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('Makelaars', 'block', 'Makelaars');
        $this->insertExtra('Makelaars', 'block', 'MakelaarsDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Makelaars',
            'makelaars/index',
            array('makelaars/add','makelaars/edit')
        );

    }
}
