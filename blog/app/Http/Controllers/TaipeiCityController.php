<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Homes;
use App\News;
use App\SignUpInformation;
use App\Route;
use App\RouteInformation;
use App\Story;
use App\Images;
use App\Videoes;
use App\Sessions;
use Illuminate\Http\Request;

class TaipeiCityController extends Controller
{
    //

    public function index()
    {
        $news = News::orderby('id')->get();
        $activity = Activity::orderby('id')->get();
        $home=Homes::all();
        foreach($home as $data){
            $data->path = explode('/', $data->path);
         }
        return view('home',['data'=>$home[0],'news'=>$news,'activity'=>$activity]);
    }

    public function news()
    {
        $news = News::orderby('id','dec')->get();

        foreach ($news as $new) {

            $new->path = explode('/', $new->path);
            $new->list_path = explode('/', $new->list_path);
            $new->notice_path = explode('/', $new->notice_path);
        }
        return view('taipeiCity.news.news',['data'=>$news]);
    }

    public function newsShow(String $id)
    {
        $news = News::find($id);
        $news->path = explode('/', $news->path);
        $news->list_path = explode('/', $news->list_path);
        $news->notice_path = explode('/', $news->notice_path);
        return view('taipeiCity.news.show',['data'=>$news]);
    }

    public function activity( String $id)
    {
        $activity = Activity::find($id);
        $routes = Route::all();
        $temp = SignUpInformation::orderby('number')->distinct()->get();
        $cn = [];
        $en = [];
        $class=[];
        $classTemp="";
        $state=0;
        foreach ($routes as $route) {
            $state_class = 0;
            if ($route->class != null && $route->class != $classTemp) {
                $classTemp = $route->class;
                foreach ($class as $classtemp) {
                    if ($route->class == $classtemp) {
                        $state_class = 1;
                    }
                }
                if ($state_class == 0) {
                    array_push($class, $route->class);
                }
            }
        }
        foreach ($temp as $data) {
            if ($data->type == 'cn') {
                array_push($cn, $data);
            } else if ($data->type == 'en') {
                array_push($en, $data);
            }
        }
      
            foreach($activity->routes as $route){
                if($route->class !=null){
                    $state=1;
                }
            }
        
        return view('taipeiCity.activity', ['data' => $activity, 'cn' => $cn, 'en' => $en,'class'=>$class,'state'=>$state]);
    }

    public function route( String $id, String $route_id)
    {
        $route = Route::find($route_id);
        $routeInformation = RouteInformation::orderby('id')->get();
        $temp = [];
        
        foreach ($routeInformation as $data) {
            if ($data->route_id == $route_id) {
                array_push($temp, $data);
            }
        }

        return view('taipeiCity.route', ['data' => $route,'information'=>$temp]);
    }
    public function Highlights()
    {
        $activity = Activity::orderby('id')->get();
        return view('taipeiCity.highlight.Highlights',['data'=>$activity]);
    }
    public function map()
    {
        $activity = Activity::orderby('id')->get();
        return view('taipeiCity.map',['data'=>$activity]);
    }

    public function manual(){
        return view('taipeiCity.manual');
    }

    public function ExcitingActivity()
    {
        $activity = Activity::orderby('id')->get();
        return view('taipeiCity.highlight.EA.ExcitingActivity',['data'=>$activity]);
    }

    public function InstantActivity()
    {
        $videoes = Videoes::orderby('id')->get();
        return view('taipeiCity.highlight.IA.index',['data'=>$videoes]);
    }
    public function ShowInstantActivity(String $id)
    {
        $video = Videoes::find($id);
        return view('taipeiCity.highlight.IA.InstantActivity',['data'=>$video]);
    }

    public function select(String $type,String $id)
    {
        $activity = Activity::find($id);
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
        return view('taipeiCity.highlight.select',['data'=>$activity,'type'=>$type,'class'=>$class]);
    }

    public function show(String $type,String $activity_id,String $route_id,String $session_id)
    {
        $activity = Activity::find($activity_id);
        $images=Images::all();
        $image_array=[];
        foreach ($images as $image) {
            $image->path = explode('/', $image->path);
            if ($image->session_id == $session_id) {
                array_push($image_array, $image);
            }
        }

        $route0=Route::find($route_id);
        $session=Sessions::find($session_id);

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
        return view('taipeiCity.highlight.show',['data'=>$activity,'images'=>$image_array,'route'=>$route0,'session'=>$session,'type'=>$type,'class'=>$class]);
    }

    public function WarmStory()
    {
        $stories = Story::orderby('id')->get();
        return view('taipeiCity.highlight.WS.WarmStory', ['stories' => $stories]);
    }
    public function WarmStoryShow(String $id)
    {
        $stories = Story::find($id);
        return view('taipeiCity.highlight.WS.show', ['stories' => $stories]);
    }
}
