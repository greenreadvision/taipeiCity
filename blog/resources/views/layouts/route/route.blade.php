@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-primary-style float-right" data-toggle="modal" data-target="#CreateModal">
                新增路線
            </button>
        </div>
    </div>
</div>
<div class="col-md-12">
    @foreach($data as $temp)
    <div class="collapse-header-style" data-toggle="collapse" data-target="#collapse{{$temp->activity_id}}" aria-expanded="true" aria-controls="collapse{{$temp->activity_id}}">
        {{$temp->name}}
    </div>
    <div id="collapse{{$temp->activity_id}}" class="collapse show">
        @foreach($class as $class_data)
        @foreach($temp->routes as $route)
        @if($route->class == $class_data)
        <div class="collapse-style pl-5" style="font-size:1.3rem" onclick="location.href='{{route('route.edit',['id'=>$route->route_id])}}'">
           @if(count(explode("\n",$route->class))==2)
            {{explode("\n",$route->class)[0]}}-
           @endif
        
        {{$route->name}}
        </div>
        @endif
    
        @endforeach
        @endforeach

    </div>
    <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-{{$temp->activity_id}}"></a>
    <br><br> -->

    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="route/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select type="text" id="activity_id" name="activity_id" class="form-control">
                            @foreach ($data as $temp)
                            <option value="{{$temp['activity_id']}}">{{$temp['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">路線名稱</label>
                        <textarea class="form-control" id="name" name="name" rows="2" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="introduction">介紹</label>
                        <textarea class="form-control" id="introduction" name="introduction" rows="4" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="">類型</label>
                        <textarea class="form-control" id="class" name="class" rows="2" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="url">報名網址</label>
                        <textarea class="form-control" id="url" name="url" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="start_location">集合地點</label>
                        <textarea class="form-control" id="start_location" name="start_location" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="end_location">結束地點</label>

                        <textarea class="form-control" id="end_location" name="end_location" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="service">服務對象</label>

                        <textarea class="form-control" id="service" name="service" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="routes">路線</label>

                        <textarea class="form-control" id="routes" name="routes" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="person">人數</label>
                        <textarea class="form-control" id="person" name="person" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="session_information">場次資訊</label>
                        <textarea class="form-control" name="session_information" id="session_information" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">新增</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop