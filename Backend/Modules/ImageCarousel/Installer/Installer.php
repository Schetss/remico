<?php

namespace Backend\Modules\ImageCarousel\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Image Carousel module
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
        $this->addModule('ImageCarousel');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'ImageCarousel');

        $this->setActionRights(1, 'ImageCarousel', 'Index');
        $this->setActionRights(1, 'ImageCarousel', 'Add');
        $this->setActionRights(1, 'ImageCarousel', 'Edit');
        $this->setActionRights(1, 'ImageCarousel', 'Delete');
        $this->setActionRights(1, 'image_carousel', 'Sequence');

        // add extra's
        $subnameID = $this->insertExtra('ImageCarousel', 'block', 'ImageCarousel');
        $this->insertExtra('ImageCarousel', 'block', 'ImageCarouselDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationclassnameId = $this->setNavigation(
            $navigationModulesId,
            'ImageCarousel',
            'image_carousel/index',
            array('image_carousel/add','image_carousel/edit')
        );

    }
}
