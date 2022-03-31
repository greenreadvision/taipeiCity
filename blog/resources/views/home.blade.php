@extends('index')

@section('content')
<?php
include app_path() . '/Functions/findDate.php';
$findDate = new findDate();
?>
<div class="container margin_60">
	<div class="row">
		<div class="col-md-12">
			<!--<h2 style="color:saddlebrown;">資訊陸續更新中，將於9月5日正式上架。</h2>
			<hr>-->
			<h3><strong>{{$data->name}}</strong></h3>

			<p>
				{{$data->introduction_cn}}<br> <br>
				{{$data->introduction_en}}
			</p>
			<hr><br>
			<h4><strong>最新消息</strong></h4>
			@foreach($news as $key => $new)
			@if((count($news)-$key) < 5) <a class="a-color" href="{{route('news.show',['id'=>$new->news_id])}}">{{$new->title}}</a>
				<br><br>
				@endif

				@endforeach

				<!-- <p>「2019戀戀臺北城-系列導覽活動保證金已於11/30全數退款完畢，如有問題請聯繫<span>(02)8772-6321</span>或<span>taipeicitypapago@gmail.com</span>。」</p> -->
				<hr><br>
				<h4>
					<strong>2020臺北古蹟推廣系列活動</strong>
				</h4>
				<div class=" table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width=150 style="text-align:center;">
									<strong>主題名稱</strong>
								</th>
								<th width=90 style="text-align:center;">
									<strong>報名狀態</strong>
								</th>
								<th width=280 style="text-align:center;">
									<strong>日期</strong>
								</th>
								<th>
									<strong>簡介</strong>
								</th>

							</tr>
						</thead>
						<tbody>
							@foreach($activity as $a)
							<tr>
								<td style="text-align:center;">
									<a class="a-color" href="{{route('index.activity', ['id'=>$a->activity_id])}}">{{explode("\n",$a->name)[0]}}</a>
								</td>
								<td style="text-align:center;">
								<?php echo $findDate->check($a->activity_id); ?>
								</td>
								<td style="text-align: center;">

									<?php echo $findDate->show($a->activity_id); ?>
								</td>
								<td>
									<a class="a-color" href="{{route('index.activity', ['id'=>$a->activity_id])}}">
										{{$a->activityInformation[0]->introduction_cn}}
									</a>

								</td>

							</tr>
							@endforeach

						</tbody>

					</table>
				</div>

				<div class="col-md-12">
					<img src="{{route('download', $data['path'])}}" alt="Image" class="img-responsive styled" style="width:100%">
					<!-- <img src="img/index.jpg" alt="Image" class="img-responsive styled"> -->
					<br>
				</div>
				<br>
				<!-- <div class="col-md-12" style="height:525px;">
				<iframe class="img-responsive styled" style="height:525px;" src="https://www.viewtaiwan.com/embed.php?v=1UFWgL21pAg&showinfo=1" frameborder="0"></iframe>
			</div> -->
		</div>
	</div>
	<!--End row -->
</div>
<!--End container -->

@endsection

