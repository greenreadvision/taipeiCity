<?php

use App\Activity;
use App\Route;
use App\Sessions;

$route=Route::all();
$activity = Activity::all();
$session = Sessions::all();
$activityArray=[];
foreach($activity as $temp){
    $tempArray=array($temp->activity_id=>explode("\n",$temp->name)[0].' '.explode("\n",$temp->name)[1]);
    $activityArray=array_merge($activityArray,$tempArray);
}
foreach($route as $temp){
    if(count(explode("\n",$temp->name))==2){
        $tempArray=array($temp->route_id=>explode("\n",$temp->name)[0].' '.explode("\n",$temp->name)[1]);
        $activityArray=array_merge($activityArray,$tempArray);
    }
    
}
foreach($session as $temp){
    if($temp->session !=""){
        $tempArray=array($temp->session_id=>$temp->session.'梯次');
    }
    else{
        $tempArray=array($temp->session_id=>"");
    }
    $activityArray=array_merge($activityArray,$tempArray);

}
$array=[
    '0'=>'一',
    '1'=>'一',
    '2'=>'二',
    '3'=>'三',
    '4'=>'四',
    '5'=>'五',
    '6'=>'六',
    '7'=>'七',
    '8'=>'八',
    '9'=>'九',
    '10'=>'十',
    '11'=>'十一',
    '12'=>'十二',
    '13'=>'十三',
    '14'=>'十四',
    '15'=>'十五',

    ''=>'首頁 Home',
    'news'=>'最新消息 News',
    'GatheringsInTaipei'=>'史蹟大會師 Gatherings in Taipei',
    'HalfDayTour'=>'史蹟半日遊 Half Day Tour',
    'NightStrolling'=>'夜遊古蹟 Night Strolling',
    'Highlights'=>'活動花絮 Highlights',
    'ExcitingActivity'=>'拍攝集錦 Shooting highlights',
    'InstantActivity'=>'宣傳短片 Promotional Video',
    'WarmStory'=>'溫馨故事報導 Warm Story',

    'not_open'=>'尚未開放',
    'open'=>'目前開放',
    'full'=>'報名額滿',
    'cutoff'=>'報名截止',
    'close'=>'活動已結束',
    'alternate'=>'僅剩候補',
    'Instant%20Activity'=>'宣傳短片 Promotional Video',
    'Exciting%20Activity'=>'拍攝集錦 Shooting highlights',
    'Warm%20Story'=>'溫馨故事報導 Warm Story',
    'Instant Activity'=>'即時活動',
    'Exciting Activity'=>'精彩活動',
    'Warm Story'=>'溫馨故事',

    'map' =>'電子地圖 Digital Map',
    'manual' => '手冊 Guidebook'
];

$activityArray=array_merge($activityArray,$array);

return $activityArray;
