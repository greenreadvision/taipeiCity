@extends('index')
@section('content')
<div id="viewer" style="width: 100%; height: 100%;"></div>
@stop

@section('javasvript')
<script src="{{ URL::asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ URL::asset('js/async.js') }}"></script>
<script src="{{ URL::asset('js/three.js') }}"></script>
<script src="{{ URL::asset('js/OrbitControls.js') }}"></script>
<script src="{{ URL::asset('js/theta-viewer.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var viewer = new ThetaViewer(document.getElementById("viewer"));
		viewer.images = ["{{ URL::asset('img/R0013005.JPG')}}"];
		viewer.interval = 200;
		viewer.autoRotate = true;
		viewer.load();
	});
</script>
@show