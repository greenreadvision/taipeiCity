@extends('index')
@section('content')
<div class="container margin_60">
    <div class="row">
        @foreach($data as $video)
        <div class="col-lg-6">
            <a href="{{route('Highlights.show.IA',['id'=>$video->id])}}">
                <img src="http://img.youtube.com/vi/{{substr($video->url,-11)}}/mqdefault.jpg" alt="" width="100%">
            </a>
        </div>
        @endforeach
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div><!-- End container -->

@stop