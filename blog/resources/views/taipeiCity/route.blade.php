@extends('index')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-md-8" id="single_tour_desc">
            <div id="single_tour_feat">
                <ul>
                    @if(count($data->sessions )!= 0)
                    @if($data->sessions[0]->type != null)
                    <li>活動類型<i class="icon_set_1_icon-53"></i>
                    @foreach($data->sessions as $temp)
                        {{$temp->type}}
                        <br>
                        @endforeach
                    </li>
                    @endif
                    @endif
                    <li>播放日期<i class="icon_set_1_icon-53"></i>
                        @foreach($data->sessions as $temp)
                        {{explode('-',$temp->date)[1]}}/{{explode('-',$temp->date)[2]}}
                        (
                        <?php
                        $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                        echo $weekarray[date("w", strtotime("$temp->date"))];
                        ?>
                        )
                        <br>
                        @endforeach
                    </li>
                    <li>播放時間<i class="icon_set_1_icon-83"></i>
                        @foreach($data->sessions as $temp)
                        @if(explode(':',$temp->start_time)[0]>=12)
                        下午
                        @else
                        上午
                        @endif
                        {{str_split($temp->start_time,5)[0]}}-{{str_split($temp->end_time,5)[0]}}

                        <br>
                        @endforeach
                    </li>
                    <li>導覽員<i class="icon_set_1_icon-29"></i>
                        @foreach($data->sessions as $temp)
                        {{$temp->teacher}}
                        <br>
                        @endforeach
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4><strong>路線主題：
                            @foreach(explode("\n",$data->name) as $name)
                            {{$name." "}}
                            @endforeach
                        </strong></h4>
                    <p></p>
                    <!-- <h5><strong>路線特色：搭乘遊覽車至定點</strong></h5> -->
                    <p></p>
                    <!-- <h5><strong>集合地點</strong></h5>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li>{{$data->start_location}}</li>
                            </ul>
                        </div>
                    </div> -->
                    <h5><strong>導覽路線 What's included</strong></h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <ul class="list_ok">
                                @foreach(explode("\n",$data->routes) as $temp)
                                <li>{{$temp}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- End row  -->
                    <!-- <h5><strong>結束地點</strong></h5>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li>{{$data->end_location}}</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="row magnific-gallery">
                        <div class="col-md-12">
                            @foreach($information as $data1)
                            <h5>{{$data1->title}}</h5>
                            <p>
                                {{$data1->content}}
                            </p>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!--End  single_tour_desc-->

        <aside class="col-md-4">

            <p>
                @if($data->state == 'not_open')
                <p class="btn_full center-block" target="_blank" style="background: #918f8f;">- 尚未開放 Closed -</p>
                @elseif($data->state == 'open')
                <a href="{{$data->url}}" class="btn_full center-block">- 開放報名 Open -</a>
                @elseif($data->state == 'full')
                <p class="btn_full center-block" target="_blank" style="background: #918f8f;">- 報名額滿 Closed -</p>
                @elseif($data->state == 'cutoff')
                <p class="btn_full center-block" target="_blank" style="background: #918f8f;">- 報名截止 Closed -</p>
                @elseif($data->state == 'close')
                <p class="btn_full center-block" style="background: #918f8f;">- 活動已結束 Closed -</p>
                @elseif($data->state == 'alternate')
                <a href="{{$data->url}}" class="btn_full center-block">僅剩候補<br>OPEN</a>
                @endif
            </p>
<!-- 
            <div class="col-md-14">
                <div class="box_style_2">
                    <i class="icon_set_1_icon-68"></i>
                    <h4>- 報名場次/人數 -</h4>
                    <p>{{$data->session_information}}<br>每場次{{$data->person}}人，共{{count($data->sessions)}}場次。</p>
                </div>
            </div> -->

            <div class="col-md-14">
                <div class="box_style_2">
                    <i class="icon_set_1_icon-57"></i>
                    <h4>- 需要協助 Need Help? -</h4>
                    <small>Monday to Friday 10.00am - 17.00pm</small>
                    <h4><strong><a class="a-color" href="tel://0287728408">(02)8772-8408</a></strong></h4>
                </div>
            </div>

            <div class="col-md-14">
                <div class="box_style_2">
                    <i class="icon_set_1_icon-38"></i>
                    <h4>注意事項?</h4>
                    <small>主辦單位保留路線修改權利，依實際導覽行程現況調整</small>
                </div>
            </div>

        </aside>
    </div>
    <!--End row -->
</div>
<!--End container -->
@stop