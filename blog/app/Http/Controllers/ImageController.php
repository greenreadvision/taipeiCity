<?php

namespace App\Http\Controllers;

use App\Images;
use App\Activity;
use App\Route;


use App\Sessions;

use App\Functions\RandomId;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function index()
    {
        $activity=Activity::orderby('id')->get();
        $image=Images::all();
        foreach($image as $data){
            $data->path = explode('/', $data->path);
            
         }
          $routes = Route::all();
        $classTemp = "";
        $class = [""];

        foreach ($routes as $route) {
            $state = 0;
            if ($route->class != null && $route->class != $classTemp) {
                $classTemp = $route->class;
                foreach ($class as $temp) {
                    if ($route->class == $temp) {
                        $state = 1;
                    }
                }
                if ($state == 0) {
                    array_push($class, $route->class);
                }
            }
        }
        return view('layouts.image.index',['data'=>$activity,'images'=>$image,'class'=>$class]);
    }

    public function edit(String $session_id)
    {
        $sessions=Sessions::find($session_id);
        $images=Images::all();
        foreach($sessions->images as $image){
           
                $image->path = explode('/', $image->path);
    
        }

        return view('layouts.image.show',['data'=>$sessions,'id'=>$session_id]);
    }
   
    public function create(Request $request,String $session_id)
    {
        for($i=0 ; $i<count($request->path) ; $i++){
            $file_path=null;

            $image_ids = Images::select('image_id')->get()->map(function ($image) {
                return $image->image_id;
            })->toArray();
    
            $newId = RandomId::getNewId($image_ids);

            if ($request->hasFile('path')){
                if ($request->path[$i]->isValid()){
                    $file_path = $request->path[$i]->store('image');
                }
            }
            $post = Images::create([
                'image_id' => $newId,
                'session_id' => $session_id,
                'path'=>$file_path,
                'url'=>$request->input('url')
            ]);
        }
        
    
        return redirect()->route('image.edit',['id'=>$session_id]);
    }


    public function destroy(Request $request,String $session_id)
    {
        $temp = $request->input('checkbox');
        $Images = Images::all();
        foreach($temp as $data){
           foreach($Images as $image){
               if($image['image_id']==$data){
                $image->delete();
                \Illuminate\Support\Facades\Storage::delete([$image->path]);
               }
           }
            
        }
        return redirect()->route('image.edit',['id'=>$session_id]);
    }
   
}
