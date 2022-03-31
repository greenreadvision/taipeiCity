@extends('layouts.app')
@section('content')
<div class="d-flex col-md-12 mb-3">
    <button type="button" class="btn btn-primary btn-primary-style" data-toggle="modal" data-target="#cnCreateModal">
        新增中文報名資訊
    </button>
    <button type="button" class="ml-3 btn btn-primary btn-primary-style" data-toggle="modal" data-target="#enCreateModal">
        新增英文報名資訊
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="cnCreateModal" tabindex="-1" role="dialog" aria-labelledby="cnCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cnCreateModalLabel">報名資訊(中)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="signUpInformation/create/CN" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">新增</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="enCreateModal" tabindex="-1" role="dialog" aria-labelledby="enCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enCreateModalLabel">報名資訊(英)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="signUpInformation/create/EN" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-primary-style">新增</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <table>
        <tbody>
            @foreach($cn as $data)
            <tr>
                <td><a href="javascript:void(0);" title="編輯"><i class='fas fa-pen px-1' data-toggle="modal" data-target="#cnEdit{{$data->number}}"></a></td>
                <td>
                    @if($data == end($cn))
                    <a href="javascript:void(0);" style='color:red' title="刪除"><i class='fas fa-times px-1' data-toggle="modal" data-target="#cnDelete{{$data->number}}">
                            @endif
                </td>
                <td nowrap="nowrap" align="center" valign="top">({{__('customize.'.$data->number)}})</td>
                <td>
                    <?php echo substr($data->content, 0);
                   
                    ?>
                </td>
            </tr>
            @endforeach
            @foreach($en as $data)
            <tr>
                <td><a href="javascript:void(0);" title="編輯"><i class='fas fa-pen px-1' data-toggle="modal" data-target="#enEdit{{$data->number}}"></a></td>
                <td>
                    @if($data == end($en))
                    <a href="javascript:void(0);" style='color:red' title="刪除"><i class='fas fa-times px-1' data-toggle="modal" data-target="#enDelete{{$data->number}}">
                            @endif
                </td>
                <td nowrap="nowrap" align="center" valign="top">({{$data->number}})</td>
                <td>{{$data->content}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@foreach($cn as $data)
<div class="modal fade" id="cnEdit{{$data->number}}" tabindex="-1" role="dialog" aria-labelledby="cnEdit{{$data->number}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cnEdit{{$data->number}}Label">cnEdit{{$data->number}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="signUpInformation/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;">{{$data->content}}</textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if($data == end($cn))
<div class="modal fade" id="cnDelete{{$data->number}}" tabindex="-1" role="dialog" aria-labelledby="cnDelete{{$data->number}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cnDelete{{$data->number}}Label">cnDelete{{$data->number}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center ">
                是否刪除?
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                <form action="signUpInformation/{{$data->id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">是</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

@foreach($en as $data)
<div class="modal fade" id="enEdit{{$data->number}}" tabindex="-1" role="dialog" aria-labelledby="enEdit{{$data->number}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enenEdit{{$data->number}}Label">enEdit{{$data->number}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="signUpInformation/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="3" style="resize:none;">{{$data->content}}</textarea>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if($data == end($en))
<div class="modal fade" id="enDelete{{$data->number}}" tabindex="-1" role="dialog" aria-labelledby="enDelete{{$data->number}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enDelete{{$data->number}}Label">enDelete{{$data->number}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center ">
                是否刪除?
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                <form action="signUpInformation/{{$data->id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">是</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endif
@endforeach
@stop