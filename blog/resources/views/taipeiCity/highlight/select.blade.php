@extends('index')
@section('content')
<div class="container margin_60">
	<div class="" style="">
		<h1 style="text-align:center;">
			<strong>
				@foreach( explode("/n", $data->name) as $title)
				{{$title}}
				<br>
				@endforeach
			</strong>

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
					@foreach($route->sessions as $session)
					<option value="{{route('Highlights.show',['type'=>$type,'route'=>$route->route_id,'id'=>$route->activity->activity_id,'session'=>$session->session_id] )}}">
						@if($session->session=='')
						{{explode("\n",$route->name)[0]}}-
						{{explode('-',$session->date)[1]}}/{{explode('-',$session->date)[2]}}
						(
						<?php
						$weekarray = array("日", "一", "二", "三", "四", "五", "六");
						echo $weekarray[date("w", strtotime("$session->date"))];
						?>
						)

						@else
						{{$session->session}}梯次-
						{{explode('-',$session->date)[1]}}/{{explode('-',$session->date)[2]}}
						(
						<?php
						$weekarray = array("日", "一", "二", "三", "四", "五", "六");
						echo $weekarray[date("w", strtotime("$session->date"))];
						?>
						)
						
						@endif
						@if(explode(':',$session->start_time)[0]>=12)
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
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
	</div>
	<!-- img-responsive styled-->

</div><!-- End container -->

@stop