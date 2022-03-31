<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/


use App\Homes;

class Footer {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
   
    public function host() {
        $home=Homes::all();
        $home[0]->host_path = explode('/', $home[0]->host_path);
        return ' <img width=100% src="'.route('download', $home[0]->host_path).'">';
    }
    
    public function footer() {
        $home=Homes::all();
        $home[0]->footer_path = explode('/', $home[0]->footer_path);
        return '<footer style="background: rgb(0, 0, 0) url('.route('download', $home[0]->footer_path).') repeat 0 0;background-size: cover;
        color:#40210f;
        padding:30px 0 10px 0;">';
    }
}
