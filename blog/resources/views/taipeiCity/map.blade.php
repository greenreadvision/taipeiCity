@extends('index')
@section('content')

<div class="containe">
	<!-- img-responsive styled-->
	<div class="row" style="margin: 0;">
		<div class="col-lg-3">
			<!-- <div class="col-lg-12 form-group">
				<label class="label-style col-form-label">導覽路線</label>
				<select id="mark" type="text" class="form-control" onchange="drawMark();">
					<option value=""></option>

					@foreach($data as $activity)
					<optgroup label="{{explode('\n', $activity->name)[0]}}">
						@foreach($activity->routes as $route)
						<option value="{{explode("\n", $route->name)[0]}}">{{$route->name}}</option>
						@endforeach
						@endforeach
				</select>
			</div> -->
			<div class="col-lg-12 form-group">
				<label class="label-style col-form-label">臺北百年歷史地圖</label>
				<select class="form-control" type="text" id="image" onchange="WMTS();" style="width: 100%;">
					<option value=""></option>
				</select>

			</div>
			<div class="col-lg-12 form-group">
				<input id="opacity" type="range" min="0" max="1" value="1" step="0.01" onchange="setOpacity()">
			</div>
			<!-- <div class="col-lg-12 form-group">
				<button onclick="setCenter();">移至此地圖坐標</button>
			</div> -->
		</div>
		<div class="col-lg-9" style="padding: 0;">
			<div id="TGMap" style="width: 100%; height: calc(100vh - 150px);">
			</div>
		</div>

	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe width="560" height="500px" src="https://www.youtube.com/embed/DZgLHep1Tco" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>

		</div>
	</div>
</div>

@stop

@section('javasvript')
<script src="{{ URL::asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ URL::asset('js/data.js') }}"></script>

