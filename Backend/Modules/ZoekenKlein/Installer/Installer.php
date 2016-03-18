<?php

namespace Backend\Modules\ZoekenKlein\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Zoeken Klein module
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
        $this->addModule('ZoekenKlein');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'ZoekenKlein');

        $this->setActionRights(1, 'ZoekenKlein', 'Index');
        $this->setActionRights(1, 'ZoekenKlein', 'Add');
        $this->setActionRights(1, 'ZoekenKlein', 'Edit');
        $this->setActionRights(1, 'ZoekenKlein', 'Delete');

        // add extra's
        $subnameID = $this->insertExtra('ZoekenKlein', 'block', 'ZoekenKlein');
        $this->insertExtra('ZoekenKlein', 'block', 'ZoekenKleinDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'ZoekenKlein',
            'zoeken_klein/index',
            array('zoeken_klein/add','zoeken_klein/edit')
        );

    }
}
