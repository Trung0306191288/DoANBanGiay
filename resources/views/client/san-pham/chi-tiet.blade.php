@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="product-detail">
            <div class="wrap-content">
                <div class="product-detail" data-id="{{ $productDetail['id'] }}" data-url="{{ route('ajaxLoadPrice') }}">
                    <div class="product-detail--left">
                        <div class="product-detail--left-top">
                            <div class="product-detail--left-top-left">
                                <div class="product-detail__photo-parent mb-3">
                                    <div class="product-detail__photo-parent-list swiper parentGallery" thumbsSlider="">
                                        <div class="swiper-wrapper">
                                            <div class="product-detail__photo-parent-item swiper-slide">
                                                <figure class="product-detail_photo-inner">
                                                    <img src="{{ asset('upload/sanpham/' . $productDetail['hinh_anh']) }}"
                                                        alt="{{ $productDetail['ten'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['ten'] }}
                                                </figure>
                                            </div>
                                            @foreach ($productPhotoChild as $photoChild)
                                                <div class="product-detail__photo-parent-item swiper-slide">
                                                    <figure class="product-detail_photo-inner">
                                                        <img src="{{ asset('upload/sanpham/gallery/' . $photoChild['hinh_anh']) }}"
                                                            alt="{{ $productDetail['ten'] }}">
                                                        <figcaption class="figcaption-hidden">{{ $productDetail['ten'] }}
                                                    </figure>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="custom-swipper-button swiper-button-next"></div>
                                        <div class="custom-swipper-button swiper-button-prev"></div>
                                    </div>
                                </div>
                                <div class="product-detail__photo-child">
                                    <div class="product-detail__photo-child-list swiper childGallery" thumbsSlider="">
                                        <div class="swiper-wrapper">
                                            <div class="product-detail__photo-child-item swiper-slide">
                                                <figure class="product-detail_photo-inner">
                                                    <img src="{{ asset('upload/sanpham/' . $productDetail['hinh_anh']) }}"
                                                        alt="{{ $productDetail['ten'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['ten'] }}
                                                </figure>
                                            </div>
                                            @foreach ($productPhotoChild as $photoChild)
                                                <div class="product-detail__photo-child-item swiper-slide">
                                                    <figure class="product-detail_photo-inner">
                                                        <img src="{{ asset('upload/sanpham/gallery/' . $photoChild['hinh_anh']) }}"
                                                            alt="{{ $productDetail['hinh_anh'] }}">
                                                        <figcaption class="figcaption-hidden">{{ $productDetail['hinh_anh'] }}
                                                    </figure>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail--left-top-right">
                                <div class="product-detail__info">
                                    <form action="" method="post">
                                        <h2 class="product-detail__name mb-2">{{ $productDetail['ten'] }}</h2>
                                        @empty(!$productBrand)
                                            <div class="product-detail__attr mb-3">
                                                <p class="product-detail__label">Thương hiệu: </p>
                                                <div class="product-detail__attr-name">{{ $productBrand['ten'] }}</div>
                                            </div>
                                        @endempty
                                        <div class="product-detail__attr mb-3">
                                            <p class="product-detail__label">Mã sản phẩm: </p>
                                            <div class="product-detail__attr-name">{{ $productDetail['ma_san_pham'] }}</div>
                                        </div>
                                        <div class="product-detail__content">
                                            {!! $productDetail['mo_ta'] !!}
                                        </div>
                                        <div class="product-detail__price mb-3">
                                            @if($productDetail['gia_moi'])
                                                <p class="product-detail__label">Giá bán</p>
                                                <div class="product-detail__price-item">
                                                    <span class="product-detail__price-new">
                                                        @convert($productDetail['gia_moi'])
                                                    </span>
                                                    <span class="product-detail__price-old">
                                                        @convert($productDetail['gia_ban'])
                                                    </span>
                                                </div>
                                            @elseif($productDetail['gia_ban'])
                                                <p class="product-detail__label">Giá bán</p>
                                                <div class="product-detail__price-item">
                                                    <span class="product-detail__price-new">
                                                        @convert($productDetail['gia_moi'])
                                                    </span>
                                                </div>
                                            @else
                                                <p class="product-detail__label">Giá bán</p>
                                                <div class="product-detail__price-item">
                                                    <span class="product-detail__price-new">
                                                        Liên hệ
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        @empty(!$sizeName)
                                            <div class="product-detail__storage mb-3">
                                                <div class="product-detail__label">Kích thước</div>
                                                <div class="storage__list">
                                                    @foreach ($sizeName as $sizes)
                                                        @foreach ($sizes as $size)
                                                            <div class="size__item" data-id="{{ $size->id }}">
                                                                <div class="size__name">{{ $size->ten }}</div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endempty
                                        @empty(!$clrName)
                                            <div class="product-detail__color mb-3">
                                                <div class="product-detail__label">Màu sắc</div>
                                                <div class="color__list">
                                                    @foreach ($clrName as $clrs)
                                                        @foreach ($clrs as $k => $clr)
                                                            <div class="color__item" data-id="{{ $clr->id }}">
                                                                <div class="color__name" style="background: {{ $clr->code_mau }};  width: 35px;height: 35px;border-radius:5px;"></div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endempty
                                        <div class="cart__item-quantity" data-url="{{ route('update.cart') }}">
                                            <span
                                                class="cart__item-quantity-minus --minus cart__item-quantity-button detail">
                                                <ion-icon name="remove-outline"></ion-icon>
                                            </span>
                                            <input type="number" value="1" class="hidden-spin" data-min="1" readonly />
                                            <span
                                                class="cart__item-quantity-plus --plus cart__item-quantity-button detail">
                                                <ion-icon name="add-outline"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="product-detail__button">
                                            <div class="product-detail__button-item add-cart"
                                                data-id="{{ $productDetail['id'] }}"
                                                data-url="{{ route('add.to.cart', $productDetail['id']) }}">Thêm vào giỏ hàng</div>
                                            <div class="product-detail__button-item add-cart buy-now"
                                                data-id="{{ $productDetail['id'] }}"
                                                data-url="{{ route('add.to.cart', $productDetail['id']) }}">Mua ngay</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail--left-bottom mt-5">
                            <div class="tabs-pro-detail">
                                <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="info-pro-detail-tab" data-bs-toggle="tab" href="#info-pro-detail" role="tab">Thông tin sản phẩm</a>
                                    </li>
                                </ul>
                                <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
                                    <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">
                                        <div class="product-detail__content">
                                            {!! $productDetail['noi_dung'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($productsRelated))
            <div class="product-detail-bottom">
                <div class="title-main">
                    <span>Sản phẩm cùng loại</span>
                    <div class="animate-border"></div>
                </div>
                <div class="w-clear">
                    @foreach ($productsRelated as $v)
                        <div class="product-paging">
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
            </div>  
        @endif
        
    </div>
@endsection
