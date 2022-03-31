@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <div class="row">
        <div class="col-md-6">
            <h3>
                {{$data->route->name}}{{$data->session}}
            </h3>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary btn-primary-style float-right" data-toggle="modal" data-target="#CreateModal">
                新增照片
            </button>
        </div>
    </div>

</div>


<div class="col-md-12 ">
    <form action="{{$id}}/delete" method="POST" onsubmit="return check_delete();">
        @method('DELETE')
        @csrf
        <!-- <button id="image-delete" type="submit" class="btn btn-primary" disabled>{{__('customize.Delete')}}</button> -->


        <div class="row">
            @foreach($data->images as $image)

            <div class="col-lg-3" style="text-align:center;">
                <div>
                    <label for="{{$image['image_id']}}" class="p-0">

                        <img src="{{route('download', $image['path'])}}" style="cursor: pointer;" width="100%" alt="" for="{{$image['image_id']}}">

                    </label>

                </div>
                <div>
                    <input onchange="changeDisabled()" type="checkbox" name="checkbox[]" value="{{$image['image_id']}}" id="{{$image['image_id']}}" />
                </div>
            </div>

            @endforeach
        </div>



        <button id="image-delete" type="submit" class="float-right btn btn-danger btn-danger-style" disabled>
            <i class='fas fa-trash-alt'></i><span class="ml-3">刪除</span>
        </button>
    </form>

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
                <form action="{{$id}}/create" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-ground">
                        <div class="form-group">
                            <label class="label-style col-form-label" for="url">網址</label>
                            <textarea class="form-control" id="url" name="url" rows="1" style="resize:none;"></textarea>
                        </div>
                        <label class="label-style  col-form-label" for="path">上傳相片</label>
                        <div class="input-group mb-3">
                            <input multiple="multiple" accept="image/jpeg,image/gif,image/png" type="file" id="path[]" name="path[]" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                            @if ($errors->has('path'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('path') }}</strong>
                            </span> @endif
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-primary-style">上傳</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')
<script>
    function changeDisabled() {
        if ($("input[name='checkbox[]']:checked").length == 0) {
            $("#image-delete").attr("disabled", true);
        } else {
            $("#image-delete").attr("disabled", false);
        }
    }

    function check_delete() {

        if ($("input[name='checkbox[]']:checked").length == 0) {
            return false
        } else {
            return true
        }
    }

    function check_create() {

        var file = document.querySelector('input[type=file]').files;
        if (file.length == 0) {
            return false
        } else {
            return true
        }
    }
</script>
@stop