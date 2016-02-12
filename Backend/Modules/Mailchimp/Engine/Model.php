<?php

namespace Backend\Modules\Mailchimp\Engine;

use Backend\Core\Engine\Model as BackendModel;
use Backend\Core\Engine\Language;

/**
 * In this file we store all generic functions that we will be using in the Mailchimp module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Model
{
    const QRY_DATAGRID_BROWSE =
        'SELECT i.id, i.titel, UNIX_TIMESTAMP(i.created_on) AS created_on
         FROM mailchimp AS i
         WHERE i.language = ?';

    const QRY_DATAGRID_BROWSE_CATEGORIES =
        'SELECT c.id, c.title, COUNT(i.id) AS num_items, c.sequence
         FROM mailchimp_categories AS c
         LEFT OUTER JOIN mailchimp AS i ON c.id = i.category_id AND i.language = c.language
         WHERE c.language = ?
         GROUP BY c.id
         ORDER BY c.sequence ASC';

    /**
     * Delete a certain item
     *
     * @param int $id
     */
    public static function delete($id)
    {
        BackendModel::get('database')->delete('mailchimp', 'id = ?', (int) $id);
    }

    /**
     * Delete a specific category
     *
     * @param int $id
     */
    public static function deleteCategory($id)
    {
        $db = BackendModel::get('database');
        $item = self::getCategory($id);

        if (!empty($item)) {
            $db->delete('meta', 'id = ?', array($item['meta_id']));
            $db->delete('mailchimp_categories', 'id = ?', array((int) $id));
            $db->update('mailchimp', array('category_id' => null), 'category_id = ?', array((int) $id));
        }
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
             FROM mailchimp AS i
             WHERE i.id = ?
             LIMIT 1',
            array((int) $id)
        );
    }

    /**
     * Does the category exist?
     *
     * @param int $id
     * @return bool
     */
    public static function existsCategory($id)
    {
        return (bool) BackendModel::get('database')->getVar(
            'SELECT 1
             FROM mailchimp_categories AS i
             WHERE i.id = ? AND i.language = ?
             LIMIT 1',
            array((int) $id, Language::getWorkingLanguage())
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
            'SELECT i.*
             FROM mailchimp AS i
             WHERE i.id = ?',
            array((int) $id)
        );
    }

    /**
     * Get all the categories
     *
     * @param bool $includeCount
     * @return array
     */
    public static function getCategories($includeCount = false)
    {
        $db = BackendModel::get('database');

        if ($includeCount) {
            return (array) $db->getPairs(
                'SELECT i.id, CONCAT(i.title, " (",  COUNT(p.category_id) ,")") AS title
                 FROM mailchimp_categories AS i
                 LEFT OUTER JOIN mailchimp AS p ON i.id = p.category_id AND i.language = p.language
                 WHERE i.language = ?
                 GROUP BY i.id',
                array(Language::getWorkingLanguage())
            );
        }

        return (array) $db->getPairs(
            'SELECT i.id, i.title
             FROM mailchimp_categories AS i
             WHERE i.language = ?',
            array(Language::getWorkingLanguage())
        );
    }

    /**
     * Fetch a category
     *
     * @param int $id
     * @return array
     */
    public static function getCategory($id)
    {
        return (array) BackendModel::get('database')->getRecord(
            'SELECT i.*
             FROM mailchimp_categories AS i
             WHERE i.id = ? AND i.language = ?',
            array((int) $id, Language::getWorkingLanguage())
        );
    }

    /**
     * Get the maximum sequence for a category
     *
     * @return int
     */
    public static function getMaximumCategorySequence()
    {
        return (int) BackendModel::get('database')->getVar(
            'SELECT MAX(i.sequence)
             FROM mailchimp_categories AS i
             WHERE i.language = ?',
            array(Language::getWorkingLanguage())
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
                 FROM mailchimp AS i
                 INNER JOIN meta AS m ON i.meta_id = m.id
                 WHERE i.language = ? AND m.url = ?
                 LIMIT 1',
                array(Language::getWorkingLanguage(), $url)
            );
        } else {
            $urlExists = (bool) $db->getVar(
                'SELECT 1
                 FROM mailchimp AS i
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
     * Retrieve the unique URL for a category
     *
     * @param string $url
     * @param int $id The id of the category to ignore.
     * @return string
     */
    public static function getURLForCategory($url, $id = null)
    {
        $url = \SpoonFilter::urlise((string) $url);
        $db = BackendModel::get('database');

        // new category
        if ($id === null) {
            $urlExists = (bool) $db->getVar(
                'SELECT 1
                 FROM mailchimp_categories AS i
                 INNER JOIN meta AS m ON i.meta_id = m.id
                 WHERE i.language = ? AND m.url = ?
                 LIMIT 1',
                array(Language::getWorkingLanguage(), $url)
            );
        } else {
            $urlExists = (bool) $db->getVar(
                'SELECT 1
                 FROM mailchimp_categories AS i
                 INNER JOIN meta AS m ON i.meta_id = m.id
                 WHERE i.language = ? AND m.url = ? AND i.id != ?
                 LIMIT 1',
                array(Language::getWorkingLanguage(), $url, $id)
            );
        }

        if ($urlExists) {
            $url = BackendModel::addNumber($url);
            return self::getURLForCategory($url, $id);
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

        return (int) BackendModel::get('database')->insert('mailchimp', $item);
    }

    /**
     * Insert a category in the database
     *
     * @param array $item
     * @return int
     */
    public static function insertCategory(array $item)
    {
        $item['created_on'] = BackendModel::getUTCDate();
        $item['edited_on'] = BackendModel::getUTCDate();

        return BackendModel::get('database')->insert('mailchimp_categories', $item);
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
            'mailchimp',
            $item,
            'id = ?',
            (int) $item['id']
        );
    }

    /**
     * Update a certain category
     *
     * @param array $item
     */
    public static function updateCategory(array $item)
    {
        $item['edited_on'] = BackendModel::getUTCDate();

        BackendModel::get('database')->update(
            'mailchimp_categories',
            $item,
            'id = ?',
            array($item['id'])
        );
    }
}
