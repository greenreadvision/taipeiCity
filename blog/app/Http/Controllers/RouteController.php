<?php

namespace App\Http\Controllers;

use App\Route;
use App\Activity;
use App\RouteInformation;
use App\Sessions;

use App\Functions\RandomId;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //

    public function index()
    {
        $activity = Activity::orderby('id')->get();
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
        return view('layouts.route.route', ['data' => $activity, 'class' => $class]);
    }
    public function edit(String $id)
    {
        $state = ['not_open', 'open', 'full', 'cutoff', 'close', 'alternate'];
        $route = Route::find($id);
        $class = $route->class;
        $routes = Route::orderby('id')->get();
        $routeInformations = RouteInformation::orderby('id')->get();
        $sessions = Sessions::orderby('session')->get();

        return view('layouts.route.edit', ['data' => $route, 'routeInformations' => $routeInformations, 'routes' => $routes, 'sessions' => $sessions, 'state' => $state, 'class' => $class]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'class' => 'nullable|string|min:1|max:255',
            'start_location' => 'nullable|string|min:1|max:255',
            'end_location' => 'nullable|string|min:1|max:255',
            'service' => 'required|string|min:1|max:255',
            'routes' => 'required|string|min:1|max:255',
            'url' => 'nullable|string|min:1|max:500',
            'introduction' => 'nullable|string|min:1|max:500',
            'session_information' => 'nullable|string|min:1|max:255',

        ]);

        $route_ids = Route::select('route_id')->get()->map(function ($route) {
            return $route->route_id;
        })->toArray();

        $route = Route::all();
        $i = 0;
        foreach ($route as $data) {
            if ($data->activity_id == $request->input('activity_id') && $data->class == $request->input('class')) {
                $i++;
            }
        }

        $newId = RandomId::getNewId($route_ids);

        $post = Route::create([
            'route_id' => $newId,
            'activity_id' => $request->input('activity_id'),
            'id' => $i + 1,
            'person' => $request->input('person'),
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'start_location' => $request->input('start_location'),
            'end_location' => $request->input('end_location'),
            'service' => $request->input('service'),
            'routes' => $request->input('routes'),
            'url' => $request->input('url'),
            'introduction' => $request->input('introduction'),
            'session_information'=>$request->input('session_information'),
            'state' => 'not_open',
        ]);
        return redirect()->route('route.index');
    }

    public function update(Request $request, String $id)
    {
        $route_ = Route::find($id);
        $temp = $route_->id;
        $route = Route::where('route_id', $id)->update($request->except('_method', '_token'));

        $route1 = Route::all();
        $route2 = Route::find($id);
        foreach ($route1 as $data) {
            if ($data->route_id != $id && $data->id == $route2->id && $data->activity_id == $route2->activity_id && $data->class == $route2->class) {
                $data->id = $temp;
                $data->save();
            }
        }

        return redirect()->route('route.edit', ['id' => $id]);
    }

    public function destroy(String $id)
    {
        //Delete the invoice
        $route = Route::find($id);
        $class = $route->class;
        $i = $route->id;
        foreach ($route->informations as $information) {
            $information->delete();
        }
        foreach ($route->sessions as $session) {
            foreach ($session->images as $image) {
                $image->delete();
                \Illuminate\Support\Facades\Storage::delete([$image->path]);
            }
            $session->delete();
        }

        $temp = Route::all();
        foreach ($temp as $data) {
            if ($data->id > $i && $data->activity == $route->activity && $data->class == $class) {
                $data->id = $data->id - 1;
                $data->save();
            }
        }
        $route->delete();

        return redirect()->route('route.index');
    }
}
