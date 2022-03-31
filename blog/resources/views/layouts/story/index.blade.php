@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
        新增
    </button>
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
                <form action="story/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="8" style="resize:none;"></textarea>

                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="tag">tag</label>
                        <textarea class="form-control" id="tag" name="tag" rows="2" style="resize:none;"></textarea>

                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="path">照片</label>
                        <div class="input-group mb-3">
                            <input multiple="multiple" accept="image/jpeg,image/gif,image/png" type="file" id="path[]" name="path[]" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">新增</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        @foreach($stories as $story)
        <div class="col-md-3">
            
            <img src="{{route('download', explode('/',explode(';',$story->path)[0]))}}" width="90%" alt="" data-toggle="modal" data-target="#modal-{{$story->story_id}}">
        </div>
        @endforeach
    </div>
</div>
@foreach($stories as $story)
<div class="modal fade" id="modal-{{$story->story_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$story->story_id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="story/{{$story->story_id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">排序</label>
                        <select type="text" id="id" name="id" class="form-control">
                            @foreach ($stories as $id)
                            @if($story->id == $id->id)
                            <option value="{{$id['id']}}" selected>{{$id['id']}}</option>
                            @else
                            <option value="{{$id['id']}}">{{$id['id']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="8" style="resize:none;">{{$story->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="tag">tag</label>
                        <textarea class="form-control" id="tag" name="tag" rows="2" style="resize:none;">{{$story->tag}}</textarea>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="path">照片</label>
                       
                       @foreach(explode(';',$story->path) as $path)
                      @if($path != "")
                      <img width="100%" src="{{route('download', explode('/',$path))}}" alt="Image" class="img-responsive styled">
                       
                      @endif
                       @endforeach
                        <div class="input-group mb-3">
                            <input multiple="multiple" accept="image/jpeg,image/gif,image/png" type="file" id="path[]" name="path[]" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary mb-3">儲存</button>
                    </div>
                </form>
                <form action="story/{{$story->story_id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">刪除</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
