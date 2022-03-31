@extends('index')

@section('content')
<div class="container margin_60">
    <div class="" style="">
        <h2 style="text-align:center;">{{$data->title}}</h2>
        <hr>
        <div style="text-align:center;">
            @foreach(explode("\n",$data->content) as $content)
            @if(strpos($content,"a=>") !== false)
            <h3><a href="{{explode('a=>',$content)[1]}}">{{explode("a=>",$content)[1]}}</a></h3>
            <br>
            @else
            <h3>{{$content}}</h3>
            <br>
            @endif
            @endforeach
            @if($data->notice_path[0] !=null)
            <a href="{{route('download', $data['notice_path'])}}">【行前通知】點擊下載</a>
            @endif
        </div>
        <br>
        @if($data->path[0] !=null)
        <div style="text-align:center;">
            <img src="{{route('download', $data['path'])}}" width='60%' alt="" class="">
        </div>
        @endif
        @if($data->list_path[0] !=null)
        <div style="text-align:center;">
            <img src="{{route('download', $data['list_path'])}}" width='60%' alt="" class="">
        </div>
        @endif
    </div>
</div>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
@stop