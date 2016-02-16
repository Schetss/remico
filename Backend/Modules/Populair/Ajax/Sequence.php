<?php

namespace Backend\Modules\Populair\Ajax;

use Backend\Core\Engine\Base\AjaxAction;
use Backend\Modules\Populair\Engine\Model as BackendPopulairModel;

/**
 * Alters the sequence of Populair articles
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Sequence extends AjaxAction
{
    public function execute()
    {
        parent::execute();

        // get parameters
        $newIdSequence = trim(\SpoonFilter::getPostValue('new_id_sequence', null, '', 'string'));

        // list id
        $ids = (array) explode(',', rtrim($newIdSequence, ','));

        // loop id's and set new sequence
        foreach ($ids as $i => $id) {
            $item['id'] = $id;
            $item['sequence'] = $i + 1;

            // update sequence
            if (BackendPopulairModel::exists($id)) {
                BackendPopulairModel::update($item);
            }
        }

        // success output
        $this->output(self::OK, null, 'sequence updated');
    }
}
