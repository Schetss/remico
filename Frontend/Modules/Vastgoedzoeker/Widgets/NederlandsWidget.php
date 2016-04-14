<?php

namespace Frontend\Modules\Vastgoedzoeker\Widgets;

/*
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Core\Engine\Navigation as FrontendNavigation;
use Frontend\Modules\Vastgoedzoeker\Engine\Model as FrontendVastgoedzoekerModel;

/**
 * This is a widget for the Vastgoedzoeker // 
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class NederlandsWidget extends FrontendBaseWidget
{

        /**
     * Execute the extra
     */
    public function execute()
    {
        parent::execute();
        $this->loadTemplate();
        $this -> searchEstate();
        $this->parse();
    }



    /**
    * Search estates
    */

    private function searchEstate()
    {



        if(isset($_POST['Search']))
        {

            $Searchterm1 = htmlspecialchars($_POST['Text']);
            $Genre1 = htmlspecialchars($_POST['Genre']);
            $BuyRent1 = htmlspecialchars($_POST['Sort']);  

            $Page = htmlspecialchars($_POST['Page']);     
            
        }
    }


    /**
    * Parse
    */

    
    private function parse()
    {

       $Searchterm = ''; 
       $Genre = '';
       $BuyRent = '';
       $PageNumber = '';
       $pageurl1 = $_SERVER['REQUEST_URI'];


        if (isset($_GET['Text']) && $_GET['Text'] != '') {
            $Searchterm2 = htmlspecialchars($_GET['Text']);
            // preg_match_all('!\d+!', $Searchterm2, $matches);    
            
       
            if (preg_match('/[0-9]/', $Searchterm2))
            {
               $Searchterm3 = preg_replace('/[0-9]+/', '', $Searchterm2);

               $Searchterm4 = trim($Searchterm3);

               $Searchterm5 = str_replace(' ', '%20', $Searchterm4);

               $Searchterm = '%22City%22:%22' . $Searchterm5 . '%22,';
            }

            else {
                $SearchtermA = trim($Searchterm2);

                $SearchtermB = str_replace(' ', '%20', $SearchtermA);

                $Searchterm = '%22City%22:%22' . $SearchtermB . '%22,';
            }   
        }

        else {
            $Searchterm = '';
        }



        if (isset($_GET['Genre']) && $_GET['Genre'] != '') {
            $Genre2 = htmlspecialchars($_GET['Genre']);

            if($Genre2 == 2) {
                $Genre = '%22subcategory%22:[35,40,83],';
            }

            else if($Genre2 == 3) {
                 $Genre = '%22subcategory%22:[78,53],';
            }

            else if($Genre2 == 4) {
                $Genre = '%22subcategory%22:[88,82],';
            }

             else {
                $Genre = '';
            }

        }

       

        if (isset($_GET['Sort']) && $_GET['Sort'] != '') {
            $BuyRent2 = htmlspecialchars($_GET['Sort']);

            if($BuyRent2 == 2) {
                $BuyRent = '%22PurposeIDList%22:[1],';
            }

            else if($BuyRent2 == 3) {
                $BuyRent = '%22PurposeIDList%22:[2],';;
            }

            else {
                $BuyRent = '';
            }
        }


        if (isset($_GET['Page']) && $_GET['Page'] != '') {
            $PageNumber1 = htmlspecialchars($_GET['Page']);
            $PageNumber = $PageNumber1 - 1;
        }

        else {
            $PageNumber = 0;
        }



        // URL 

        if (strpos($pageurl1, '&Page') !== false) {
            $pageurl = substr($pageurl1, 0, strpos($pageurl1, '&Page='));
        }

        else if (strpos($pageurl1, '?') == false) {
            $pageurl = $pageurl1 . '?';
        }

        else {
            $pageurl = $pageurl1;
        }


        // print_r($PageNumber);
        
        $this->list = FrontendVastgoedzoekerModel::getNed($Searchterm,$Genre,$BuyRent,$PageNumber);
        $this->count = FrontendVastgoedzoekerModel::getCount($Searchterm,$Genre,$BuyRent,$PageNumber);
        $catch = array(0);

        $this->tpl->assign('estate', (array)$this->list);
       

        if($this->list != array(0)) {
            $this->tpl->assign('estatelist', (array)$this->list);
        }

        else {
             $this->tpl->assign('estatelist',  "");
              // print_r($PageNumber);
        }



        if($this->count != array(0)) {
            $this->tpl->assign('estatecount', (array)$this->count);
        }

        else {
            $this->tpl->assign('estatecount',"");
             // print_r($PageNumber);
        }
      
        

        $this->tpl->assign('pagurl', $pageurl);
        
        if (isset($_GET["Text"])) {
            $this->tpl->assign('field1', $_GET["Text"]); 
        }
        
        if (isset($_GET["Genre"])) {
            $this->tpl->assign('field2selected' . $_GET["Genre"] , $_GET["Genre"]); 
        }

        if (isset($_GET["Sort"])) {
            $this->tpl->assign('field3selected' . $_GET["Sort"], $_GET["Sort"]); 
        }
    
    }

}



