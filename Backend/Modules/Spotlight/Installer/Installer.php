<?php

namespace Backend\Modules\Spotlight\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Spotlight module
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
        $this->addModule('Spotlight');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Spotlight');

        $this->setActionRights(1, 'Spotlight', 'Index');
        $this->setActionRights(1, 'Spotlight', 'Add');
        $this->setActionRights(1, 'Spotlight', 'Edit');
        $this->setActionRights(1, 'Spotlight', 'Delete');
        $this->setActionRights(1, 'Spotlight', 'Categories');
        $this->setActionRights(1, 'Spotlight', 'AddCategory');
        $this->setActionRights(1, 'Spotlight', 'EditCategory');
        $this->setActionRights(1, 'Spotlight', 'DeleteCategory');
        $this->setActionRights(1, 'Spotlight', 'SequenceCategories');
        $this->setActionRights(1, 'populair', 'Sequence');

        $this->insertExtra('Spotlight', 'block', 'SpotlightCategory', 'Category', null, 'N', 1002);
        $this->insertExtra('Spotlight', 'widget', 'Categories', 'Categories', null, 'N', 1003);


        // add extra's
        $subnameID = $this->insertExtra('Spotlight', 'block', 'Spotlight');
        $this->insertExtra('Spotlight', 'block', 'SpotlightDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationSpotlightId = $this->setNavigation($navigationModulesId, 'Spotlight');
        $this->setNavigation(
            $navigationSpotlightId,
            'Spotlight',
            'spotlight/index',
            array('spotlight/add', 'spotlight/edit')
        );
        $this->setNavigation(
            $navigationSpotlightId,
            'Categories',
            'spotlight/categories',
            array('spotlight/add_category', 'spotlight/edit_category')
        );

    }
}
