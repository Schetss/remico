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

    if($Searchterm !== "") 
    {      
        
        if ( strlen($Searchterm) === 4){

         
            $jsonurl = "http://remico:8888/src/Frontend/Themes/Remico/Core/Js/cities.json";
            // $jsonurllist = @file_get_contents($jsonurl);


            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $jsonurl);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $contents = curl_exec($ch);
           
            // if (curl_errno($ch)) {
            //   echo curl_error($ch);
            //   echo "\n<br />";
            //   $contents = '';
            // } 

            // else {
            //   curl_close($ch);
            // }

            // if (!is_string($contents) || !strlen($contents)) {
            // echo "Failed to get contents.";
            // $contents = '';
            // }

           

            if($contents === FALSE) {
             return array(0);
            }

            else {
                $jsonurllistarray = json_decode($contents, true);
                
                $code = $Searchterm;
                $region = "";
                // $val = "name";

                foreach ($jsonurllistarray as $key=>$val) 
                {       
                   
                   // print_r($jsonurllistarray[$key]["name"]);
                    $valu = $jsonurllistarray[$key]["name"];

                    if(strpos($valu, $code) !== false){
                       // $decode['d']['EstateList'][$key]['SubCategory'] = $replacement;
                        $regione = $jsonurllistarray[$key]["regioid"];
                        // print_r($regiones);
                        

                        $regiones = "%22RegionIDList%22:[%22" . $regione . "%22],";
                         break;
                    }   
                    
                    else {
                         $regiones = "%22RegionIDList%22:[%220%22],";
                    }

                }
            }
        }
        else {
             $regiones = "%22RegionIDList%22:[%220%22],";
        }
    }

    else {
        $regiones = "";
    }

      


        
    $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22," . $regiones . $Genre . $BuyRent. "%22Page%22:" . $pageNumber . ",%22RowsPerPage%22:10,%22IsTopParent%22:true,%22Language%22:%22nl-BE%22}";
    // $jsonlist = @file_get_contents($url);
        
        // print_r($url);

     $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);


       if($contents === FALSE) {
         return array(0);
       }

        
       else {
            $decode = json_decode($contents, true);
          

            $word = "kantoren & magazijn";
            $replacement = "KMO-Units";
            $val = "SubCategory";

          

            foreach ($decode['d']['EstateList'] as $key=>$val) 
            {       
                 if($val["SubCategory"] == $word){
                   $decode['d']['EstateList'][$key]['SubCategory'] = $replacement;
                 }  
            }

            $decode1 = $decode['d']['EstateList'];



            return $decode1;

            // print_r($decode1);   

        }
    }

    public static function getCount($Searchterm,$Genre,$BuyRent,$pageNumber)
    {
        if($Searchterm !== "") 
    {      
        
        if ( strlen($Searchterm) === 4){

         
            $jsonurl = "http://remico:8888/src/Frontend/Themes/Remico/Core/Js/cities.json";
            // $jsonurllist = @file_get_contents($jsonurl);

            $che = curl_init();
            curl_setopt ($che, CURLOPT_URL, $jsonurl);
            curl_setopt ($che, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($che, CURLOPT_RETURNTRANSFER, true);
            $contents2 = curl_exec($che);
           

            if($contents2 === FALSE) {
             return array(0);
            }

            else {
                $jsonurllistarray = json_decode($contents2, true);
                
                $code = $Searchterm;
                $region = "";
                // $val = "name";

                foreach ($jsonurllistarray as $key=>$val) 
                {       
                   
                   // print_r($jsonurllistarray[$key]["name"]);
                    $valu = $jsonurllistarray[$key]["name"];

                    if(strpos($valu, $code) !== false){
                       // $decode['d']['EstateList'][$key]['SubCategory'] = $replacement;
                        $regione = $jsonurllistarray[$key]["regioid"];
                        // print_r($regiones);
                        

                        $regiones = "%22RegionIDList%22:[%22" . $regione . "%22],";
                         break;
                    }   
                    
                    else {
                         $regiones = "%22RegionIDList%22:[%220%22],";
                    }

                }
            }
        }
        else {
             $regiones = "%22RegionIDList%22:[%220%22],";
        }
    }

    else {
        $regiones = "";
    }

      


        
    $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22," . $regiones . $Genre . $BuyRent. "%22IsTopParent%22:true,%22Language%22:%22nl-BE%22}";
    // $jsonlist = @file_get_contents($url);

    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);


        if($contents === FALSE){
            return array(0);
        }

        else 
        {
            $decode = json_decode($contents, true);
            $decode2 = $decode['d']['EstateList'];
            $totaldecode = count($decode2);
            $paginationnumber = ceil($totaldecode/10);
            $variables = NULL;


            

            if($paginationnumber != 1){


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
              
                return $variables;
            }          
            else {
                return NULL;
            }
        }
         // print_r($variables);

        

    }



    //
    // DETAILED VIEW
    //


    public static function getContent($ref)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22,%22ShowDetails%22:1,%22EstateID%22:" . $ref . ",%22Language%22:%22nl-BE%22}";
        // $jsonlist = @file_get_contents($url);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);

        if($contents === FALSE){
            return array(0);
        }

        else 
        {
            $decode = json_decode($contents, true);

            
            $word = "kantoren & magazijn";
            $replacement = "KMO-Units";
            $val = "SubCategory";

          

            foreach ($decode['d']['EstateList'] as $key=>$val) 
            {       
                 if($val["SubCategory"] == $word){
                   $decode['d']['EstateList'][$key]['SubCategory'] = $replacement;
                 }  
            }
            
            
            return $decode;
        }
    }



    public static function getContentChild($ref)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22,%22ParentID%22:" . $ref . ",%22Language%22:%22nl-BE%22}";
        // $jsonlist = @file_get_contents($url);


        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);

        if($contents === FALSE){
            return array(0);
        }
        
        else {
            $decode = json_decode($contents, true);

            return $decode;
        }
    }


    public static function getDetailsE($ref)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22,%22ShowDetails%22:1,%22EstateID%22:" . $ref . ",%22Language%22:%22nl-BE%22}";
        // $jsonlist = @file_get_contents($url);


        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);

        if($contents === FALSE){
            return array(0);
        }
        
        else {

            $decode = json_decode($contents, true);


            if( empty( $decode["d"]["EstateList"]["0"]["Details"] ) )
            {
                return array(0);
            }

            else {
                $decode1 = $decode["d"]["EstateList"]["0"]["Details"];

                $word = "yes/no";
                $val = "Type";
                $decode2 = array();


                foreach ($decode1 as $key=>$val) 
                {       
                    if($val["Subdetails"]["0"]["Type"] == $word && $val["Subdetails"]["0"]["Value"] == "1"){
                        array_push($decode2, $val);  
                    } 
                }

                return $decode2;
            }
            
        }
    }

    public static function getDetailsV($ref)
    {
        $url = "http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest={%22ClientId%22:%222d01f903c8c94c0c8aaa%22,%22ShowDetails%22:1,%22EstateID%22:" . $ref . ",%22Language%22:%22nl-BE%22}";
        // $jsonlist = @file_get_contents($url);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);

        if($contents === FALSE){
            return array(0);
        }
        
        else {

            $decode = json_decode($contents, true);


            if( empty( $decode["d"]["EstateList"]["0"]["Details"] ) )
            {
                return array(0);
            }

            else 
            {

                $decode1 = $decode["d"]["EstateList"]["0"]["Details"];

                $word = "yes/no";
                $val = "Type";
                $decode2 = array();

                foreach ($decode1 as $key=>$val) 
                {       
                    if($val["Subdetails"]["0"]["Type"] != $word){
                        array_push($decode2, $val);  
                    } 
                }

                if( empty( $decode2 ) )
                {
                    return array(0);
                }

                else {


                    $naam1 = "vrije hoogte";
                    $naam2 = "draagkracht & belasting";
                    $naam3 = "poorten (gelijkvloers)";
                    $add1 = "m";
                    $add2 = " (T/m<sup>2</sup>)";
                    $add3 = "m (aantal - hoogte)";
                    $v = "Value";

                  

                    foreach ($decode2 as $key2=>$v) 
                    {       
                         if($v["Name"] == $naam1){

                            $decode2[$key2]["Subdetails"]["0"]["Value"] = $decode2[$key2]["Subdetails"]["0"]["Value"] . $add1;
                         }

                         else if ($v["Name"] == $naam2){
                            $decode2[$key2]["Subdetails"]["0"]["Value"] = $decode2[$key2]["Subdetails"]["0"]["Value"] . $add2;
                         }

                         else if ($v["Name"] == $naam3){
                            $decode2[$key2]["Subdetails"]["1"]["Value"] = $decode2[$key2]["Subdetails"]["1"]["Value"] . $add3;
                         }
                    }





                    return $decode2;
                }

            }
            
        }
    }
    
}
