<?php

namespace Frontend\Modules\Makelaars\Engine;

use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation;

/**
 * In this file we store all generic functions that we will be using in the Makelaars module
 *
 * @author Stijn Schets <s>
 */
class Model
{
    /**
     * Fetches a certain item
     *
     * @param string $URL
     * @return array
     */
    public static function get($URL)
    {
        $item = (array) FrontendModel::get('database')->getRecord(
            'SELECT i.*,
             m.keywords AS meta_keywords, m.keywords_overwrite AS meta_keywords_overwrite,
             m.description AS meta_description, m.description_overwrite AS meta_description_overwrite,
             m.title AS meta_title, m.title_overwrite AS meta_title_overwrite, m.url
             FROM makelaars AS i
             INNER JOIN meta AS m ON i.meta_id = m.id
             WHERE m.url = ?',
            array((string) $URL)
        );

        // no results?
        if (empty($item)) {
            return array();
        }

        // create full url
        $item['full_url'] = Navigation::getURLForBlock('Makelaars', 'Detail') . '/' . $item['url'];

        return $item;
    }

    /**
     * Get all items (at least a chunk)
     *
     * @param int $limit The number of items to get.
     * @param int $offset The offset.
     * @return array
     */
    public static function getAll($limit = 10, $offset = 0)
    {
        $items = (array) FrontendModel::get('database')->getRecords(
            'SELECT i.*, m.url
             FROM makelaars AS i
             INNER JOIN meta AS m ON i.meta_id = m.id
             WHERE i.language = ?
             ORDER BY i.sequence ASC, i.id DESC LIMIT ?, ?',
            array(FRONTEND_LANGUAGE, (int) $offset, (int) $limit)
        );

        // no results?
        if (empty($items)) {
            return array();
        }

        // get detail action url
        $detailUrl = Navigation::getURLForBlock('Makelaars', 'Detail');

        // prepare items for search
        foreach ($items as &$item) {
            $item['full_url'] =  $detailUrl . '/' . $item['url'];
        }

        // return
        return $items;
    }

    /**
     * Get the number of items
     *
     * @return int
     */
    public static function getAllCount()
    {
        return (int) FrontendModel::get('database')->getVar(
            'SELECT COUNT(i.id) AS count
             FROM makelaars AS i
             WHERE i.language = ?',
            array(FRONTEND_LANGUAGE)
        );
    }

     /**
     * Get Liesbeth
     *
     * @return int
     */
        public static function getLiesbeth()
        {
            $return = (array) FrontendModel::get('database')->getRecords(
               'SELECT id, naam AS name, telefoon as phone, email as email, image as image, omschrijving as description
                FROM makelaars 
                WHERE id = 1;
                ',
                array(),
                'id'
            );

            // loop items and unserialize
            foreach ($return as &$row) {
                if (isset($row['meta_data'])) {
                    $row['meta_data'] = unserialize($row['meta_data']);
                }
            }

            return $return;
        }

         /**
     * Get Liesbeth
     *
     * @return int
     */
        public static function getGeert()
        {
            $return = (array) FrontendModel::get('database')->getRecords(
               'SELECT id, naam AS name, telefoon as phone, email as email, image as image, omschrijving as description
                FROM makelaars 
                WHERE id = 2;
                ',
                array(),
                'id'
            );

            // loop items and unserialize
            foreach ($return as &$row) {
                if (isset($row['meta_data'])) {
                    $row['meta_data'] = unserialize($row['meta_data']);
                }
            }

            return $return;
        }



}
