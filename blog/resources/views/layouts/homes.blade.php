@extends('layouts.app')
@section('content')
<!-- <div class="col-md-12 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
        新增
    </button>
</div> -->
<div class="col-md-12">
    <form action="status/update" method="POST" enctype="multipart/form-data" id="statusForm">
        @method('PUT')
        @csrf
        <select type="text" id="status" name="status" class="form-control" onchange="document.getElementById('statusForm').submit()">
            @if($status->status == 1)
            <option value="1" selected>營運中</option>
            <option value="0">維修中</option>
            @else
            <option value="1">營運中</option>
            <option value="0" selected>維修中</option>
            @endif
        </select>
    </form>
    <form action="home/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="label-style col-form-label submenu-color" for="navbar_color">navbar字型顏色</label>
                    <input type="color" id="navbar_color" name="navbar_color" value="{{$data->navbar_color}}" class="form-control" style="height:37px;" required>
                </div>
                <div class="col-md-6">
                    <label class="label-style col-form-label submenu-color" for="navbar_color_hover">hover</label>
                    <input type="color" id="navbar_color_hover" name="navbar_color_hover" value="{{$data->navbar_color_hover}}" class="form-control" style="height:37px;" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="label-style col-form-label a-color" for="a_color">超連結字型顏色</label>
                    <input type="color" id="a_color" name="a_color" value="{{$data->a_color}}" class="form-control" style="height:37px;" required>
                </div>
                <div class="col-md-6">
                    <label class="label-style col-form-label a-color" for="a_color_hover">hover</label>
                    <input type="color" id="a_color_hover" name="a_color_hover" value="{{$data->a_color_hover}}" class="form-control" style="height:37px;" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="label-style col-form-label footer-color" for="footer_color">footer字型顏色</label>
                    <input type="color" id="footer_color" name="footer_color" value="{{$data->footer_color}}" class="form-control" style="height:37px;" required>
                </div>
                <div class="col-md-6">
                    <label class="label-style col-form-label footer-color" for="footer_color_hover">hover</label>
                    <input type="color" id="footer_color_hover" name="footer_color_hover" value="{{$data->footer_color_hover}}" class="form-control" style="height:37px;" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="label-style col-form-label" for="name">名稱</label>
            <textarea class="form-control" id="name" name="name" rows="1" style="resize:none;">{{$data->name}}</textarea>
        </div>
        <div class="form-group">
            <label class="label-style col-form-label" for="introduction_cn">介紹(中)</label>
            <textarea class="form-control" id="introduction_cn" name="introduction_cn" rows="2" style="resize:none;">{{$data->introduction_cn}}</textarea>
        </div>
        <div class="form-group">
            <label class="label-style col-form-label" for="introduction_en">介紹(英)</label>
            <textarea class="form-control" id="introduction_en" name="introduction_en" rows="2" style="resize:none;">{{$data->introduction_en}}</textarea>
        </div>
        <div class="form-ground">
            <img width="10%" src="{{route('download', $data['logo_path'])}}" alt="Image" class="img-responsive styled">
            <div class="input-group mb-3">
                <input accept="image/jpeg,image/gif,image/png" type="file" id="logo_path" name="logo_path" class="form-control{{ $errors->has('logo_path') ? ' is-invalid' : '' }}">
            </div>
        </div>
        <div class="form-ground">
            <img width="30%" src="{{route('download', $data['path'])}}" alt="Image" class="img-responsive styled">
            <div class="input-group mb-3">
                <input accept="image/jpeg,image/gif,image/png" type="file" id="path" name="path" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
            </div>
        </div>
        <div class="form-ground">
            <img src="{{route('download', $data['host_path'])}}" alt="Image" class="img-responsive styled">
            <div class="input-group mb-3">
                <input accept="image/jpeg,image/gif,image/png" type="file" id="host_path" name="host_path" class="form-control{{ $errors->has('host_path') ? ' is-invalid' : '' }}">
            </div>
        </div>
        <div class="form-ground">
            <img width="100%" src="{{route('download', $data['navbar_path'])}}" alt="Image" class="img-responsive styled">
            <div class="input-group mb-3">
                <input accept="image/jpeg,image/gif,image/png" type="file" id="navbar_path" name="navbar_path" class="form-control{{ $errors->has('navbar_path') ? ' is-invalid' : '' }}">
            </div>
        </div>
        <div class="form-ground">
            <img width="30%" src="{{route('download', $data['footer_path'])}}" alt="Image" class="img-responsive styled">
            <div class="input-group mb-3">
                <input accept="image/jpeg,image/gif,image/png" type="file" id="footer_path" name="footer_path" class="form-control{{ $errors->has('footer_path') ? ' is-invalid' : '' }}">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary mb-3">儲存</button>
        </div>
    </form>
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
                <form action="home/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="name">名稱</label>
                        <textarea class="form-control" id="name" name="name" rows="1" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="introduction_cn">介紹(中)</label>
                        <textarea class="form-control" id="introduction_cn" name="introduction_cn" rows="2" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="introduction_en">介紹(英)</label>
                        <textarea class="form-control" id="introduction_en" name="introduction_en" rows="2" style="resize:none;"></textarea>
                    </div>

                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="logo_path">logo</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="logo_path" name="logo_path" class="form-control{{ $errors->has('logo_path') ? ' is-invalid' : '' }}">
                        </div>

                    </div>

                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="path">主視覺</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="path" name="path" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>

                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="navbar_path">navbar</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="navbar_path" name="navbar_path" class="form-control{{ $errors->has('navbar_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>

                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="footer_path">footer</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="footer_path" name="footer_path" class="form-control{{ $errors->has('footer_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>

                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="host_path">主辦logo</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="host_path" name="host_path" class="form-control{{ $errors->has('host_path') ? ' is-invalid' : '' }}">
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

@stop
@section('javascript')
<script>
    function setStatus() {
        document.getElementById("status").submit()
    }
</script>
@stop