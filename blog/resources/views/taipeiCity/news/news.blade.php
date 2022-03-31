@extends('index')

@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-md-12">
            <h2><strong>最新消息 News</strong></h2>
            <br>
            <hr>
            @foreach($data as $new)
            <div>
                <a class="a-color" href="{{route('news.show',['id'=>$new->news_id])}}">{{$new->title}}</a>
                <hr>
            </div>
            @endforeach
            <br><br><br><br><br>
            <br><br><br><br><br>
            <br><br><br><br><br>
        </div>
        <!--End  single_tour_desc-->
    </div>
    <!--End row -->
</div><!-- End container -->
<div id="qrcode-canvas">
    
</div>
@stop
