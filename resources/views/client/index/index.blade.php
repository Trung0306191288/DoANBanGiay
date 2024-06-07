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
    @if(TrangChuController::hangmoive() == true)
        <div class="wrap-product-hot">
            <div class="wrap-content">
                <div class="title-pro-main">
                    <img src="clients/images/shoes.png" style="width:46px;" alt="Giày Cũ Hàng Hiệu ">
                    <div>
                        <span>Hàng mới về</span>
                    </div>
                </div>
                <div class="product-hot-index">
                    <div class="product-hot-owl owl-carousel owl-theme">
                        @foreach (TrangChuController::hangmoive() as $v) 
                            <div class="product-hot-slick">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <a class="img-product scale-img hover_xam" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">
                                            <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="{{ route('productDetailPage',['id'=>$v->id]) }}"" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
                                        <p class="price-product">
                                            @if ($v['gia_moi'])
                                                <span class="price-new"><span>Giá: </span>@convert($v->gia_moi)</span>
                                                <span class="price-old"><span>Giá: </span>@convert($v->gia_ban)</span>
                                            @else 
                                                <span class="price-new">
                                                    @if($v['gia_ban'])  
                                                        <span>Giá:</span> @convert($v->gia_ban)
                                                    @else
                                                        <span>Giá:</span> Liên hệ
                                                    @endif
                                                </span>
                                            @endif
                                        </p>
                                    </div> 
                                </div> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (TrangChuController::quangcao() == true || TrangChuController::brand() == true)
        <div class="wrap-banner-brand">
            <div class="wrap-content">
                <div class="col-banner-brand">
                    <div>
                        <div class="owl-banner owl-carousel owl-theme">
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

        @if(TrangChuController::LayThuongHieu() == true)
            @foreach (TrangChuController::LayThuongHieu() as $category)
                <div class="wrap-product">
                    <div class="wrap-content">
                        <div class="title-pro-main">
                            <img src="clients/images/shoes.png" style="width:46px;" alt="Giày Cũ Hàng Hiệu ">
                            <div>
                                <span>{{ $category['ten'] }}</span>
                            </div>
                        </div>
                        @if (TrangChuController::SanPhamTheoThuongHieu($category->id) != false)
                            <div class="product-owl owl-carousel owl-theme">
                                @foreach (TrangChuController::SanPhamTheoThuongHieu($category->id) as $v)
                                    <div class="product-slick">
                                        <div class="box-product">
                                            <div class="pic-product">
                                                <a class="img-product scale-img hover_xam" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">
                                                    <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                                </a>
                                            </div>
                                            <div class="info-product">
                                                <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="{{ route('productDetailPage',['id'=>$v->id]) }}"" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
                                                <p class="price-product">
                                                    @if ($v['gia_moi'])
                                                        <span class="price-new"><span>Giá: </span>@convert($v->gia_moi)</span>
                                                        <span class="price-old"><span>Giá: </span>@convert($v->gia_ban)</span>
                                                    @else 
                                                        <span class="price-new">
                                                            @if($v['gia_ban'])
                                                                <span>Giá:</span> @convert($v->gia_ban)
                                                            @else
                                                                <span>Giá:</span> Liên hệ
                                                            @endif
                                                        </span>
                                                    @endif
                                                </p>
                                            </div> 
                                        </div> 
                                    </div>   
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        @if(TrangChuController::khonggianquan() == true) 
            <div class="wrap-album">
                <div class="wrap-content">
                    <div class="title-pro-main">
                        <img src="clients/images/shoes.png" style="width:46px;" alt="Giày Cũ Hàng Hiệu ">
                        <div>
                            <span>Không gian shop</span>
                        </div>
                    </div>
                    <div class="w-clear">
                        @foreach (TrangChuController::khonggianquan() as $v)
                            <div class="pic-album">
                                <a class="img-album scale-img hover_xam" href="{{ $v['link'] }}" title="{{$v['ten']}}">
                                    <img src="{{ asset('upload/loaihinhanh/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                </a>
                            </div>
                        @endforeach
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
                                        <a class="img-news scale-img hover_xam" href="{{ route('newsDetailPage',$v->id) }}" title="{{ $v['ten'] }}" >
                                            <img src="{{ asset('upload/baiviets/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-news">
                                        <h3 class="mb-0 name-news"><a title="{{ $v['ten'] }}" href="{{ route('newsDetailPage',$v->id) }}">{{ $v['ten'] }}</a></h3>
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
