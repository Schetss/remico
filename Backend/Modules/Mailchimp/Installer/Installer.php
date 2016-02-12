<?php

namespace Backend\Modules\Mailchimp\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Mailchimp module
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
        $this->addModule('Mailchimp');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Mailchimp');

        $this->setActionRights(1, 'Mailchimp', 'Index');
        $this->setActionRights(1, 'Mailchimp', 'Add');
        $this->setActionRights(1, 'Mailchimp', 'Edit');
        $this->setActionRights(1, 'Mailchimp', 'Delete');
        $this->setActionRights(1, 'Mailchimp', 'Categories');
        $this->setActionRights(1, 'Mailchimp', 'AddCategory');
        $this->setActionRights(1, 'Mailchimp', 'EditCategory');
        $this->setActionRights(1, 'Mailchimp', 'DeleteCategory');
        $this->setActionRights(1, 'Mailchimp', 'SequenceCategories');

        $this->insertExtra('Mailchimp', 'block', 'MailchimpCategory', 'Category', null, 'N', 1002);
        $this->insertExtra('Mailchimp', 'widget', 'Categories', 'Categories', null, 'N', 1003);


        // add extra's
        $subnameID = $this->insertExtra('Mailchimp', 'block', 'Mailchimp');
        $this->insertExtra('Mailchimp', 'block', 'MailchimpDetail', 'Detail');

        $navigationModulesId = $this->setNavigation(null, 'Modules');
        $navigationMailchimpId = $this->setNavigation($navigationModulesId, 'Mailchimp');
        $this->setNavigation(
            $navigationMailchimpId,
            'Mailchimp',
            'mailchimp/index',
            array('mailchimp/add', 'mailchimp/edit')
        );
        $this->setNavigation(
            $navigationMailchimpId,
            'Categories',
            'mailchimp/categories',
            array('mailchimp/add_category', 'mailchimp/edit_category')
        );

    }
}
