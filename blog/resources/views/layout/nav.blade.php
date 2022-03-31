<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>

<div id="top_line">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{route('index')}}" class="show-submenu a-color">
                    <span style="font-size: 14px;line-height:14px;">
                        <?php
                        echo $navbar->name();
                        ?>
                    </span>
                </a>
            </div>
        </div><!-- End row -->
    </div><!-- End container-->
</div><!-- End top line-->

<div class="container">
    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-1">
            <div id="logo">
                <a href="{{route('index')}}">
                    <?php
                    echo $navbar->logo();
                    ?>
                </a>
                <a href="{{route('index')}}">
                    <?php
                    echo $navbar->logo1();
                    ?>

                </a>
            </div>
        </div>

        <nav class="col-md-11 col-sm-11 col-xs-11">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <?php
                    echo $navbar->logo1();
                    ?>

                </div>
                <a href="javascript:void(0);" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                <ul>

                    <li class="submenu">
                        <a href="{{route('index')}}" class="show-submenu submenu-color">首頁<br>Home</a>
                    </li>

                    <li class="submenu">
                        <a href="{{route('news')}}" class="show-submenu submenu-color"><span>最新消息<img src="{{ URL::asset('img/new.gif') }}" height="20px" style="margin-left:5px;"><br>News</span></a>
                    </li>
                    <?php

                    echo $navbar->show();
                    ?>

                    <li class="submenu">
                        <a href="{{route('index.map')}}" class="show-submenu submenu-color">電子地圖<br>Digital Map</a>
                    </li>
                    <li class="submenu">
                        <a href="{{route('index.manual')}}" class="show-submenu submenu-color">導覽手冊<br>Guidebook </a>
                    </li>
                    <li class="submenu">
                        <a href="{{route('Highlights')}}" class="show-submenu submenu-color"><span>活動花絮
                                <img src="{{ URL::asset('img/new.gif') }}" height="20px" style="margin-left:5px;">
                                <br>Highlights</span></a>
                    </li>


                </ul>
            </div><!-- End main-menu -->

        </nav>
    </div>
</div><!-- container -->
</header><!-- End Header -->