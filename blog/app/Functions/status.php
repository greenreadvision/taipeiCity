<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/

use App\Status;

class SetStatus {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }


    public function getStatus() {
        $status=Status::find("1");

        return $status->status;

    }

  
}
