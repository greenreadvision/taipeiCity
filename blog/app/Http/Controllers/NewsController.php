<?php

namespace App\Http\Controllers;

use App\News;
use App\Functions\RandomId;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function index()
    {
        $news = News::orderby('id')->get();

        foreach ($news as $new) {

            $new->path = explode('/', $new->path);
            $new->list_path = explode('/', $new->list_path);
            $new->notice_path = explode('/', $new->notice_path);
        }

        return view('layouts.news.index', ['data' => $news]);
    }

    public function create(Request $request)
    {

        $list_path = null;
        $notice_path = null;
        $path = null;
        $link_path = null;
        $content = null;

        $news_ids = News::select('news_id')->get()->map(function ($new) {
            return $new->news_id;
        })->toArray();

        $newId = RandomId::getNewId($news_ids);

        if ($request->hasFile('list_path')) {
            if ($request->list_path->isValid()) {
                $list_path = $request->list_path->store('list');
            }
        }
        if ($request->hasFile('notice_path')) {
            if ($request->notice_path->isValid()) {
                $notice_path = $request->notice_path->store('notice');
            }
        }
        if ($request->hasFile('path')) {
            if ($request->path->isValid()) {
                $path = $request->path->store('news');
            }
        }
        if($request->has('link_content')){
            $link_path = $request->link_content;
        }
        

        $post = News::create([
            'news_id' => $newId,
            'id' => count($news_ids) + 1,
            'list_path' => $list_path,
            'notice_path' => $notice_path,
            'path' => $path,
            'title' => $request->input('title'),
            'link_path' => $link_path,
            'content' => $content
        ]);



        return redirect()->route('news.index');
    }


    public function update(Request $request, String $id)
    {

        $new_ = News::find($id);
        $temp = $new_->id;
        $new_->id = $request->input('id');
        $new_->save();
        $new1 = News::all();
        $new2 = News::find($id);
        foreach ($new1 as $data) {
            if ($data->news_id != $id && $data->id == $new2->id) {
                $data->id = $temp;
                $data->save();
            }
        }
        
        $path = null;
        if ($request->hasFile('path')) {
            if ($request->path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$new_->path]);
                $path = $request->path->store('news');
                $new_->path = $path;
            }
        }

        $list_path = null;
        if ($request->hasFile('list_path')) {
            if ($request->list_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$new_->list_path]);
                $list_path = $request->list_path->store('list');
                $new_->list_path = $list_path;
            }
        }

        $notice_path = null;
        if ($request->hasFile('notice_path')) {
            if ($request->notice_path->isValid()) {
                \Illuminate\Support\Facades\Storage::delete([$new_->notice_path]);
                $notice_path = $request->notice_path->store('notice');
                $new_->notice_path = $notice_path;
            }
        }


        $new_->title = $request->input('title');
        $new_->content = $request->input('content');
        $new_->save();

        return redirect()->route('news.index');
    }

    public function destroy(Request $request,String $id)
    {
        $new = News::find($id);
        $i=$new->id;
       
        \Illuminate\Support\Facades\Storage::delete([$new->path]);
        \Illuminate\Support\Facades\Storage::delete([$new->list_path]);
        \Illuminate\Support\Facades\Storage::delete([$new->notice_path]);

        $temp=News::all();
        foreach($temp as $data){
            if($data->id>$i){
                $data->id=$data->id - 1;
                $data->save();
            }
        }
        $new->delete();
        return redirect()->route('news.index');
    }
}
