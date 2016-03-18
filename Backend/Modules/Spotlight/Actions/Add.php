<?php

namespace Backend\Modules\Spotlight\Actions;

use Backend\Core\Engine\Base\ActionAdd;
use Backend\Core\Engine\Form;
use Backend\Core\Engine\Language;
use Backend\Core\Engine\Meta;
use Backend\Core\Engine\Model;
use Backend\Modules\Spotlight\Engine\Model as BackendSpotlightModel;
use Backend\Modules\Search\Engine\Model as BackendSearchModel;
use Backend\Modules\Tags\Engine\Model as BackendTagsModel;
use Backend\Modules\Users\Engine\Model as BackendUsersModel;

/**
 * This is the add-action, it will display a form to create a new item
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Add extends ActionAdd
{
    /**
     * Execute the actions
     */
    public function execute()
    {
        parent::execute();

        $this->loadForm();
        $this->validateForm();

        $this->parse();
        $this->display();
    }

    /**
     * Load the form
     */
    protected function loadForm()
    {
        $this->frm = new Form('add');

        $this->frm->addText('title', null, null, 'inputText title', 'inputTextError title');
        $this->frm->addText('id');
        $this->frm->addEditor('description');

        // get categories
        $categories = BackendSpotlightModel::getCategories();
        $this->frm->addDropdown('category_id', $categories);

        // meta
        $this->meta = new Meta($this->frm, null, 'title', true);

    }

    /**
     * Parse the page
     */
    protected function parse()
    {
        parent::parse();

        // get url
        $url = Model::getURLForBlock($this->URL->getModule(), 'Detail');
        $url404 = Model::getURL(404);

        // parse additional variables
        if ($url404 != $url) {
            $this->tpl->assign('detailURL', SITE_URL . $url);
        }
        $this->record['url'] = $this->meta->getURL();

    }

    /**
     * Validate the form
     */
    protected function validateForm()
    {
        if ($this->frm->isSubmitted()) {
            $this->frm->cleanupFields();

            // validation
            $fields = $this->frm->getFields();

            $fields['title']->isFilled(Language::err('FieldIsRequired'));
            $fields['category_id']->isFilled(Language::err('FieldIsRequired'));

            // validate meta
            $this->meta->validate();

            if ($this->frm->isCorrect()) {
                // build the item
                $item = array();
                $item['language'] = Language::getWorkingLanguage();
                $item['title'] = $fields['title']->getValue();
                $item['id'] = $fields['id']->getValue();
                $item['description'] = $fields['description']->getValue();
                $item['category_id'] = $this->frm->getField('category_id')->getValue();
                 $item['sequence'] = BackendPopulairModel::getMaximumSequence() + 1;
                 
                $item['meta_id'] = $this->meta->save();

                // insert it
                $item['id'] = BackendSpotlightModel::insert($item);

                $this->redirect(
                    Model::createURLForAction('Index') . '&report=added&highlight=row-' . $item['id']
                );
            }
        }
    }
}
