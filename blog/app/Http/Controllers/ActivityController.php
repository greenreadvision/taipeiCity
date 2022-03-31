<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityInformation;
use App\Functions\RandomId;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ActivityController extends Controller
{
    //

    public function index()
    {
        $activity = Activity::orderby('id')->get();
        return view('layouts.activity.activity', ['data' => $activity]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' =>  'required|string|min:1|max:255'
        ]);
        $activity_ids = Activity::select('activity_id')->get()->map(function ($activity) {
            return $activity->activity_id;
        })->toArray();
        $newId = RandomId::getNewId($activity_ids);
        $post = Activity::create([
            'activity_id' => $newId,
            'id' => count($activity_ids) + 1,
            'name' =>   $request->input('name'),
            'open_date' =>  $request->input('open_date'),
            'state' =>  'not_open',
        ]);
        $activity_information_ids = ActivityInformation::select('activity_information_id')->get()->map(function ($activity_information) {
            return $activity_information->activity_information_id;
        })->toArray();
        $new = RandomId::getNewId($activity_information_ids);
        $post = ActivityInformation::create([
            'activity_information_id' => $new,
            'activity_id' => $newId,
            'introduction_cn' => '',
            'introduction_en' => '',
            'information' => '',
            'remind' => ''
        ]);
        return redirect()->route('activity.index');
    }

    public function update(Request $request, String $id)
    {
        $activity_ = Activity::find($id);
        $temp = $activity_->id;
        $activity = Activity::where('activity_id', $id)->update($request->except('_method', '_token'));

        $activity1 = Activity::all();
        $activity2 = Activity::find($id);
        foreach ($activity1 as $data) {
            if ($data->activity_id != $id && $data->id == $activity2->id) {
                $data->id = $temp;
                $data->save();
            }
        }

        return redirect()->route('activity.index');
    }

    public function destroy(String $id)
    {
        $activity_ = Activity::find($id);
        $i = $activity_->id;

        foreach ($activity_->activityInformation as $information) {
            $information->delete();
        }
        foreach ($activity_->routes as $route) {

            foreach ($route->informations as $information) {
                $information->delete();
            }
            foreach ($route->sessions as $session) {
                foreach ($session->images as $image) {
                    $image->delete();
                    \Illuminate\Support\Facades\Storage::delete([$image->path]);
                }
                foreach ($session->contents as $content) {
                    $content->delete();
                }
                $session->delete();
            }

            $route->delete();
        }

        $activity_->delete();
        $temp = Activity::all();
        foreach ($temp as $data) {
            if ($data->id > $i) {
                $data->id = $data->id - 1;
                $data->save();
            }
        }
        return redirect()->route('activity.index');
    }
}
