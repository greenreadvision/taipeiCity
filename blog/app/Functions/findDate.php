<?php

/**
 *@author  Xu Ding
 *@email   thedilab@gmail.com
 *@website http://www.StarTutorial.com
 **/

use App\Activity;

class findDate
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }


    public function show(String $id)
    {
        $activity = Activity::find($id);
        $temp = "";
        $latterTemp = "";
        $time = "";
        foreach ($activity->routes as $routes) {
            foreach ($routes->sessions as $session) {
                if ($temp == "") {
                    $temp = $session->date;
                    $time = substr($session->start_time, 0, 5) . ' - ' . substr($session->end_time, 0, 5);
                } else {
                    if ($session->date != $temp) {
                        foreach ($activity->routes as $routes1) {
                            foreach ($routes1->sessions as $session1) {
                                if ($session != $session1) {
                                    if (strtotime($temp) < strtotime($session1->date)) {
                                        if ($latterTemp == "") {
                                            $latterTemp = $session1->date;
                                        } else {
                                            if (strtotime($latterTemp) < strtotime($session1->date)) {
                                                $latterTemp = $session1->date;
                                            }
                                        }
                                    } else {
                                        if ($latterTemp == "") {
                                            $latterTemp = $temp;
                                            $temp = $session1->date;
                                        } else {
                                            if (strtotime($temp) > strtotime($session1->date)) {
                                                $latterTemp = $temp;
                                                $temp = $session1->date;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $weekarray = array("日", "一", "二", "三", "四", "五", "六");


        if ($latterTemp == "") {
            return substr($temp, 5, 2) . '月' . substr($temp, 8, 2) . '日 (' . $weekarray[date("w", strtotime("$temp"))] . ') ' . $time;
        } else {
            return substr($temp, 5, 2) . '月' . substr($temp, 8, 2) . '日 (' . $weekarray[date("w", strtotime("$temp"))] . ') ~ ' . substr($latterTemp, 5, 2) . '月' . substr($latterTemp, 8, 2) . '日 (' . $weekarray[date("w", strtotime("$latterTemp"))] . ')';
        }
    }

    public function check(String $id)
    {
        date_default_timezone_set('Asia/Taipei');
        $activity = Activity::find($id);
        $allSession = 0;
        $closeSession = 0;
        foreach ($activity->routes as $route) {
            foreach ($route->sessions as $session) {
                $allSession++;
                $closeSession = $closeSession + $session->state;
            }
        }
        $temp = "";

        foreach ($activity->routes as $route) {
            foreach ($route->sessions as $session) {
                if ($temp == "") {
                    $temp = $session->date;
                } else {
                    if (strtotime($session->date) > strtotime($temp)) {
                        $temp = $session->date;
                    }
                }
            }
        }

        if (strtotime($activity->open_date) > strtotime(date('Y-m-d H:i:s'))) {
            return
                '<a href="' . route('index.activity', ['id' => $id]) . '"><span class="label label-default">尚未開放 Closed</span></a>';
        } elseif (strtotime($activity->open_date) <= strtotime(date('Y-m-d H:i:s'))) {
            if ($allSession == $closeSession) {
                return
                    '<a href="' . route('index.activity', ['id' => $id]) . '"><span class="label label-default">活動已結束 Closed</span></a>';
            } else {
                return
                    '<a href="' . route('index.activity', ['id' => $id]) . '"><span class="label label-default" style="background: #85c99d;">目前開放　Opend</span></a>';
            }
        }
    }
}
