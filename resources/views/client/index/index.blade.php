<?php
use App\Http\Controllers\Clients\TrangChuController;
?>
@extends('client.index')
@section('content')
    @include('client.layouts.slide')
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
@endsection
