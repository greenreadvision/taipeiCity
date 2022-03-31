@extends('index')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;"><strong>溫馨故事報導</strong></h1>
            <h3 style="text-align:center;">Warm Story</h3>
            <br>

            <hr>
            <div class="row">
                <div class="col-md-6">
                    @foreach(explode(';',$stories->path) as $path)
                    @if($path != "")
                    <img style="margin-bottom:10px" src="{{route('download', explode('/',$path))}}" width="100%">
                    @endif
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div style="padding:1%;word-break: break-all;">
                        <h4 style="line-height: 30px;">
                            @foreach(explode("\n",$stories->content) as $content)
                           {{$content}}
                           <br>
                            @endforeach
                        </h4>
                        <div><a style="line-height: 30px;font-size:18px" href="">
                        @foreach(explode("#",$stories->tag) as $tag)
                          @if($tag != "")
                          #{{$tag}}
                           <br>
                          @endif
                            @endforeach
                            </a></div>
                    </div>

                </div>
            </div>

        </div>
        <!--End  single_tour_desc-->
    </div>
    <!--End row -->
    <!-- img-responsive styled-->
</div><!-- End container -->
@stop