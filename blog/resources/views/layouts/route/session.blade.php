@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
        新增場次
    </button>
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
                <form action="session/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select type="text" id="route_id" name="route_id" class="form-control">
                            @foreach ($activity as $temp)
                            <optgroup label="{{$temp->name}}">
                                @foreach($data as $route)
                                @if($temp->activity_id == $route->activity_id)
                                <option value="{{$route->route_id}}">{{$route->name}}</option>
                                @endif
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>

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
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop