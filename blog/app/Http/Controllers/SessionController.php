<?php

namespace App\Http\Controllers;

use App\Route;
use App\Activity;
use App\Sessions;


use App\Functions\RandomId;
use Illuminate\Http\Request;

class SessionController extends Controller
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
        return view('layouts.route.session', ['data' => $temp,'activity' =>$activity]);
    }

    public function create(Request $request,String $id)
    {
        $request->validate([
            'type' => 'nullable|string',
            'teacher' => 'required|string',
            'session' => 'nullable|string',
        ]);

        $session_ids = Sessions::select('session_id')->get()->map(function ($session) {
            return $session->session_id;
        })->toArray();

        $newId = RandomId::getNewId($session_ids);

        $post = Sessions::create([
            'session_id' => $newId,
            'route_id' => $id,
            'type' => $request->input('type'),
            'teacher' => $request->input('teacher'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'session' => $request->input('session'),
            'state' => '0',
        ]);
        $content_ids = Contents::select('content_id')->get()->map(function ($content) {
            return $content->content_id;
        })->toArray();

        $newId_content = RandomId::getNewId($content_ids);
        $create = Contents::create([
            'content_id' => $newId_content,
            'session_id' => $newId,
        ]);

        return redirect()->route('route.edit',['id'=>$id]);
    }

    public function update(Request $request, String $id,String $session)
    {
        $session_ = Sessions::find($session);
        $temp = $session_->session;
        $session__ = Sessions::where('session_id', $session)->update($request->except('_method', '_token'));
        $session1 = Sessions::all();
        $session2 = Sessions::find($session);
        foreach($session1 as $data){
            if($data->session_id != $session && $data->session == $session2->session){
                $data->session=$temp;
                $data->save();
            }
        }
        
        return redirect()->route('route.edit',['id'=>$id]);
    }

    public function destroy(String $id,String $session_id)
    {
        //Delete the invoice
        $session = Sessions::find($session_id);
        $route=$session->route;
        $i = $session->session;
        // $i=$session->session;
        \Illuminate\Support\Facades\Storage::delete([$session->path]);
        foreach ($session->images as $image){
            $image->delete();
            \Illuminate\Support\Facades\Storage::delete([$image->path]);
        } 

        
    
        $session->delete();

        $temp = Sessions::all();

        foreach($temp as $data){
            if(ord($data->session)>ord($i) && $data->route == $route){
                $data->session=chr( ord($data->session) -1) ;
                $data->save();
            }
        }
        return redirect()->route('route.edit',['id'=>$id]);
    }
}
