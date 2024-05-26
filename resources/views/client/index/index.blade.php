<?php
use App\Http\Controllers\Clients\TrangChuController;
?>
@extends('client.index')
@section('content')
    @include('client.layouts.slide')
    
    @if (TrangChuController::hangmoive() == true)
        <div class="wrap-product-new">
            <div class="wrap-content">
                <div class="title-main-index">
                    <img src="{{ asset('clients/images/shoes.png') }}" alt="">
                    <div>
                        <span>Hàng mới về</span>
                    </div>
                </div>
                <div class="product-new-index">
                    <div class="owl-product-new owl-carousel owl-theme">
                        @foreach (TrangChuController::hangmoive() as $v)
                            <div class="product-new-swiper">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <a class="img-product scale-img hover_xam" title="{{ $v['ten'] }}" href="{{ route('productDetailPage',['id'=>$v->id]) }}">
                                            <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
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

    @if (TrangChuController::LayThuongHieu() == true)
        @foreach (TrangChuController::LayThuongHieu() as $brand)
            <div class="wrap-product">
                <div class="wrap-content">
                    <div class="title-main-index">
                        <img src="{{ asset('clients/images/shoes.png') }}" alt="">
                        <div>
                            <span>{{ $brand['ten'] }}</span>
                        </div>
                    </div>
                    @if (TrangChuController::SanPhamTheoThuongHieu($brand->id) == true)
                        <div class="owl-product-new owl-carousel owl-theme">
                            @foreach (TrangChuController::SanPhamTheoThuongHieu($brand->id) as $v)
                                <div class="product-new-swiper">
                                    <div class="box-product">
                                        <div class="pic-product">
                                            <a class="img-product scale-img hover_xam" title="{{ $v['ten'] }}" href="{{ route('productDetailPage',['id'=>$v->id]) }}">
                                                <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
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
                    @else
                        <div class="alert alert-warning w-100" role="alert">
                            <strong>Không tìm thấy kết quả</strong>
                        </div>
                    @endif
                </div>
            </div>
         @endforeach
    @endif

    @if (TrangChuController::khonggianquan() == true)
        <div class="wrap-alum">
            <div class="wrap-content">
                <div class="title-main-index">
                    <img src="{{ asset('clients/images/shoes.png') }}" alt="">
                    <div>
                        <span>Không gian shop</span>
                    </div>
                </div>
                <div class="max-box w-clear">
                    <div class="box-album  album-gallery">
                        @foreach (TrangChuController::khonggianquan() as $v)
                            <div class="pic-album">
                                <a class="img-album scale-img" title="{{ $v['ten'] }}" href="">
                                    <img src="{{ asset('upload/loaihinhanh/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                </a>
                            </div>
                          @endforeach  
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
