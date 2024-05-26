<?php
use App\Http\Controllers\Clients\TrangChuController;
?>
@extends('client.index')
@section('content')
    @include('client.layouts.slide')
    @if(TrangChuController::tieuchi() == true)
            <div class="wrap-tieuchi">
                <div class="wrap-content">
                    <div class="swiper swiper-tieuchi ">
                        <div class="swiper-wrapper">
                            @foreach (TrangChuController::tieuchi() as $v)
                            <div class="items-tieuchi swiper-slide">
                                <div class="box-tieuchi">
                                    <div class="pic-tieuchi hrv-rotateY">
                                        <a class="img-tieuchi scale-img" title="{{ $v['ten'] }}" href="">
                                            <img src="{{ asset('upload/baiviets/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-tieuchi">
                                        <p class="mb-0">{{$v['ten']}}</p>
                                        <span>{{$v['mo_ta']}}</span>
                                    </div>
                                </div>
                            </div>	
                            @endforeach
                        </div>
                        <!-- <div class="swiper-button custom-swipper-button  swiper-button-prevc swiper-tieuchi-prev"></div> -->
                        <!-- <div class="swiper-button custom-swipper-button swiper-button-next swiper-tieuchi-next"></div> -->
                    </div>
                </div>
            </div>
        @endif
    @if (TrangChuController::quangcao() == true || TrangChuController::brand() == true)
        <div class="wrap-banner-brand">
            <div class="wrap-content">
                <div class="col-banner-brand">
                    <div>
                        @foreach (TrangChuController::quangcao() as $v)
                            <div class="banner-items">
                                <a class="banner-photo" href="{{ $v['link'] }}" target="_blank">
                                    <div class="banner-img">
                                        <img src="{{ asset('upload/loaihinhanh/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <div class="col-brand">
                            @foreach (TrangChuController::brand() as $v)
                            <div class="items-brand">
								<div class="box-brand">
									<div class="pic-brand">
										<a class="img-brand scale-img" title="{{ $v['ten'] }}" href="">
                                            <img src="{{ asset('upload/thuonghieu/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
									</div>
									<div class="info-brand">
										<h3 class="mb-0 name-brand"><a title="{{ $v['ten'] }}" href="">{{ $v['ten'] }}</a></h3>
										<ion-icon name="chevron-forward-outline"></ion-icon>
									</div>
								</div>
							</div>	
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(TrangChuController::news() == true)
            <div class="wrap-newsnb">
                <div class="wrap-content">
                    <div class="title-pro-main">
                        <img src="clients/images/shoes.png" style="width:46px;" alt="Giày Cũ Hàng Hiệu ">
                        <div>
                            <span>Tin tức mới</span>
                        </div>
                    </div>
                    <div class="swiper swiper-news ">
                        <div class="swiper-wrapper">
                            @foreach (TrangChuController::news() as $v)
                            <div class="items-news swiper-slide">
                                <div class="box-news">
                                    <div class="pic-news">
                                        <a class="img-news scale-img" title="{{ $v['ten'] }}" href="">
                                            <img src="{{ asset('upload/baiviets/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-news">
                                        <h3 class="mb-0 name-news"><a title="{{ $v['ten'] }}" href="">{{ $v['ten'] }}</a></h3>
                                        <div class="mb-0 mota-news text-split">{{$v['mo_ta']}}</div>
                                    </div>
                                </div>
                            </div>	
                            @endforeach
                        </div>
                        <!-- <div class="swiper-button custom-swipper-button  swiper-button-prevc swiper-news-prev"></div> -->
                        <!-- <div class="swiper-button custom-swipper-button swiper-button-next swiper-news-next"></div> -->
                    </div>
                </div>
            </div>
        @endif
@endsection
