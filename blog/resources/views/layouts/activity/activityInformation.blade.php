@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
        新增
    </button>
</div>

<div class="col-md-12">
    @foreach($data as $temp)
    <!-- @if($temp == $data[count($data)-1])
    
    @endif -->
    <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-{{$temp->activity_id}}">{{$temp->name}}</a>
    <br><br>

    @endforeach
</div>

<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="activityInformation/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select type="text" id="activity_id" name="activity_id" class="form-control">
                            @foreach ($data as $temp)
                            <option value="{{$temp['activity_id']}}">{{$temp['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">介紹(中)</label>
                        <textarea class="form-control" id="introduction_cn" name="introduction_cn" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">介紹(英)</label>
                        <textarea class="form-control" id="introduction_en" name="introduction_en" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">資訊</label>
                        <textarea class="form-control" id="information" name="information" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="remind">註解</label>
                        <textarea class="form-control" id="remind" name="remind" rows="3" style="resize:none;"></textarea>
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