@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <div class="row">
        <div class="col-md-6 d-flex">
            <button type="button" class="btn btn-primary btn-primary-style" data-toggle="modal" data-target="#CreateModal">
                新增路線介紹
            </button>
            <button type="button" class="ml-3 btn btn-primary btn-primary-style" data-toggle="modal" data-target="#CreateSessionModal">
                新增場次
            </button>
        </div>
        <div class="col-md-6">
            <button type="button" class="float-right btn btn-danger btn-danger-style" data-toggle="modal" data-target="#delete">
                刪除
            </button>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
            <form action="{{$data->route_id}}/update" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="label-style col-form-label" for="name">報名狀態</label>
                    <select type="text" id="state" name="state" class="form-control">
                        @foreach ($state as $s)
                        @if($data->state == $s)
                        <option value="{{$data['state']}}" selected>{{__('customize.'.$data['state'])}}</option>
                        @else
                        <option value="{{$s}}">{{__('customize.'.$s)}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="name">排序</label>
                    <select type="text" id="id" name="id" class="form-control">
                        @foreach ($routes as $route)
                        @if($route->class == $class && $route->activity == $data->activity)
                        @if($data->id == $route->id)
                        <option value="{{$data['id']}}" selected>{{$data['id']}}</option>
                        @else
                        <option value="{{$route['id']}}">{{$route['id']}}</option>
                        @endif
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="name">路線名稱</label>
                    <textarea class="form-control" id="name" name="name" rows="2" style="resize:none;">{{$data->name}}</textarea>
                </div>
                <div class="form-group">
                        <label class="label-style col-form-label" for="introduction">介紹</label>
                        <textarea class="form-control" id="introduction" name="introduction" rows="4" style="resize:none;">{{$data->introduction}}</textarea>
                    </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="class">類型</label>
                    <textarea class="form-control" id="class" name="class" rows="2" style="resize:none;">{{$data->class}}</textarea>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="url">報名網址</label>
                    <textarea class="form-control" id="url" name="url" rows="1" style="resize:none;">{{$data->url}}</textarea>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="start_location">集合地點</label>
                    <textarea class="form-control" id="start_location" name="start_location" rows="1" style="resize:none;">{{$data->start_location}}</textarea>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="end_location">結束地點</label>

                    <textarea class="form-control" id="end_location" name="end_location" rows="1" style="resize:none;">{{$data->end_location}}</textarea>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="service">服務對象</label>

                    <textarea class="form-control" id="service" name="service" rows="1" style="resize:none;">{{$data->service}}</textarea>
                </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="routes">路線</label>

                    <textarea class="form-control" id="routes" name="routes" rows="3" style="resize:none;">{{$data->routes}}</textarea>
                </div>
                <div class="form-group">
                        <label class="label-style col-form-label" for="session_information">場次資訊</label>
                        <textarea class="form-control" id="session_information" name="session_information" rows="1" style="resize:none;">{{$data->session_information}}</textarea>
                    </div>
                <div class="form-group">
                    <label class="label-style col-form-label" for="person">人數</label>

                    <textarea class="form-control" id="person" name="person" rows="1" style="resize:none;">{{$data->person}}</textarea>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary btn-primary-style mb-3">儲存</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="col-md-12">
            <h4 class="mb-2">場次</h4>
            @foreach($data->sessions as $temp)
            <div class="modal-style" data-toggle="modal" data-target="#editSession{{$temp->session_id}}">
                {{$data->name}} {{$temp->session}}
            </div>
            @endforeach
        </div>
        <hr>
        <div class="col-md-12">
            <h4 class="mb-2">路線介紹</h4>
            @foreach($data->informations as $temp)
            <div class="modal-style" data-toggle="modal" data-target="#edit{{$temp->route_information_id}}">
                {{$temp->title}}
            </div>
            @endforeach
        </div>
    </div>

</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center ">
                是否刪除?

            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                <form action="{{$data->route_id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">是</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
                <form action="{{$data->route_id}}/routeInformation/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label class="label-style col-form-label" for="title">標題</label>
                            <textarea class="form-control" id="title" name="title" rows="1" style="resize:none;"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="label-style col-form-label" for="content">內容</label>
                            <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;"></textarea>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary  btn-primary-style">新增</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="CreateSessionModal" tabindex="-1" role="dialog" aria-labelledby="CreateSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateSessionModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{$data->route_id}}/session/create" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="label-style col-form-label" for="type">類型</label>
                        <textarea class="form-control" id="type" name="type" rows="1" style="resize:none;"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="teach">導覽老師</label>
                        <textarea class="form-control" id="teacher" name="teacher" rows="1" style="resize:none;"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="date">活動日期</label>
                        <input class="form-control" type="date" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="start_time">開始時間</label>
                        <input class="form-control" type="time" name="start_time" id="start_time">
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="end_time">結束時間</label>
                        <input class="form-control" type="time" name="end_time" id="end_time">
                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="session">場次</label>
                        <textarea class="form-control" id="session" name="session" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">新增</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach($data->informations as $temp)
<div class="modal fade" id="edit{{$temp->route_information_id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$temp->route_information_id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{$temp->route_information_id}}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{$data->route_id}}/routeInformation/{{$temp->route_information_id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <!-- <label class="label-style col-form-label" for="id">排序</label>
                        <select type="text" id="id" name="id" class="form-control">
                            @foreach ($routeInformations as $routeInformation)
                            @if($temp->route_id == $routeInformation->route_id)
                            @if($temp->id == $routeInformation->id)
                            <option value="{{$temp['id']}}" selected>{{$temp['id']}}</option>
                            @else
                            <option value="{{$routeInformation['id']}}">{{$routeInformation['id']}}</option>
                            @endif
                            @endif
                            @endforeach
                        </select> -->
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="label-style col-form-label" for="title">標題</label>
                            <textarea class="form-control" id="title" name="title" rows="1" style="resize:none;">{{$temp->title}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="label-style col-form-label" for="content">內容</label>
                            <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;">{{$temp->content}}</textarea>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary btn-primary-style">儲存</button>
                        </div>
                    </div>
                </form>
                <form action="{{$data->route_id}}/routeInformation/{{$temp->route_information_id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-danger-style">刪除</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($data->sessions as $temp)
<div class="modal fade" id="editSession{{$temp->session_id}}" tabindex="-1" role="dialog" aria-labelledby="editSession{{$temp->session_id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSession{{$temp->session_id}}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{$data->route_id}}/session/{{$temp->session_id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="session">排序</label>
                        <select type="text" id="session" name="session" class="form-control">
                            @foreach ($sessions as $session)
                            @if($temp->route == $session->route)
                            @if($temp->session == $session->session )
                            <option value="{{$temp['session']}}" selected>{{$temp['session']}}</option>
                            @else
                            <option value="{{$session['session']}}">{{$session['session']}}</option>
                            @endif
                            @endif
                           
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="type">類型</label>
                        <textarea class="form-control" id="type" name="type" rows="1" style="resize:none;">{{$temp->type}}</textarea>
                    </div>
                   
                    <div class="form-group">
                        <label class="label-style col-form-label" for="teach">導覽老師</label>
                        <textarea class="form-control" id="teacher" name="teacher" rows="1" style="resize:none;">{{$temp->teacher}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="date">活動日期</label>
                        <input class="form-control" type="date" id="date" name="date" value="{{$temp->date}}">
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="start_time">開始時間</label>
                        <input class="form-control" type="time" name="start_time" id="start_time" value="{{$temp->start_time}}">
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="end_time">結束時間</label>
                        <input class="form-control" type="time" name="end_time" id="end_time" value="{{$temp->end_time}}">
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">儲存</button>
                    </div>
                </form>
                <form action="{{$data->route_id}}/session/{{$temp->session_id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-danger-style">刪除</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop