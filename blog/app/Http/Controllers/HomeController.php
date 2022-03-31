<?php

namespace App\Http\Controllers;

use App\Homes;
use App\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Homes::all();
        foreach ($home as $data) {
            $data->logo_path = explode('/', $data->logo_path);
            $data->path = explode('/', $data->path);
            $data->navbar_path = explode('/', $data->navbar_path);
            $data->footer_path = explode('/', $data->footer_path);
            $data->host_path = explode('/', $data->host_path);
        }

        $status = Status::find('1');
        return view('layouts.homes', ['data' => $home[0],'status'=>$status]);
    }

    public function create(Request $request)
    {
        $path = null;
        if ($request->hasFile('path')) {
            if ($request->path->isValid()) {
                $path = $request->path->store('image');
            }
        }

        $logo_path = null;
        if ($request->hasFile('logo_path')) {
            if ($request->logo_path->isValid()) {
                $logo_path = $request->logo_path->store('image');
            }
        }

        $navbar_path = null;
        if ($request->hasFile('navbar_path')) {
            if ($request->navbar_path->isValid()) {
                $navbar_path = $request->navbar_path->store('image');
            }
        }

        $footer_path = null;
        if ($request->hasFile('footer_path')) {
            if ($request->footer_path->isValid()) {
                $footer_path = $request->footer_path->store('image');
            }
        }

        $host_path = null;
        if ($request->hasFile('host_path')) {
            if ($request->host_path->isValid()) {
                $host_path = $request->host_path->store('image');
            }
        }
        $post = Homes::create([
            'name' => $request->input('name'),
            'introduction_cn' => $request->input('introduction_cn'),
            'introduction_en' => $request->input('introduction_en'),
            'path' => $path,
            'logo_path' => $logo_path,
            'navbar_path' => $navbar_path,
            'footer_path' => $footer_path,
            'host_path' => $host_path
        ]);


        return redirect()->route('home.index');
    }

    public function update(Request $request, String $id)
    {

        $home_ = Homes::find($id);
        $logo_path = null;
        if ($request->hasFile('logo_path')) {
            if ($request->logo_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$home_->logo_path]);
                $logo_path = $request->logo_path->store('image');
                $home_->logo_path = $logo_path;
            }
        }

        $path = null;
        if ($request->hasFile('path')) {
            if ($request->path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$home_->path]);
                $path = $request->path->store('image');
                $home_->path = $path;
            }
        }

        $navbar_path = null;
        if ($request->hasFile('navbar_path')) {
            if ($request->navbar_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$home_->navbar_path]);
                $navbar_path = $request->navbar_path->store('image');
                $home_->navbar_path = $navbar_path;
            }
        }

        $footer_path = null;
        if ($request->hasFile('footer_path')) {
            if ($request->footer_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$home_->footer_path]);
                $footer_path = $request->footer_path->store('image');
                $home_->footer_path = $footer_path;
            }
        }

        $host_path = null;
        if ($request->hasFile('host_path')) {
            if ($request->host_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$home_->host_path]);
                $host_path = $request->host_path->store('image');
                $home_->host_path = $host_path;
            }
        }
        $home_->name = $request->input('name');
        $home_->introduction_cn = $request->input('introduction_cn');
        $home_->introduction_en = $request->input('introduction_en');
        $home_->navbar_color = $request->input('navbar_color');
        $home_->navbar_color_hover = $request->input('navbar_color_hover');
        $home_->a_color = $request->input('a_color');
        $home_->a_color_hover = $request->input('a_color_hover');
        $home_->footer_color = $request->input('footer_color');
        $home_->footer_color_hover = $request->input('footer_color_hover');
        $home_->save();

        return redirect()->route('home.index');
    }

    public function destroy(String $id, String $data, String $path)
    {
        $home = Homes::find($id);
       if($home->path == $data."/".$path){
           $home->path = "";
           
        \Illuminate\Support\Facades\Storage::delete([$data."/".$path]);
       }
        
       $home->save();

        return redirect()->route('home.index');
    }
}
