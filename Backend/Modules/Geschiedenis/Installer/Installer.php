<?php

namespace Backend\Modules\Geschiedenis\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Geschiedenis module
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
        $this->addModule('Geschiedenis');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Geschiedenis');

        $this->setActionRights(1, 'Geschiedenis', 'Index');
        $this->setActionRights(1, 'Geschiedenis', 'Add');
        $this->setActionRights(1, 'Geschiedenis', 'Edit');
        $this->setActionRights(1, 'Geschiedenis', 'Delete');

        // add extra's
        $subnameID = $this->insertExtra('Geschiedenis', 'block', 'Geschiedenis');
        $this->insertExtra('Geschiedenis', 'block', 'GeschiedenisDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Geschiedenis',
            'geschiedenis/index',
            array('geschiedenis/add','geschiedenis/edit')
        );

    }
}
