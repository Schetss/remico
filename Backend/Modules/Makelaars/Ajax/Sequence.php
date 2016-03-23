<?php

namespace Backend\Modules\Makelaars\Ajax;

use Backend\Core\Engine\Base\AjaxAction;
use Backend\Modules\Makelaars\Engine\Model as BackendMakelaarsModel;

/**
 * Alters the sequence of Makelaars articles
 *
 * @author Stijn Schets <s>
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
            if (BackendMakelaarsModel::exists($id)) {
                BackendMakelaarsModel::update($item);
            }
        }

        // success output
        $this->output(self::OK, null, 'sequence updated');
    }
}
