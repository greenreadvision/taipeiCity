@extends('index')
@section('content')
<div class="container margin_60">
	<div class="" style="">

		<h1 style="text-align:center;"><strong>宣傳短片</strong></h1>
		<h3 style="text-align:center;">Promotional Video</h3>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="video-container" style="position: relative;padding-bottom: 56.25%;padding-top: 30px;height: 0;overflow: hidden;"></div>
				<iframe height="600px" src="https://www.youtube.com/embed/YxErpNsmpP4?rel=0&autoplay=1&loop=1&playlist=YxErpNsmpP4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			</div>
			<div class="col-lg-12">
				<h3>重返百年前的老臺北‧史蹟趴趴GO，開~跑~囉！！！！</h3>

				<h3>所有的導覽老師，在這邊邀請所有喜愛文化、古蹟、歷史建築與臺北過往的民眾，一起來參加線上的史蹟導覽活動！</h3>

				<h3>看看老師們熱烈的歡迎，8/31（一）上午10點，歡迎大家一起來報名我們9/19（六）的史蹟大會師線上直播！</h3>
				<h3>9/7（一）上午10點再來報名從9/27開始到11/21的周六或周日，共有10條路線的線上導覽，每一條都等著報名喔！</h3>

				<h3>請側耳傾聽，短片中的歌聲，是今年重返百年前的老臺北‧史蹟趴趴GO的代言人林亭翰，獨家為史蹟趴趴GO打造的主題曲，9/19（六）史蹟大會師，將首次播出主題曲的精彩MV！</h3>

				<h3>另外在Youtube也可以看到我們的影片喔！歡迎訂閱我們的Youtube！</h3>
				<h3>
					<a href="https://youtu.be/YxErpNsmpP4">
						https://youtu.be/YxErpNsmpP4
					</a>
				</h3>
			</div>
			<!-- @foreach($data as $activity)
			<div class="col-md-4">
				<h3 style="text-align:center;">
					<a href="{{route('Highlights.select',['id'=>$activity->activity_id,'type'=>'Instant Activity'])}}">
						<strong>
							@foreach( explode("/n", $activity->name) as $title)
							{{$title}}
							<br>
							@endforeach
						</strong>

					</a>
				</h3>
			</div>

			@endforeach -->
			<!-- <div class="col-md-3"><h3 style="text-align:center;"><a href="?page=highlights-p7"><strong>信義Tour工作坊<br>Xinyi Tour Workshop</a></strong></h3></div> -->
		</div>
		<br>

		<br><br><br><br><br>
		<br><br><br><br>
	</div>
	<!-- img-responsive styled-->
</div><!-- End container -->

@stop
@extends('index')
@section('content')
<div class="container margin_60">
	<div class="" style="">

		<h1 style="text-align:center;"><strong>宣傳短片</strong></h1>
		<h3 style="text-align:center;">Promotional Video</h3>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="video-container" style="position: relative;padding-bottom: 56.25%;padding-top: 30px;height: 0;overflow: hidden;"></div>
				<iframe height="600px" src="{{$data->url}}?rel=0&autoplay=1&loop=1&playlist=YxErpNsmpP4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			</div>
			<div class="col-lg-12">
				<div style="text-align:center;">
					@foreach(explode("\n",$data->content) as $content)
					@if(strpos($content,"a=>") !== false)
					<h3><a href="{{explode('a=>',$content)[1]}}">{{explode("a=>",$content)[1]}}</a></h3>
					<br>
					@else
					<h3>{{$content}}</h3>
					<br>
					@endif
					@endforeach

				</div>
			</div>

		</div>
		<br>

		<br><br><br><br><br>
		<br><br><br><br>
	</div>
	<!-- img-responsive styled-->
</div><!-- End container -->

@stop