<?php

namespace Backend\Modules\Geschiedenis\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Form;
use Backend\Core\Engine\Language;
use Backend\Core\Engine\Meta;
use Backend\Core\Engine\Model;
use Backend\Modules\Geschiedenis\Engine\Model as BackendGeschiedenisModel;
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
        if ($this->id == null || !BackendGeschiedenisModel::exists($this->id)) {
            $this->redirect(
                Model::createURLForAction('Index') . '&error=non-existing'
            );
        }

        $this->record = BackendGeschiedenisModel::get($this->id);
    }

    /**
     * Load the form
     */
    protected function loadForm()
    {
        // create form
        $this->frm = new Form('edit');

        $this->frm->addText('titel', $this->record['titel'], null, 'inputText title', 'inputTextError title');
        $this->frm->addEditor('content', $this->record['content']);
        $this->frm->addDate('datum_date', $this->record['datum']);
        $this->frm->addTime('datum_time', date('H:i', $this->record['datum']));
        $this->frm->addImage('image');
        $this->frm->addText('goto', $this->record['goto']);
        $this->frm->addText('gototext', $this->record['gototext']);

        // meta
        $this->meta = new Meta($this->frm, $this->record['meta_id'], 'titel', true);
        $this->meta->setUrlCallBack('Backend\Modules\Geschiedenis\Engine\Model', 'getUrl', array($this->record['id']));

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
                $item['content'] = $fields['content']->getValue();
                $item['datum'] = Model::getUTCDate(
                    null,
                    Model::getUTCTimestamp(
                        $this->frm->getField('datum_date'),
                        $this->frm->getField('datum_time')
                    )
                );

                // the image path
                $imagePath = FRONTEND_FILES_PATH . '/' . $this->getModule() . '/image';

                // create folders if needed
                if (!\SpoonDirectory::exists($imagePath . '/128x128')) {
                    \SpoonDirectory::create($imagePath . '/128x128');
                }
                if (!\SpoonDirectory::exists($imagePath . '/400x300')) {
                    \SpoonDirectory::create($imagePath . '/400x300');
                }
                if (!\SpoonDirectory::exists($imagePath . '/800x600')) {
                    \SpoonDirectory::create($imagePath . '/800x600');
                }
                if (!\SpoonDirectory::exists($imagePath . '/source')) {
                    \SpoonDirectory::create($imagePath . '/source');
                }

                // image provided?
                if ($fields['image']->isFilled()) {
                    // build the image name
                    $item['image'] = $this->meta->getUrl() . '.' . $fields['image']->getExtension();

                    // upload the image & generate thumbnails
                    $fields['image']->generateThumbnails($imagePath, $item['image']);
                }
                $item['goto'] = $fields['goto']->getValue();
                $item['gototext'] = $fields['gototext']->getValue();

                $item['meta_id'] = $this->meta->save();

                BackendGeschiedenisModel::update($item);
                $item['id'] = $this->id;

                $this->redirect(
                    Model::createURLForAction('Index') . '&report=edited&highlight=row-' . $item['id']
                );
            }
        }
    }
}
