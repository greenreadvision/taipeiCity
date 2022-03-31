@extends('index')
@section('content')
<div class="margin_60">
    <div class="d-flex justify-content-center"><a download href="{{ URL::asset('img/重返老台北導覽手冊.pdf') }}">下載電子手冊</a></div>
    <div class="flipbook-viewport book-above">

        <div class="d-flex justify-content-center">
            <div id="flipbook">
                <div style="background-image:url({{ URL::asset('img/0001.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0002.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0003.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0004.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0005.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0006.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0007.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0008.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0009.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0010.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0011.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0012.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0013.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0014.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0015.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0016.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0017.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0018.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0019.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0020.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0021.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0022.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0023.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0024.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0025.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0026.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0027.png') }})"></div>
                <div style="background-image:url({{ URL::asset('img/0028.png') }})"></div>
            </div>
        </div>
    </div>
    <div class="justify-content-center book-below">
        <div id="carouselExampleControls" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL::asset('img/0001.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0002.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0003.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0004.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0005.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0006.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0007.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0008.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0009.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0010.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0011.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0012.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0013.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0014.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0015.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0016.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0017.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0018.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0019.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0020.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0021.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0022.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0023.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0024.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0025.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0026.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ URL::asset('img/0027.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('img/0028.png') }}" class="d-block w-100" alt="...">
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

@stop

<style>
    .book-below {
        display: none;
    }

    @media screen and (max-width:1024px) {
        .book-above {
            display: none;
        }

        .book-below {
            display: flex;
        }
    }
</style>
<script src="{{ URL::asset('js/modernizr.2.5.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById("carouselExampleControls").style.width = (498 * (document.body.clientHeight - 90)) / 646;
    });

    function loadApp() {
        // Create the flipbook

        $('#flipbook').turn({
            // Width

            width: (2 * 498 * (document.body.clientHeight - 90)) / 646,

            // Height

            height: document.body.clientHeight - 90,

            // Elevation

            elevation: 50,

            // Enable gradients

            gradients: true,

            // Auto center this flipbook

            autoCenter: true

        });
    }

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test: Modernizr.csstransforms,
        yep: ['{{ URL::asset("js/turn.js") }}'],
        nope: ['{{ URL::asset("js/turn.html4.min.js") }}'],
        both: ['{{ URL::asset("css/basic.css") }}'],
        complete: loadApp
    });
</script>