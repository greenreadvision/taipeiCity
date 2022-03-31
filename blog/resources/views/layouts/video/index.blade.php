@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateVideo">
        新增
    </button>
</div>
<div class="modal fade" id="CreateVideo" tabindex="-1" role="dialog" aria-labelledby="CreateVideoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="video/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="url">影片網址</label>
                        <textarea class="form-control" id="url" name="url" rows="2" style="resize:none;"></textarea>

                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="8" style="resize:none;"></textarea>

                    </div>


                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">新增</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        @foreach($data as $video)
        <div class="col-lg-4">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#editVideo{{$video->id}}">
                <img src="http://img.youtube.com/vi/{{substr($video->url,-11)}}/mqdefault.jpg" alt="" width="100%">
            </a>
        </div>

        @endforeach
    </div>
</div>
@foreach($data as $video)
<div class="modal fade" id="editVideo{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="editVideo{{$video->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="video/{{$video->id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="url">影片網址</label>
                        <textarea class="form-control" id="url" name="url" rows="2" style="resize:none;">{{$video->url}}</textarea>

                    </div>

                    <div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="8" style="resize:none;">{{$video->content}}</textarea>

                    </div>

                    <!-- <div class="float-left">
                        <form action="video/{{$video->id}}/delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">刪除</button>
                        </form>

                    </div> -->
                    <div class=" float-right">
                        <button type="submit" class="btn btn-primary">儲存</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endforeach
@stop