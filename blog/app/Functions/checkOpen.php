<?php

/**
 *@author  Xu Ding
 *@email   thedilab@gmail.com
 *@website http://www.StarTutorial.com
 **/

use App\Activity;
use App\Sessions;

class CheckOpen
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    public function show()
    {
        $session = Sessions::all();
        $activity = Activity::all();
        foreach ($session as $data) {
            if ($data->state == '0' && strtotime($data->date . ' ' . $data->end_time) <= strtotime(date('Y-m-d H:i'))) {
                $data->state = '1';
                $data->save();
            } else if ($data->state == '1' && strtotime($data->date . ' ' . $data->end_time) > strtotime(date('Y-m-d H:i'))) {
                $data->state = '0';
                $data->save();
            }
        }
        date_default_timezone_set('Asia/Taipei');
        foreach ($activity as $temp) {
            foreach ($temp->routes as $data) {
                $i = 0;
                if ($data->state == 'not_open' && strtotime($temp->open_date) <= strtotime(date('Y-m-d H:i'))) {
                    $data->state = 'open';
                    if(count($data->sessions)==0){
                        $data->state ='not_open';
                    }
                    $data->save();
                } else if ($data->state == 'open' && strtotime($temp->open_date) > strtotime(date('Y-m-d H:i'))) {
                    $data->state = 'not_open';
                    $data->save();
                }

                foreach ($data->sessions as $data1) {
                    $i += $data1->state;
                }

                if ($i == count($data->sessions) && $i != 0) {
                    $data->state = 'close';
                    $data->save();
                } else if($i != count($data->sessions ) && $i != 0) {
                    if ($data->stae != 'full' && $data->stae != 'cutoff' &&$data->stae != 'alternate' ) {
                        $data->state = 'open';
                        $data->save();
                    }
                }
            }
        }
    }
}
