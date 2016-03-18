<?php

namespace Backend\Modules\SmallBlocks\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Small blocks module
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
        $this->addModule('SmallBlocks');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'SmallBlocks');

        $this->setActionRights(1, 'SmallBlocks', 'Index');
        $this->setActionRights(1, 'SmallBlocks', 'Add');
        $this->setActionRights(1, 'SmallBlocks', 'Edit');
        $this->setActionRights(1, 'SmallBlocks', 'Delete');
        $this->setActionRights(1, 'small_blocks', 'Sequence');
        $this->setActionRights(1, 'SmallBlocks', 'Categories');
        $this->setActionRights(1, 'SmallBlocks', 'AddCategory');
        $this->setActionRights(1, 'SmallBlocks', 'EditCategory');
        $this->setActionRights(1, 'SmallBlocks', 'DeleteCategory');
        $this->setActionRights(1, 'SmallBlocks', 'SequenceCategories');

        $this->insertExtra('SmallBlocks', 'block', 'SmallBlocksCategory', 'Category', null, 'N', 1002);
        $this->insertExtra('SmallBlocks', 'widget', 'Categories', 'Categories', null, 'N', 1003);


        // add extra's
        $subnameID = $this->insertExtra('SmallBlocks', 'block', 'SmallBlocks');
        $this->insertExtra('SmallBlocks', 'block', 'SmallBlocksDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationSmallBlocksId = $this->setNavigation($navigationModulesId, 'SmallBlocks');
        $this->setNavigation(
            $navigationSmallBlocksId,
            'SmallBlocks',
            'small_blocks/index',
            array('small_blocks/add', 'small_blocks/edit')
        );
        $this->setNavigation(
            $navigationSmallBlocksId,
            'Categories',
            'small_blocks/categories',
            array('small_blocks/add_category', 'small_blocks/edit_category')
        );

    }
}
