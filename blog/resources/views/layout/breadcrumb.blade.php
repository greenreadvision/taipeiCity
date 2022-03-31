<?php
include app_path() . '/Functions/breadcrumb.php';
$breadcrumb = new Breadcrumb();
echo $breadcrumb->navbar();
?>
</section>
<div id="position">
    <div class="container">
        <ul>
            <li>
                <a href="{{route('index')}}">
                    <?php
                    echo $breadcrumb->name();
                    ?>
                </a>
            </li>
            @for ($i = 1; $i < sizeof(explode("/",$_SERVER['REQUEST_URI'])); $i++) 
            <li>
                {{__('customize.'.explode("/",$_SERVER['REQUEST_URI'])[$i])}}
                </li>
                @if(explode("/",$_SERVER['REQUEST_URI'])[$i] == "WarmStory" || explode("/",$_SERVER['REQUEST_URI'])[$i] == "news" || explode("/",$_SERVER['REQUEST_URI'])[$i] == "InstantActivity")
                @break
                @endif
                @if( $i + 1 != sizeof(explode("/",$_SERVER['REQUEST_URI'])))
                @if(__('customize.'.explode("/",$_SERVER['REQUEST_URI'])[$i + 1]) == "")
                
                @endif
                @endif
                @endfor
        </ul>
    </div>
</div><!-- End Position -->