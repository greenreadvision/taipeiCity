<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/

use App\Homes;

class Breadcrumb {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }


    public function navbar() {
        $home=Homes::all();
        $home[0]->navbar_path = explode('/', $home[0]->navbar_path);
        return 
        '<section style="height: 110px;background: url('.route('download', $home[0]->navbar_path).');background-size:cover;">';
        
    }

    public function name() {
        $home=Homes::all();
       return $home[0]->name;
        
    }
}
