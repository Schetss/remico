<?php

namespace Backend\Modules\Testimonials\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Testimonials module
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
        $this->addModule('Testimonials');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Testimonials');

        $this->setActionRights(1, 'Testimonials', 'Index');
        $this->setActionRights(1, 'Testimonials', 'Add');
        $this->setActionRights(1, 'Testimonials', 'Edit');
        $this->setActionRights(1, 'Testimonials', 'Delete');

        // add extra's
        $subnameID = $this->insertExtra('Testimonials', 'block', 'Testimonials');
        $this->insertExtra('Testimonials', 'block', 'TestimonialsDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'Testimonials',
            'testimonials/index',
            array('testimonials/add','testimonials/edit')
        );

    }
}
