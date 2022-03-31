@extends('layouts.app')
@section('content')
<div class="col-md-12 mb-3">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-primary-style float-right" data-toggle="modal" data-target="#CreateModal">
                新增
            </button>
        </div>
    </div>
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
                <form action="new/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-style col-form-label" for="title">標題</label>
                        <input class="form-control" type="text" name="title" autocomplete="off">
                    </div>
                    <div class="from-group row">
                        <div class="col-md-4">
                            <select type="text" id="select-type" name="select-type" onchange="type_change(this.options[this.options.selectedIndex].value)" class="rounded-pill form-control">
                                <option value="web">網站</option>
                                <option value="link">連結</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="link_content" id="link_content" autocomplete="off" class="form-control" style="display: none">
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">下一步</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    @foreach($data as $new)
    <div class=" collapse-style" data-toggle="modal" data-target="#modal-{{$new->news_id}}">
        {{$new->title}}
    </div>
    @endforeach
</div>

@foreach($data as $new)
<div class="modal fade" id="modal-{{$new->news_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$new->news_id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="new/{{$new->news_id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-2" style="border:2px dashed gray;">
                            <label class="label-style col-form-label" for="type">可使用頁面屬性</label>
                            <ul id="type1" class=' form-control'>
                                <div draggable="true">主文</div>
                            </ul>
                            <ul id="type2" class=' form-control'>
                                <div draggable="true">列籤</div>
                            </ul>
                            <ul id="type3" class=' form-control'>
                                <div draggable="true">頁籤</div>
                            </ul>
                            <ul id="type4" class=' form-control'>
                                <div draggable="true">相簿</div>
                            </ul>
                            <ul id="type5" class=' form-control'>
                                <div draggable="true">投票</div>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="label-style col-form-label" for="title">標題</label>
                                <input class="form-control" type="text" name="title" autocomplete="off" value="{{$new->title}}">
                            </div>
                        </div>
                    </div>
                    
                </form>
                <form action="new/{{$new->news_id}}/delete" method="POST" style="padding-top: 5px">
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



@section('javascript')
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.14.0/dist/xlsx.full.min.js"></script>
<script>
    function type_change(val){
        link_content = document.getElementById("link_content")
        if(val == "web"){
            link_content.style.display="none";
            link_content.value = "";
        }
        else if(val =="link"){
            link_content.style.display="inline";
            
        }
    }
</script>
<script>
    $(function () {
        $("#timetable .items").sortable({
                connectWith: "ul"  
        });
         
        $("ul[id^='available']").draggable({
            helper: "clone",
            connectToSortable: ".items"
        });
    });
</script>
@stop


                    <!--<div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="5" style="resize:none;"></textarea>

                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="path">照片</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="path" name="path" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="notice_path">行前通知</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="notice_path" name="notice_path" class="form-control{{ $errors->has('notice_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="list_path">正取名單</label>
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="list_path" name="list_path" class="form-control{{ $errors->has('list_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>-->

                    <!--<div class="form-group">
                        <label class="label-style col-form-label" for="name">排序</label>
                        <select type="text" id="id" name="id" class="form-control">
                            @foreach ($data as $new1)
                            @if($new->id == $new1->id)
                            <option value="{{$new1['id']}}" selected>{{$new1['id']}}</option>
                            @else
                            <option value="{{$new1['id']}}">{{$new1['id']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="title">標題</label>
                        <input class="form-control" type="text" name="title" autocomplete="off" value="{{$new->title}}">
                    </div>
                    <div class="form-group">
                        <label class="label-style col-form-label" for="content">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="5" style="resize:none;">{{$new->content}}</textarea>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="path">照片</label>
                        @if($new->path[0] !=null)
                        <img width="100%" src="{{route('download', $new['path'])}}" alt="Image" class="img-responsive styled">
                        @endif
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="path" name="path" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="notice_path">行前通知</label>
                        @if($new->notice_path[0] !=null)
                        <img width="100%" src="{{route('download', $new['notice_path'])}}" alt="Image" class="img-responsive styled">
                        @endif
                        <div class="input-group mb-3">

                            <input accept="image/jpeg,image/gif,image/png" type="file" id="notice_path" name="notice_path" class="form-control{{ $errors->has('notice_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="form-ground">
                        <label class="label-style  col-form-label" for="list_path">正取名單</label>
                        @if($new->list_path[0] !=null)
                        <img width="100%" src="{{route('download', $new['list_path'])}}" alt="Image" class="img-responsive styled">
                        @endif
                        <div class="input-group mb-3">
                            <input accept="image/jpeg,image/gif,image/png" type="file" id="list_path" name="list_path" class="form-control{{ $errors->has('list_path') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style mb-3">儲存</button>
                    </div>-->