<script type="text/javascript" src="https://api.tgos.tw/TGOS_API/tgos?ver=2&AppID=1S5kqpHXu8WB6/o3v0K/8GHRxI4Q/wC0DXb3ho9rSR2+E7AB/rhcaA==&APIKey=cGEErDNy5yN/1fQ0vyTOZrghjE+jIU6uh3SnEnY6a+EduO6jwAL3E47hJovI2twSal2TruSXPCrHlp7zvDdm6Pa+Ww7HkZAqmf8qJgBFHpKh16RZPOyUB1/QSMv44C3wDVe4R6ykQoy2NevSHp3LYpWLMLOfYE+BxAqfuFyXkRZpsPHq1/waT2i57qy2jJ8CswjF1sc2gEBe387awvke1Ol6RLpO/A543sY9gd4EOLnE/UiAgDE09uhnm5JBdhaMd9/7mWANMzac9iGY0LlN20VkPC2pOE6TUBXogEGRt1kEHeEGMj8JlfV9n5DGwYCNu618M+YJhFR1yHm9UUopJvs2gyxECfssTqL6TWY7orqy1QMqViVJhA==" charset="utf-8"></script>
<!--下載後請將yourID及yourkey取代為您申請所取得的APPID及APIKEY方能正確顯示服務-->
<script type="text/javascript">
	$(document).ready(function() {

		var selectObj = document.getElementById("image");
		for (var i = 0; i < data.length; i++) {
			selectObj.options[i + 1] = new Option(data[i].name, i);
		}

	});
	var i;
	var j;
	var pMap;
	var MapOptions;

	var WMTSLayer = null;
	var WMTSLayers = new Array();

	var allMark = [];

	function drawMark() {

		var selectMark = document.getElementById("mark").value;

		for (i = 0; i < allMark.length; i++) {

			if (selectMark.indexOf(allMark[i]["name"]) == 0) {
				allMark[i]["line"].setVisible(true)
				pMap.setCenter(new TGOS.TGPoint(allMark[i]["center"]["x"], mark[i]["center"]["y"]));
				pMap.setZoom(allMark[i]["zoom"])
				for (j = 0; j < allMark[i]["point"].length; j++) {
					allMark[i]["point"][j].setVisible(true)
				}
			} else {
				allMark[i]["line"].setVisible(false)
				for (j = 0; j < allMark[i]["point"].length; j++) {
					allMark[i]["point"][j].setVisible(false)
				}
			}
		}
	}

	function setOpacity() {
		var opacity = document.getElementById('opacity').value;
		WMTSLayers[0].setTileOpacity(parseFloat(opacity));
	}

	function InitWnd() {

		var pOMap = document.getElementById("TGMap");
		pMap = new TGOS.TGOnlineMap(pOMap, TGOS.TGCoordSys.EPSG3857, MapOptions); //宣告TGOnlineMap地圖物件並設定坐標系統

		pMap.setZoom(12); //指定地圖層級
		pMap.setCenter(new TGOS.TGPoint(Number(121.518675), Number(25.033544))); //移至此地圖坐標
		MapOptions = {
			scaleControl: false,
			mapTypeControl: false, //mapTypeControl(設定是否開啟地圖類形控制項)
		};
		pMap.setOptions(MapOptions);

		// TGOS.TGEvent.addListener(pTGMarker1, 'click', function() {
		// 	$('#exampleModal').modal('show')
		// }); //滑鼠事件監聽
		markerImg = new TGOS.TGImage("{{ URL::asset('img/icons8-marker-96.png') }}", new TGOS.TGSize(30, 30), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(15, 30));
		var temp;
		var pointTemp;
		MarkerOptions = {
			visible: false,
			zIndex: 3
		};
		for (i = 0; i < mark.length; i++) {
			linePoint = [];
			temp = {
				"name": "",
				"center": {
					"x": "",
					"y": ""
				},
				"zoom": "",
				"point": [],
				"line" : []
			};
			temp["name"] = mark[i].name;
			temp["center"]["x"] = mark[i]["center"]["x"];
			temp["center"]["y"] = mark[i]["center"]["y"];
			temp["zoom"] = mark[i].zoom;
			for (j = 0; j < mark[i]["point"].length; j++) {
				markTemp = new TGOS.TGPoint(mark[i]["point"][j]["x"], mark[i]["point"][j]["y"]);
				pointTemp = new TGOS.TGMarker(pMap, markTemp, mark[i]["point"][j]["name"], markerImg, MarkerOptions);
				temp["point"].push(pointTemp);
			}
			for (j = 0; j < mark[i]["line"].length; j++) {
				markTemp = new TGOS.TGPoint(mark[i]["line"][j]["x"], mark[i]["line"][j]["y"]);
				linePoint.push(markTemp);
			}
			temp["line"] = new TGOS.TGLine(pMap, new TGOS.TGLineString(linePoint), {
				strokeColor: '#00AA88',
				strokeWeight: 5,
				zIndex: 2,
				visible: false
			});
			allMark.push(temp);
		}
	}

	function setCenter() {
		var CenterX = Number(121.506187000003);
		var CenterY = Number(25.12088000091683);
		pMap.setZoom(17); //指定地圖層級
		pMap.setCenter(new TGOS.TGPoint(CenterX, CenterY)); //移至此地圖坐標
	}
	
	function WMTS() {
		document.getElementById('opacity').value = 1;
		var value = document.getElementById("image").value;
		pMap.setZoom(data[value].zoom); //指定地圖層級
		pMap.setCenter(new TGOS.TGPoint(data[value].x,data[value].y)); //移至此地圖坐標
		// pMap.setCenter(new TGOS.TGPoint(121.516977, 25.047724));
		// pMap.setZoom(13); //指定地圖層級

		
		if (data[value].value != "") {
			ClearWMTS();
			var Bounds = pMap.getBounds();
			var src = "http://gis.sinica.edu.tw/taipei/wmts";
			var info = {
				matrixSet: 'GoogleMapsCompatible', //MatrixSet設定, 必要參數, 可進WMTS的Capabilities去看所需圖層使用的MatrixSet
				layer: data[value].value, //Layer Name, 必要參數
				format: "image/png",
				style: "default"
			};
			var req = {
				wmtsVisible: true,
				opacity: 1
			};
			WMTSLayer = new TGOS.TGWmtsLayer(src, pMap, info, req);
			console.log(WMTSLayer.getSource())
			WMTSLayers.push(WMTSLayer);
		}
	}

	function ClearWMTS() {
		if (WMTSLayers.length > 0) {
			for (var i = 0; i < WMTSLayers.length; i++) {
				WMTSLayers[i].removeWmtsLayer(); //當圖面上存在WMS圖層時, 將該圖層移除
			}
			WMTSLayers.length = 0;
		}
	}
</script>
@show