@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3 ">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-primary-style float-right" data-toggle="modal" data-target="#CreateModal">
                新增
            </button>
        </div>

    </div>
</div>

<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="activity/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">名稱</label>
                        <textarea class="form-control" id="name" name="name" rows="2" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="open_date">開放報名時間</label>
                        <input class="form-control" type="datetime-local" name="open_date">
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">新增</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="col-md-12 ">
    @foreach($data as $temp)
    <div class="d-flex">
        <div class="collapse-style col-md-10" data-toggle="modal" data-target="#modal-{{$temp->activity_id}}">
            {{$temp->name}}
        </div>
        <div class="col-md-2 d-flex  align-items-center justify-content-center">
            <button type="button" class="btn btn-danger btn-danger-style" data-toggle="modal" data-target="#delete{{$temp->activity_id}}">
                刪除
            </button>
        </div>
    </div>
    @endforeach
</div>

@foreach($data as $temp)
<div class="modal fade" id="delete{{$temp->activity_id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$temp->activity_id}}" aria-hidden="true">
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
                <form action="activity/{{$temp->activity_id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">是</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modal-{{$temp->activity_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$temp->activity_id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="activity/{{$temp->activity_id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">排序</label>
                        <select type="text" id="id" name="id" class="form-control">
                            @foreach ($data as $temp1)
                            @if($temp->id == $temp1->id)
                            <option value="{{$temp1['id']}}" selected>{{$temp1['id']}}</option>
                            @else
                            <option value="{{$temp1['id']}}">{{$temp1['id']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">名稱(英文需換行)</label>
                        <textarea class="form-control" id="name" name="name" rows="2" style="resize:none;">{{$temp->name}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="open_date">開放報名時間</label>
                        <input class="form-control" type="datetime-local" name="open_date" value="{{substr_replace ( substr($temp->open_date,0,16) , 'T' , 10 , 1 )}}">
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary mb-3 btn-primary-style">儲存</button>
                    </div>
                </form>
                @foreach($temp->activityInformation as $information)
                <form action="activity/information/{{$information->activity_information_id}}/update" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">介紹(中)</label>
                        <textarea class="form-control" id="introduction_cn" name="introduction_cn" rows="3" style="resize:none;">{{$information->introduction_cn}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">介紹(英)</label>
                        <textarea class="form-control" id="introduction_en" name="introduction_en" rows="3" style="resize:none;">{{$information->introduction_en}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">資訊</label>
                        <textarea class="form-control" id="information" name="information" rows="3" style="resize:none;">{{$information->information}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="remind">註解</label>
                        <textarea class="form-control" id="remind" name="remind" rows="3" style="resize:none;">{{$information->remind}}</textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">儲存</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach


@stop