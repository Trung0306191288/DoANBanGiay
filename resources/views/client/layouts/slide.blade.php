<?php
use App\Http\Controllers\Clients\TrangChuController;
?>
<div id='ninja-slider'>
    <div class="slider-inner">
        <ul>
            <li class="video_main_nb">
                <div class="video"><video width="100%" height="auto" autoplay muted><source src="{{ asset('upload/file/' . TrangChuController::video()->file) }}"/></video></div>               
            </li>
            @foreach ($slides as $v)
                <li class="slideshow-image">
                    <a href="{{ $v['link'] }}" target="_blank">
                        <img src="{{ asset('upload/loaihinhanh/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                    </a>
                <li>
            @endforeach
        </ul>
    </div>
</div>
