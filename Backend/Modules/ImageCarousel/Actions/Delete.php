<?php

namespace Backend\Modules\ImageCarousel\Actions;

use Backend\Core\Engine\Base\ActionDelete;
use Backend\Core\Engine\Model;
use Backend\Modules\ImageCarousel\Engine\Model as BackendImageCarouselModel;

/**
 * This is the delete-action, it deletes an item
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Delete extends ActionDelete
{
    /**
     * Execute the action
     */
    public function execute()
    {
        $id = $this->getParameter('id', 'int');

        // does the item exist
        if ($id === null || !BackendImageCarouselModel::exists($id)) {
            return $this->redirect(
                Model::createURLForAction('Index') . '&error=non-existing'
            );
        }

        parent::execute();

        $record = (array) BackendImageCarouselModel::get($id);
        BackendImageCarouselModel::delete($id);

        $this->redirect(
            Model::createURLForAction('Index') . '&report=deleted&var=' .
            urlencode($record['title'])
        );
    }
}
