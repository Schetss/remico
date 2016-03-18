<?php

namespace Backend\Modules\Testimonials\Engine;

use Backend\Core\Engine\Model as BackendModel;
use Backend\Core\Engine\Language;

/**
 * In this file we store all generic functions that we will be using in the Testimonials module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Model
{
    const QRY_DATAGRID_BROWSE =
        'SELECT i.id, i.titel, UNIX_TIMESTAMP(i.created_on) AS created_on
         FROM testimonials AS i
         WHERE i.language = ?';

    /**
     * Delete a certain item
     *
     * @param int $id
     */
    public static function delete($id)
    {
        BackendModel::get('database')->delete('testimonials', 'id = ?', (int) $id);
    }

    /**
     * Checks if a certain item exists
     *
     * @param int $id
     * @return bool
     */
    public static function exists($id)
    {
        return (bool) BackendModel::get('database')->getVar(
            'SELECT 1
             FROM testimonials AS i
             WHERE i.id = ?
             LIMIT 1',
            array((int) $id)
        );
    }

    /**
     * Fetches a certain item
     *
     * @param int $id
     * @return array
     */
    public static function get($id)
    {
        return (array) BackendModel::get('database')->getRecord(
            'SELECT i.*, UNIX_TIMESTAMP(i.datum) AS datum
             FROM testimonials AS i
             WHERE i.id = ?',
            array((int) $id)
        );
    }

    /**
     * Retrieve the unique URL for an item
     *
     * @param string $url
     * @param int $id    The id of the item to ignore.
     * @return string
     */
    public static function getURL($url, $id = null)
    {
        $url = \SpoonFilter::urlise((string) $url);
        $db = BackendModel::get('database');

        if ($id === null) {
            $urlExists = (bool) $db->getVar(
                'SELECT 1
                 FROM testimonials AS i
                 INNER JOIN meta AS m ON i.meta_id = m.id
                 WHERE i.language = ? AND m.url = ?
                 LIMIT 1',
                array(Language::getWorkingLanguage(), $url)
            );
        } else {
            $urlExists = (bool) $db->getVar(
                'SELECT 1
                 FROM testimonials AS i
                 INNER JOIN meta AS m ON i.meta_id = m.id
                 WHERE i.language = ? AND m.url = ? AND i.id != ?
                 LIMIT 1',
                array(Language::getWorkingLanguage(), $url, $id)
            );
        }

        if ($urlExists) {
            $url = BackendModel::addNumber($url);
            return self::getURL($url, $id);
        }

        return $url;
    }

    /**
     * Insert an item in the database
     *
     * @param array $item
     * @return int
     */
    public static function insert(array $item)
    {
        $item['created_on'] = BackendModel::getUTCDate();
        $item['edited_on'] = BackendModel::getUTCDate();

        return (int) BackendModel::get('database')->insert('testimonials', $item);
    }

    /**
     * Updates an item
     *
     * @param array $item
     */
    public static function update(array $item)
    {
        $item['edited_on'] = BackendModel::getUTCDate();

        BackendModel::get('database')->update(
            'testimonials',
            $item,
            'id = ?',
            (int) $item['id']
        );
    }
}
