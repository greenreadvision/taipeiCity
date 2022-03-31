@extends('index')
@section('content')
<div class="container margin_60">
	<div class="">
		<h1 style="text-align:center;"><strong>拍攝集錦</strong></h1>
		<h3 style="text-align:center;">Shooting highlights</h3>
		<br>
		<div class="row">
			@foreach($data as $activity)
			<div class="col-md-4">
				<h3 style="text-align:center;">
					<a href="{{route('Highlights.select',['type'=>'Exciting Activity','id'=>$activity->activity_id])}}">
						<strong>
							@foreach( explode("/n", $activity->name) as $title)
							{{$title}}
							<br>
							@endforeach
						</strong>

					</a>
				</h3>
			</div>

			@endforeach
			<!-- <div class="col-md-3"><h3 style="text-align:center;"><a href="?page=highlights-p7"><strong>信義Tour工作坊<br>Xinyi Tour Workshop</a></strong></h3></div> -->
		</div>
		<br>


		<br><br><br><br><br><br><br><br><br><br>
	</div>
	<!-- img-responsive styled-->
</div><!-- End container -->
@stop