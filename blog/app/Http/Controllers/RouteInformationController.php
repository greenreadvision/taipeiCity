<?php

namespace App\Http\Controllers;

use App\Route;
use App\Activity;
use App\Sessions;
use App\Functions\RandomId;
use App\RouteInformation;
use Illuminate\Http\Request;

class RouteInformationController extends Controller
{
    //

    public function index()
    {
        $route = Route::orderby('id')->get();
        $activity = Activity::orderby('id')->get();
        $temp = [];
        
        foreach ($activity as $activity_data) {
            foreach ($route as $route_data) {
                if ($activity_data->activity_id == $route_data->activity_id) {
                    array_push($temp, $route_data);
                }
            }
        }
        return view('layouts.route.information', ['data' => $temp,'activity' =>$activity]);
    }

    public function create(Request $request,String $id)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $route_information_ids = RouteInformation::select('route_information_id')->get()->map(function ($route_information) {
            return $route_information->route_information_id;
        })->toArray();

        $newId = RandomId::getNewId($route_information_ids);

        $routeInformation = RouteInformation::all();
        $i=0;
        foreach ($routeInformation as $data) {
            if ($data->route_id == $id) {
                $i++;
            }
        }

        $post = RouteInformation::create([
            'route_information_id' => $newId,
            'route_id' => $id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'id'=>$i+1
        ]);
        return redirect()->route('route.edit',['id'=>$id]);
    }

    public function update(Request $request, String $id,String $information)
    {
        $route_ = RouteInformation::find($information);
        $temp = $route_->id;
        $route = RouteInformation::where('route_information_id', $information)->update($request->except('_method', '_token'));

        $route1 = RouteInformation::all();
        $route2 = RouteInformation::find($information);
        foreach($route1 as $data){
            if($data->route_information_id != $information && $data->id==$route2->id){
                $data->id=$temp;
                $data->save();
            }
        }
        
        return redirect()->route('route.edit',['id'=>$id]);
    }

    public function destroy(String $id,String $information)
    {
        //Delete the invoice
        $routeInformation = RouteInformation::find($information);
        $i=$routeInformation->id;

        $routeInformation->delete();

        $temp=RouteInformation::all();
        foreach($temp as $data){
            if($data->id>$i){
                $data->id=$data->id - 1;
                $data->save();
            }
        }
        return redirect()->route('route.edit',['id'=>$id]);
    }
}
