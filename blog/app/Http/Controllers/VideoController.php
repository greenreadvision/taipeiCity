<?php

namespace App\Http\Controllers;

use App\Videoes;


use App\Functions\RandomId;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //

    public function index()
    {
       $videoes = Videoes::orderby('id')->get();
        return view('layouts.video.index',['data'=>$videoes]);
    }

    public function edit(String $session_id)
    {
       
    }
   

    public function create(Request $request)
    {
        
        $post = Videoes::create([
            'url' => $request->input('url'),
            'content' =>   $request->input('content'),
        ]);
      
        return redirect()->route('video.index');

    }

    public function update(Request $request, String $id)
    {

        $videos = Videoes::find($id);

        $videos = Videoes::where('id', $id)->update($request->except('_method', '_token'));

        return redirect()->route('video.index');
    }
    public function destroy(Request $request, String $id)
    {
        $video = Videoes::find($id);
        $video->delete();
        return redirect()->route('video.index');
    }
   
}
