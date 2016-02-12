<?php

namespace Backend\Modules\ImageCarousel\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Form;
use Backend\Core\Engine\Language;
use Backend\Core\Engine\Meta;
use Backend\Core\Engine\Model;
use Backend\Modules\ImageCarousel\Engine\Model as BackendImageCarouselModel;
use Backend\Modules\Search\Engine\Model as BackendSearchModel;
use Backend\Modules\Tags\Engine\Model as BackendTagsModel;
use Backend\Modules\Users\Engine\Model as BackendUsersModel;

/**
 * This is the edit-action, it will display a form with the item data to edit
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Edit extends ActionEdit
{
    /**
     * Execute the action
     */
    public function execute()
    {
        parent::execute();

        $this->loadData();
        $this->loadForm();
        $this->validateForm();

        $this->parse();
        $this->display();
    }

    /**
     * Load the item data
     */
    protected function loadData()
    {
        $this->id = $this->getParameter('id', 'int', null);
        if ($this->id == null || !BackendImageCarouselModel::exists($this->id)) {
            $this->redirect(
                Model::createURLForAction('Index') . '&error=non-existing'
            );
        }

        $this->record = BackendImageCarouselModel::get($this->id);
    }

    /**
     * Load the form
     */
    protected function loadForm()
    {
        // create form
        $this->frm = new Form('edit');

        $this->frm->addText('titel', $this->record['titel'], null, 'inputText title', 'inputTextError title');
        $this->frm->addImage('afbeelding');
        $this->frm->addCheckbox('publiceren', $this->record['publiceren'] == 'Y');

        // meta
        $this->meta = new Meta($this->frm, $this->record['meta_id'], 'titel', true);
        $this->meta->setUrlCallBack('Backend\Modules\ImageCarousel\Engine\Model', 'getUrl', array($this->record['id']));

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


        $this->tpl->assign('item', $this->record);
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

            $fields['titel']->isFilled(Language::err('FieldIsRequired'));

            // validate meta
            $this->meta->validate();

            if ($this->frm->isCorrect()) {
                $item = array();
                $item['id'] = $this->id;
                $item['language'] = Language::getWorkingLanguage();

                $item['titel'] = $fields['titel']->getValue();

                // the image path
                $imagePath = FRONTEND_FILES_PATH . '/' . $this->getModule() . '/afbeelding';

                // create folders if needed
                if (!\SpoonDirectory::exists($imagePath . '/300x300')) {
                    \SpoonDirectory::create($imagePath . '/300x300');
                }
                if (!\SpoonDirectory::exists($imagePath . '/1920x1080')) {
                    \SpoonDirectory::create($imagePath . '/1920x1080');
                }
                if (!\SpoonDirectory::exists($imagePath . '/720x450')) {
                    \SpoonDirectory::create($imagePath . '/720x450');
                }
                if (!\SpoonDirectory::exists($imagePath . '/1440x900')) {
                    \SpoonDirectory::create($imagePath . '/1440x900');
                }
                if (!\SpoonDirectory::exists($imagePath . '/source')) {
                    \SpoonDirectory::create($imagePath . '/source');
                }

                // image provided?
                if ($fields['afbeelding']->isFilled()) {
                    // build the image name
                    $item['afbeelding'] = $this->meta->getUrl() . '.' . $fields['afbeelding']->getExtension();

                    // upload the image & generate thumbnails
                    $fields['afbeelding']->generateThumbnails($imagePath, $item['afbeelding']);
                }
                $item['publiceren'] = $fields['publiceren']->getChecked() ? 'Y' : 'N';

                $item['meta_id'] = $this->meta->save();

                BackendImageCarouselModel::update($item);
                $item['id'] = $this->id;

                $this->redirect(
                    Model::createURLForAction('Index') . '&report=edited&highlight=row-' . $item['id']
                );
            }
        }
    }
}
