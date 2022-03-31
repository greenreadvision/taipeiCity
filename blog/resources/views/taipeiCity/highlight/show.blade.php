@extends('index')
@section('content')
<div class="container margin_60">
	<div class="" style="">
		<h1 style="text-align:center;">
			<strong>
				{{explode("\n",$route->name)[0]}}
				@if($session->session != "")
				<span>{{$session->session}}梯次</span>
				@endif

			</strong>
			<br>
			@if(count(explode("\n",$route->name))==2)
			{{explode("\n",$route->name)[1]}}
			@endif
			@if($session->session != "")
			<span>{{$session->session}}</span>

			@endif
		</h1>
		<br><br>
		<div style="text-align:center;">
			<h4>請選擇活動場次：</h4>
			<!--this is the selection bar for all highlights-p6-->
			<select style="width:300px;" onchange="location.href=this.value">
				<option selected="true">{{explode(';', $data->name)[0]}}</option>
				@foreach($class as $class_data)
				@foreach($data->routes as $route)
				@if($class_data == $route->class)
				@if(count(explode("\n",$route->class))==2)
				<optgroup label='{{explode("\n",$route->class)[0]}}-{{explode(";", $route->name)[0]}}'>
					@else
				<optgroup label='{{explode("\n", $route->name)[0]}}'>
					@endif
					@foreach($route->sessions as $session1)
					<option value="{{route('Highlights.show',['type'=>$type,'route'=>$route->route_id,'id'=>$route->activity->activity_id,'session'=>$session1->session_id] )}}">
						@if($session1->session=='')
						{{explode("\n",$route->name)[0]}}-
						{{explode('-',$session->date)[1]}}/{{explode('-',$session1->date)[2]}}
						(
						<?php
						$weekarray = array("日", "一", "二", "三", "四", "五", "六");
						echo $weekarray[date("w", strtotime("$session1->date"))];
						?>
						)

						@else
						{{$session1->session}}梯次-
						{{explode('-',$session1->date)[1]}}/{{explode('-',$session1->date)[2]}}
						(
						<?php
						$weekarray = array("日", "一", "二", "三", "四", "五", "六");
						echo $weekarray[date("w", strtotime("$session1->date"))];
						?>
						)

						@endif
						@if(explode(':',$session1->start_time)[0]>=12)
						下午
						@else
						上午
						@endif
					</option>
					@endforeach
					@endif
					@endforeach
					@endforeach
			</select><br><br><br>
			<hr>
		</div>
		<!-- magnific-gallery -->
		<div class="row ">
			<div class="row">


				@foreach($images as $image)
				<div class="col-md-3" style="text-align:center;" data-toggle="modal" data-target="#{{$image->image_id}}Modal">
					<a href="javascript:void(0)" >
						<img src="{{route('download', $image['path'])}}" width='100%' alt="" style="border: 5px solid#fff;">
					</a>
				</div>
				@endforeach

			</div><br>
		</div>
		<br><br><br><br><br>

	</div>
	<!-- img-responsive styled-->
</div><!-- End container -->
<!-- <div id="viewer" style="width: 100%; height: 100%;"></div> -->

@foreach($images as $image)
<div class="modal fade" id="{{$image->image_id}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{$image->image_id}}ModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="{{$image->image_id}}ModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="height:50vh">
			<iframe width="100%" height="640" style="width: 100%; height: 640px; border: none; max-width: 100%;" frameborder="0" allowfullscreen allow="xr-spatial-tracking; gyroscope; accelerometer" scrolling="no" src="{{$image->url}}"></iframe>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
@endforeach

@stop

@section('javasvript')
<script src="https://static.kuula.io/embed.js" data-kuula="https://kuula.co/share/78hPd?fs=1&vr=0&sd=1&thumbs=1&info=1&logo=1" data-width="100%" data-height="640px"></script>
<script src="{{ URL::asset('js/jquery-1.11.2.min.js') }}"></script>
@show