@extends('index')
@section('content')
<?php
include app_path() . '/Functions/checkOpen.php';
$checkOpen = new CheckOpen();
$checkOpen->show();
?>
<div class="container margin_60">
    <!-- @if(strtotime($data->open_date) > strtotime(date('Y-m-d H:i'))) 
        <h2 style="color:#2b5985;">
            <strong>
                {{$data->name}} 報名開始時間：{{substr($data->open_date,5,2)}}月{{substr($data->open_date,8,2)}}日
                (<?php
                    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                    echo $weekarray[date("w", strtotime("substr($data->open_date,0,4)"))];
                    ?>)
                @if(explode(':',substr($data->open_date,11,2))[0]>=12)
                下午
                @else
                上午
                @endif
                @if(substr($data->open_date,11,2) > 12 )
                {{substr($data->open_date,11,2)-12}}
                @else
                {{substr($data->open_date,11,2)}}
                @endif
                
                點
                。
            </strong>
        </h2>
        <hr>
        @endif -->
        <div class="">
            <h3>
                <strong>
                    @foreach(explode("\n",$data->name) as $name)
                    {{$name." "}}
                    @endforeach
                </strong>
            </h3>

            @foreach($data->activityInformation as $temp)
            <p>{{$temp->introduction_cn}}</p>
            <p>{{$temp->introduction_en}}</p>
            @foreach(explode("\n",$temp->information) as $string)
            <h4><strong>{{$string}}</strong></h4>
            @endforeach
            @endforeach
            <hr>
        </div>
        <br>
        <!-- @if(strtotime($data->open_date) <= strtotime(date('Y-m-d H:i')))  -->
        <!-- @endif -->

        @if($state==1)
        
        @foreach($class as $class_data)

        <h3>
            <strong>
                @foreach(explode("\n",$class_data) as $type)
                {{$type}}
                <br>
                @endforeach
            </strong>
        </h3>
        <div class="row">
            <div class="col-md-12">
                <div class=" table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width=120 style="text-align:center;">
                                    <strong>日期 Date</strong>
                                </th>
                                <th width=160 style="text-align:center;">
                                    <strong>報名 Register</strong>
                                </th>
                                <th>
                                    <strong>主題介紹 Route</strong>
                                </th>
                                <th>
                                    <strong>服務對象 Service Objects</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->routes as $temp)
                            @if($temp->class == $class_data)
                            <tr>
                                <td style="text-align: center;">
                                    @foreach($temp->sessions as $key =>$value)
                                    @if($key==0||($key>0 && $temp->sessions[$key]->date!= $temp->sessions[$key -1]->date))
                                    {{explode('-',$value->date)[1]}}/{{explode('-',$value->date)[2]}}
                                    (
                                    <?php
                                    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                                    echo $weekarray[date("w", strtotime("$value->date"))];
                                    ?>
                                    )
                                    @if(explode(':',$value->start_time)[0]>=12)
                                    下午
                                    @else
                                    上午
                                    @endif

                                    <br>
                                    @endif
                                    @endforeach
                                </td>
                                <td disabled>
                                    @if($temp->state == 'not_open')
                                    <p class="btn_full center-block" style="background: #918f8f;">尚未開放<br>ClOSED</p>
                                    @elseif($temp->state == 'open')
                                    <a href="{{$temp->url}}" class="btn_full center-block">開放報名<br>OPEN</a>
                                    @elseif($temp->state == 'full')
                                    <p class="btn_full center-block" style="background: #918f8f;">報名額滿<br>ClOSED</p>
                                    @elseif($temp->state == 'cutoff')
                                    <p class="btn_full center-block" style="background: #918f8f;">報名截止<br>ClOSED</p>
                                    @elseif($temp->state == 'close')
                                    <p class="btn_full center-block" style="background: #918f8f;">活動已結束<br>ClOSED</p>
                                    @elseif($temp->state == 'alternate')
                                    <a href="{{$temp->url}}" class="btn_full center-block">僅剩候補<br>OPEN</a>
                                    @endif
                                </td>
                                <td>
                                    <a class=" a-color" href="{{route('index.route',['id'=>$data->activity_id,'routeId'=>$temp->route_id])}}">
                                        @foreach(explode("\n",$temp->name) as $name)
                                        {{$name." "}}
                                        @endforeach
                                        <br>
                                        @foreach(explode("\n",$temp->introduction) as $content)
                                        {{$content}}
                                        <br>
                                        @endforeach
                                    </a>
                                </td>
                                <td>
                                    {{$temp->service}}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        
        @else
        <div class="row">
            <div class="col-md-12">
                <div class=" table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width=120 style="text-align:center;">
                                    <strong>日期 Date</strong>
                                </th>
                                <th width=160 style="text-align:center;">
                                    <strong>報名 Register</strong>
                                </th>
                                <th>
                                    <strong>主題介紹 Route</strong>
                                </th>
                                <th>
                                    <strong>服務對象 Service Objects</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->routes as $temp)

                            <tr>
                                <td style="text-align: center;">
                                    @foreach($temp->sessions as $key =>$value)
                                    @if($key==0||($key>0 && $temp->sessions[$key]->date!= $temp->sessions[$key -1]->date))
                                    {{explode('-',$value->date)[1]}}/{{explode('-',$value->date)[2]}}
                                    (
                                    <?php
                                    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                                    echo $weekarray[date("w", strtotime("$value->date"))];
                                    ?>
                                    )
                                    @if(explode(':',$value->start_time)[0]>=12)
                                    下午
                                    @else
                                    上午
                                    @endif

                                    <br>
                                    @endif
                                    @endforeach
                                </td>
                                <td disabled>
                                    @if($temp->state == 'not_open')
                                    <p class="btn_full center-block" style="background: #918f8f;">尚未開放<br>ClOSED</p>
                                    @elseif($temp->state == 'open')
                                    <a href="{{$temp->url}}" class="btn_full center-block">開放報名<br>OPEN</a>
                                    @elseif($temp->state == 'full')
                                    <p class="btn_full center-block" style="background: #918f8f;">報名額滿<br>ClOSED</p>
                                    @elseif($temp->state == 'cutoff')
                                    <p class="btn_full center-block" style="background: #918f8f;">報名截止<br>ClOSED</p>
                                    @elseif($temp->state == 'close')
                                    <p class="btn_full center-block" style="background: #918f8f;">活動已結束<br>ClOSED</p>
                                    @elseif($temp->state == 'alternate')
                                    <a href="" class="btn_full center-block">僅剩候補<br>OPEN</a>
                                    @endif
                                </td>
                                <td>
                                <a class=" a-color" href="{{route('index.route',['id'=>$data->activity_id,'routeId'=>$temp->route_id])}}">
                                        @foreach(explode("\n",$temp->name) as $name)
                                        {{$name." "}}
                                        @endforeach
                                        <br>
                                       
                                        @foreach(explode("\n",$temp->introduction) as $content)
                                        {{$content}}
                                        <br>
                                        @endforeach
                                    </a>
                                </td>
                                <td>
                                    {{$temp->service}}
                                </td>

                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">


                @foreach($data->activityInformation as $temp)
                @if($temp->remind !=null)
                <h5><strong><i class="icon_set_1_icon-56"></i> {{$temp->remind}} </strong></h5>
                @endif

                @endforeach

                <p></p>
                <div class="row">
                    <div class="col-md-12 signUp-information-table">
                        <h5><strong>【報名資訊】</strong></h5>
                        <table>
                            <tbody>
                                @foreach($cn as $data)
                                <tr>
                                    <td nowrap="nowrap" align="center" valign="top">
                                        <h5 style="margin-bottom: 0"><strong>({{__('customize.'.$data->number)}})&nbsp;</strong></h5>
                                    </td>
                                    <td>
                                        <h5 style="margin-bottom: 0"><strong>{{$data->content}}</strong></h5>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($en as $data)
                                <tr>
                                    <td nowrap="nowrap" align="center" valign="top">
                                        <h5 style="margin-bottom: 0"><strong>({{$data->number}})&nbsp;</strong></h5>
                                    </td>
                                    </td>
                                    <td>
                                        <h5 style="margin-bottom: 0"><strong>{{$data->content}}</strong></h5>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div><!-- End container -->
@stop