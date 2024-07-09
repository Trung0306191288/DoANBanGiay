<?php
use App\Http\Controllers\Clients\TrangChuController;
$settings = TrangChuController::setting();
?>
<section class="footer--top mt-5">
    <div class="footer-article">
        <div class="wrap-content d-flex flex-wrap justify-content-between">
            <div class="footer-article--1">
                <div class="footer__contact mb-3">
                    <h2 class="footer__title">Thông tin liên hệ</h2>
                    <div class="footer__info">
                        <p>Địa chỉ: {{ $settings[0]->dia_chi }}</p>
                        <p>Hotline:
                            <a href="tel:{{ $settings[0]->hotline }}">{{ $settings[0]->hotline }}</a>
                        </p>
                        <p>Điện thoại:
                            <a href="tel:{{ $settings[0]->dien_thoai }}">{{ $settings[0 ]->dien_thoai }}</a>
                        </p>
                        <p>Email:
                            <a style="color:#a5afcd" href="mailto:{{ $settings[0]->email }}">{{ $settings[0]->email }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-article--2">
                <h2 class="footer__title">Chính sách của chúng tôi</h2>
                @if (TrangChuController::policy() != false)
                    <ul class="footer-article__ul">
                        @foreach (TrangChuController::policy() as $policy)
                            <li>
                                <a href="{{ route('newsDetailPage',$policy->id) }}">{{ $policy->ten }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="footer-article--3">
                <div class="footer__social">
                    <h2 class="footer__title">Kết nối với chúng tôi</h2>
                    @if (TrangChuController::social() != false)
                        <ul>
                            @foreach (TrangChuController::social() as $social)
                                <li>
                                    <a class="hvr-float-shadow" href="{{ $social->link }}" target="_blank">
                                        <figure>
                                            <img src="{{ asset('upload/loaihinhanh/' . $social->hinh_anh) }}"
                                                alt="{{ $social->ten }}">
                                            <figcaption>{{ $social->ten }}</figcaption>
                                        </figure>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="footer-article--4">
                <h2 class="footer__title">Fanage Facebook</h2>
                <div class="fb-page" data-href="{{ $settings[0]->fanpage }}" data-tabs="timeline" data-width="300" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="{{ $settings[0]->fanpage }}" class="fb-xfbml-parse-ignore">
                        <a href="{{ $settings[0]->fanpage }}">Facebook</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <div class="footer-copyright">
                @ Copyright {{ $settings[0]->copyright }}. Designed by Q.Trung - Q.Tánh
            </div>
        </div>
    </div>
</section>
<div class="footer-end">
    <div class="map-footer">
        {!! htmlspecialchars_decode($settings[0]->link_map) !!}
    </div>
</div>
{{-- Tools Website --}}
<div id='arcontactus'></div>
