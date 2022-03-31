<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/

use App\Activity;
use App\Homes;

class Navbar {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    public function name() {
        $home=Homes::all();
       return $home[0]->name;
        
    }
    
    public function show() {

        $temp='';
        $activities=Activity::orderby('id')->get();
        foreach($activities as $data){
            $temp = $temp.' <li class="submenu"><a href="'.route('index.activity', ['id'=>$data->activity_id]).'" class="show-submenu submenu-color"><span>'.explode("\n",$data->name)[0].'<br>'.explode("\n",$data->name)[1].'</span></a></li>';
        }
        return $temp;
    }

    public function navbar() {
        $home=Homes::all();
        $home[0]->navbar_path = explode('/', $home[0]->navbar_path);
        return 
        '<header style="
        /* background-color:#d4ebe1;  */
        background: url('.route('download', $home[0]->navbar_path).');
        padding-bottom:0;">';
    }
    public function logo() {

        $home=Homes::all();
        $home[0]->logo_path = explode('/', $home[0]->logo_path);
        return '<img src="'.route('download', $home[0]->logo_path).'" height="38" alt="City tours" data-retina="true" class="logo_normal">';
    }
    public function logo1() {

        $home=Homes::all();
        $home[0]->logo_path = explode('/', $home[0]->logo_path);
        return '<img src="'.route('download', $home[0]->logo_path).'" height="38" alt="City tours" data-retina="true" class="logo_sticky" style="margin-top:10px;">';
    }
    public function logo2() {

        $home=Homes::all();
        $home[0]->logo_path = explode('/', $home[0]->logo_path);
        return '<img src="'.route('download', $home[0]->logo_path).'" width="" height="60" alt="City tours" data-retina="true">';
    }
   
    public function host() {
        $home=Homes::all();
        $home[0]->host_path = explode('/', $home[0]->host_path);
        return ' <img width=100% src="'.route('download', $home[0]->host_path).'">';
    }
}
