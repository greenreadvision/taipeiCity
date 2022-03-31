<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <?php
    include app_path() . '/Functions/navbar.php';
    $navbar = new Navbar();
    echo $navbar->navbar();
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146223995-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-146223995-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="戀戀臺北城-史蹟趴趴GO">
    <meta name="author" content="Max">
    <title>
        <?php
        echo $navbar->name();
        ?>
    </title>
    <!-- Favicons-->

    <link rel="Shortcut Icon" href="{{ asset('img/2019icon-57x57.png') }}" type="image/x-icon">


    <!-- CSS -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <!-- SPECIFIC CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/weather.css') }}">

</head>
<?php
include app_path() . '/Functions/status.php';
$status = new SetStatus();
?>

<body class="subpage" oncontextmenu="return false" onload="InitWnd();">
    
    @section('layout.nav')
    @include('layout.nav')
    @show
    @section('layout.breadcrumb')
    @include('layout.breadcrumb')
    @show
    @yield('content')
    @section('layout.footer')
    @include('layout.footer')
    @show

    <!-- <div class="position-fixed" style="bottom:10px;left:10px">
        <a href="{{route('index.manual')}}">
            <img src="{{ URL::asset('img/0001.jpg') }}" alt="" style="height:120px;width:80px">
        </a>
    </div> -->

    @section('javascript')
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{URL::asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>
    <script>
        if ($(window).width() <= 480) {
            $('a.open_close').on("click", function() {
                $('.cmn-toggle-switch').removeClass('active')
            });
        }
        var toggles = document.querySelectorAll(".cmn-toggle-switch");

        for (var i = toggles.length - 1; i >= 0; i--) {
            var toggle = toggles[i];
            toggleHandler(toggle);
        };

        function toggleHandler(toggle) {
            toggle.addEventListener("click", function(e) {
                e.preventDefault();
                (this.classList.contains("active") === true) ? this.classList.remove("active"): this.classList.add("active");
            });
        };
        $('a.open_close').on("click", function() {
            $('.main-menu').toggleClass('show');
            $('.layer').toggleClass('layer-is-visible');
        });
        <?php
        include app_path() . '/Functions/color.php';
        $color = new Color();
        ?>
        $(document).ready(function() {
            $('.magnific-gallery').each(function() {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
            $('.footer-color-notHover').css('color', '<?php echo $color->footer(); ?>')
            $('.footer-color').css('color', '<?php echo $color->footer(); ?>');
            $('.footer-color').hover(function() {
                    $(this).css('color', '<?php echo $color->footerHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->footer(); ?>');

                });
            $('.submenu-color').css('color', '<?php echo $color->navbar(); ?>');
            $('.submenu-color').hover(function() {
                    $(this).css('color', '<?php echo $color->navbarHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->navbar(); ?>');

                });

            $('.a-color').css('color', '<?php echo $color->a(); ?>');
            $('.a-color').hover(function() {
                    $(this).css('color', '<?php echo $color->aHover(); ?>');
                },
                function() {
                    $(this).css('color', '<?php echo $color->a(); ?>');

                });
        });
    </script>
    @show
    <script src="{{ URL::asset('js/functions.js') }}"></script>

</body>

</html>