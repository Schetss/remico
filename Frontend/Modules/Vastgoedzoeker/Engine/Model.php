<?php

namespace Frontend\Modules\Vastgoedzoeker\Engine;

use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation;

/**
 * In this file we store all generic functions that we will be using in the Vastgoedzoeker module
 *
 * @author Stijn Schets <stijn@schetss.be>
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
             FROM vastgoedzoeker AS i
             INNER JOIN meta AS m ON i.meta_id = m.id
             WHERE m.url = ?',
            array((string) $URL)
        );

        // no results?
        if (empty($item)) {
            return array();
        }

        // create full url
        $item['full_url'] = Navigation::getURLForBlock('Vastgoedzoeker', 'Detail') . '/' . $item['url'];

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
             FROM vastgoedzoeker AS i
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
        $detailUrl = Navigation::getURLForBlock('Vastgoedzoeker', 'Detail');

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
             FROM vastgoedzoeker AS i
             WHERE i.language = ?',
            array(FRONTEND_LANGUAGE)
        );
    }




    //
    // WHOMAN
    //

    public static function getNed($Searchterm,$Genre,$BuyRent,$pageNumber)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22," . $Searchterm . $Genre . $BuyRent. "%22Page%22:" . $pageNumber . ",%22RowsPerPage%22:10,%22Language%22:%22nl-BE%22}";
        $jsonlist = file_get_contents($url);
        $decode = json_decode($jsonlist, true);


         // print_r($url);
        // $test = array($jsonlist);
        return $decode;
    }

    public static function getCount($Searchterm,$Genre,$BuyRent,$pageNumber)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22," . $Searchterm . $Genre . $BuyRent. "%22Language%22:%22nl-BE%22}";
        $jsonlist = file_get_contents($url);
        $decode = json_decode($jsonlist, true);
        $decode2 = $decode['d']['EstateList'];
        $totaldecode = count($decode2);
        $paginationnumber = ceil($totaldecode/10);

        
        $levels = array();

        for ($i = 0; $i < $paginationnumber; ++$i) {
            $levels[] = $i;
        }
        
        $attributes = array(1);

        foreach ($levels as $key => $level):
           foreach ($attributes as $k =>$attribute):
                 $variables[$level]["Number"] = $attribute + $level; // changed $variables[] to $variables[$level][]
                 if ($level === $pageNumber) {
                    $variables[$level]["Selected"] = "class='selected'";
                 }
                 else {
                    $variables[$level]["Selected"] = "";
                 }
           endforeach;
        endforeach;


         // print_r($variables);

        return $variables;

    }



    //
    // DETAILED VIEW
    //


    public static function getContent($ref)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22,%22EstateID%22:" . $ref . ",%22Page%22:8,%22RowsPerPage%22:10,%22Language%22:%22nl-BE%22}";
        $jsonlist = file_get_contents($url);
        $decode = json_decode($jsonlist, true);

        // $test = array($jsonlist);
        return $decode;
    }







}
