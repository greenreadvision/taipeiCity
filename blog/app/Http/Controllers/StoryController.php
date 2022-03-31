<?php

namespace App\Http\Controllers;

use App\Story;
use App\Functions\RandomId;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    //

    public function index()
    {
        $stories = Story::orderby('id')->get();
        return view('layouts.story.index', ['stories' => $stories]);
    }

    public function create(Request $request)
    {

        $path = null;

        $story_ids = Story::select('story_id')->get()->map(function ($story) {
            return $story->story_id;
        })->toArray();

        $newId = RandomId::getNewId($story_ids);
        for ($i = 0; $i < count($request->path); $i++) {
            if ($request->hasFile('path')) {
                if ($request->path[$i]->isValid()) {
                    $path = $path . $request->path[$i]->store('image') . ';';
                }
            }
        }

        $post = Story::create([
            'story_id' => $newId,
            'id' => count($story_ids) + 1,
            'path' => $path,
            'content' => $request->input('content'),
            'tag' => $request->input('tag')

        ]);

        return redirect()->route('story.index');
    }


    public function update(Request $request, String $id)
    {

        $story_ = Story::find($id);
        $temp = $story_->id;
        $story_->id = $request->input('id');
        $story_->save();
        $story1 = Story::all();
        $story2 = Story::find($id);
        foreach ($story1 as $data) {
            if ($data->story_id != $id && $data->id == $story2->id) {
                $data->id = $temp;
                $data->save();
            }
        }
        $path = null;
        if ($request->hasFile('path')) {
            foreach(explode(';',$story_->path) as $story_path){
                \Illuminate\Support\Facades\Storage::delete([$story_path]);
            }
            for ($i = 0; $i < count($request->path); $i++) {

                if ($request->path[$i]->isValid()) {
                    $path = $path . $request->path[$i]->store('image') . ';';
                }
            }
            $story_->path=$path;
        }






        $story_->tag = $request->input('tag');
        $story_->content = $request->input('content');
        $story_->save();

        return redirect()->route('story.index');

    }

    public function destroy(Request $request, String $id)
    {
        $story = Story::find($id);
        $i = $story->id;

        foreach(explode(';',$story->path) as $story_path){
            \Illuminate\Support\Facades\Storage::delete([$story_path]);
        }

        $temp = Story::all();
        foreach ($temp as $data) {
            if ($data->id > $i) {
                $data->id = $data->id - 1;
                $data->save();
            }
        }
        $story->delete();
        return redirect()->route('story.index');
    }
}
