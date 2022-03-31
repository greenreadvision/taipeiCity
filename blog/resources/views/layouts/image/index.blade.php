@extends('layouts.app')
@section('content')
<div class="col-md-12">
    @foreach($data as $temp)
    <div class="collapse-header-style" data-toggle="collapse" data-target="#collapse{{$temp->activity_id}}" aria-expanded="true" aria-controls="collapse{{$temp->activity_id}}">
        {{$temp->name}}
    </div>
    <div id="collapse{{$temp->activity_id}}" class="collapse show">
        @foreach($class as $class_data)
        @foreach($temp->routes as $route)
        @if($route->class == $class_data)
        <div class="collapse-style pl-5" style="font-size:1.3rem;background-color: rgb(243, 243, 243);" data-toggle="collapse" data-target="#collapse{{$route->route_id}}" aria-expanded="true" aria-controls="collapse{{$route->route_id}}">
            @if(count(explode("\n",$route->class))==2)
            {{explode("\n",$route->class)[0]}}-
            @endif
            {{$route->name}}
        </div>
        <div id="collapse{{$route->route_id}}" class="collapse">
            @foreach($route->sessions as $session)
            <div class="collapse-session-style " style="font-size:1.1rem" onclick="location.href='{{route('image.edit',['id'=>$session->session_id])}}'">
                {{$route->name}} {{$session->session}}
            </div>
            @endforeach
        </div>
        @endif

        @endforeach
        @endforeach
    </div>
    <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-{{$temp->activity_id}}"></a>
    <br><br> -->
    @endforeach
    <!-- @foreach($images as $image)
    <img src="{{route('download', $image['path'])}}" >
    @endforeach -->
</div>

@stop