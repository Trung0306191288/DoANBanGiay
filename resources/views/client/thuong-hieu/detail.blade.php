<?php
use App\Http\Controllers\Clients\TrangChuController;
$settings = TrangChuController::setting();
?>

@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span><?= $TieuDe ?></span>
            <div class="animate-border"></div>
        </div>
        <section class="product-page">
            <div class="wrap-content">
                <div class="flex_product">
                    <div class="left_product">
                        <?php
                            $color1 = array_map('intval', explode(",", htmlspecialchars($_GET['mausac'] ?? '')));
                            $size1 = array_map('intval', explode(",", htmlspecialchars($_GET['kichthuoc'] ?? '')));
                            $range1 = htmlspecialchars($_GET['KhoangGia'] ?? '');
                            $arayrange1 = array_map('intval', explode("-", $range1));
                        ?>
                        <div class="timkiemnhan">
                            <div class="bg_timkiem">
                                <div class="title-filter"><span><img src="{{ asset('clients/images/icon-filter.png') }}" alt="" /> Bộ Lọc Sản Phẩm</span></div>
                                <div class="filter-options flex">
                                    <div class="collapsible">
                                        <p>Kích thước</p>
                                        <div class="noidung noidung_size filter-options-content" data-type="kichthuoc">
                                            <div class="flex">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" id="select_all_sizes"> Chọn tất cả
                                                    </label>
                                                </li>
                                                @foreach ($size_pro as $v)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="size_filter" value="{{ $v->id }}" {{ in_array($v->id, $size1) ? "checked" : "" }}>
                                                        {{ $v->{'ten'} }}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapsible">
                                        <p>Màu sắc</p>
                                        <div class="noidung noidung_color filter-options-content" data-type="mausac">
                                            <div class="flex">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" id="select_all_colors"> Chọn tất cả
                                                    </label>
                                                </li>
                                                @foreach ($color_pro as $v)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="color_filter" value="{{ $v->id }}" {{ in_array($v->id, $color1) ? "checked" : "" }}>
                                                        {{ $v->{'ten'} }}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kung_range">
                                    <p class="edit">Khoảng giá</p>
                                    <div class="wrapper">
                                        <div class="flex2">
                                            <p class="begin">@convert(0)</p>
                                            <div class="container1">
                                                <div class="slider-track"></div>
                                                <input type="range" min="0" max="{{ $settings[0]->khoang_gia }}" value="{{ $arayrange1[0] ?? 0 }}" id="slider-1" oninput="slideOne()">
                                                <input type="hidden" id="giadau" name="giadau" value="{{ $arayrange1[0] ?? 0 }}">
                                                <input type="range" min="0" max="{{ $settings[0]->khoang_gia }}" value="{{ $arayrange1[1] ?? $settings[0]->khoang_gia }}" id="slider-2" oninput="slideTwo()">
                                                <input type="hidden" id="giacuoi" name="giacuoi" value="{{ $arayrange1[1] ?? $settings[0]->khoang_gia }}">
                                            </div>
                                            <p class="end">@convert($settings[0]->khoang_gia)</p>
                                        </div>
                                        <div class="values">
                                            <span id="range1">{{ $arayrange1[0] ?? 0 }}</span>
                                            <span> &dash; </span>
                                            <span id="range2">{{ $arayrange1[1] ?? $settings[0]->khoang_gia }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="right_product">
                        @if (count($products))
                            <div class="product-main w-clear">
                                @foreach ($products as $k => $v)
                                    <div class="product">
                                        <div class="box-product">
                                            <div class="pic-product">
                                                <a class="img-product scale-img hover_xam" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">
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
            </div>
        </section>
    </div>
@endsection