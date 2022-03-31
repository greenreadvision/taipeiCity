<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityInformation;
use App\Functions\RandomId;
use Illuminate\Http\Request;

class ActivityInformationController extends Controller
{
    //

    public function index()
    {
        $activity=Activity::orderby('id')->get();
        return view('layouts.activity.activityInformation',['data'=>$activity]);
    }


    public function update(Request $request, String $id)
    {
        $activity_ = ActivityInformation::find($id);
 
        $activity = ActivityInformation::where('activity_information_id', $id)->update($request->except('_method', '_token'));

      
        
        return redirect()->route('activity.index');
    }
}
