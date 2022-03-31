<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/

use App\Homes;

class Color {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }


    public function navbar() {
        $home=Homes::all();
        return $home[0]->navbar_color;
    }

    public function navbarHover() {
        $home=Homes::all();
        return $home[0]->navbar_color_hover;
    }

    public function footer() {
        $home=Homes::all();
        return $home[0]->footer_color;
    }

    public function footerHover() {
        $home=Homes::all();
        return $home[0]->footer_color_hover;
    }

    public function a() {
        $home=Homes::all();
        return $home[0]->a_color;
    }

    public function aHover() {
        $home=Homes::all();
        return $home[0]->a_color_hover;
    }
}
