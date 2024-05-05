<?php
use App\Http\Controllers\Clients\IndexController;
?>
<section class="footer--top mt-5">
    <div class="footer-article">
        <div class="wrap-content d-flex flex-wrap justify-content-between">
            <div class="footer-article--1">
                <div class="footer__contact mb-3">
                    <h2 class="footer__title">Thông tin liên hệ</h2>
                    <div class="footer__info">
                        <p>Địa chỉ: 65 Huỳnh Thúc Kháng, P.Bến Nghé, Q.1, Tp.HCM</p>
                        <p>Hotline:
                            <a href="tel:0777046925">0777 046 925</a>
                        </p>
                        <p>Điện thoại:
                            <a href="tel:0377475853">0377 475 853</a>
                        </p>
                        <p>Email:
                            <a style="color:#a5afcd" href="mailto:0306191288@caothang.edu.vn">0306191288@caothang.edu.vn</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-article--2">
                <h2 class="footer__title">Chính sách của chúng tôi</h2>
                {{-- @if (IndexController::policy() != false)
                    <ul class="footer-article__ul">
                        @foreach (IndexController::policy() as $policy)
                            <li>
                                <a href="{{ $policy->link }}">{{ $policy->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif --}}
            </div>
            <div class="footer-article--3">
                <div class="footer__social">
                    <h2 class="footer__title">Kết nối với chúng tôi</h2>
                    {{-- @if (IndexController::social() != false)
                        <ul>
                            @foreach (IndexController::social() as $social)
                                <li>
                                    <a class="hvr-float-shadow" href="{{ $social->link }}" target="_blank">
                                        <figure>
                                            <img src="{{ asset('upload/photo/' . $social->photo) }}"
                                                alt="{{ $social->name }}">
                                            <figcaption>{{ $social->name }}</figcaption>
                                        </figure>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif --}}
                </div>
            </div>
            <div class="footer-article--4">
                <h2 class="footer__title">Hình thức thanh toán</h2>
                {{-- <div class="payment__method-photo">
                    <img src="{{ asset('clients/images/payments.png') }}"
                    alt="Hình thức thanh toán">
                </div> --}}
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <div class="footer-copyright">
                @ Copyright Đồ Án Tốt Nghiệp Website Bán Giày. Designed by Q.Trung - Q.Tánh
            </div>
        </div>
    </div>
</section>
<div class="footer-end">
    <div class="map-footer">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5139339979746!2d106.69867477508859!3d10.771894089376596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1713028565112!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
