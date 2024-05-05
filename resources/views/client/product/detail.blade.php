@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="product">
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
                                                    <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                                        alt="{{ $productDetail['name'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                                </figure>
                                            </div>
                                            @foreach ($productPhotoChild as $photoChild)
                                                <div class="product-detail__photo-parent-item swiper-slide">
                                                    <figure class="product-detail_photo-inner">
                                                        <img src="{{ asset('upload/products/gallery/' . $photoChild['photo']) }}"
                                                            alt="{{ $productDetail['name'] }}">
                                                        <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
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
                                                    <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                                        alt="{{ $productDetail['name'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                                </figure>
                                            </div>
                                            @foreach ($productPhotoChild as $photoChild)
                                                <div class="product-detail__photo-child-item swiper-slide">
                                                    <figure class="product-detail_photo-inner">
                                                        <img src="{{ asset('upload/products/gallery/' . $photoChild['photo']) }}"
                                                            alt="{{ $productDetail['name'] }}">
                                                        <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
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
                                        <h2 class="product-detail__name mb-2">{{ $productDetail['name'] }}</h2>
                                        <div class="product-detail__rating mb-3">
                                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                            <ion-icon style="font-size:var(--font-sz-4xl); color:#F59E0B;" name="star">
                                            </ion-icon>
                                            <?php } ?>
                                        </div>
                                        @empty(!$productBrand)
                                            <div class="product-detail__attr mb-3">
                                                <p class="product-detail__label">Hãng: </p>
                                                <div class="product-detail__attr-name">{{ $productBrand['name'] }}</div>
                                            </div>
                                        @endempty
                                        <div class="product-detail__price mb-3">
                                            <p class="product-detail__label">Giá bán</p>
                                            <div class="product-detail__price-item">
                                                <span class="product-detail__price-new">
                                                    <span>Từ</span> @convert($productDetail['price_from'])
                                                    <span>đến</span> @convert($productDetail['price_to'])
                                                </span>
                                                <span class="product-detail__price-old"></span>
                                            </div>
                                        </div>
                                        @empty(!$sizeName)
                                            <div class="product-detail__storage mb-3">
                                                <div class="product-detail__label">Dung lượng</div>
                                                <div class="storage__list">
                                                    @foreach ($sizeName as $sizes)
                                                        @foreach ($sizes as $size)
                                                            <div class="storage__item" data-id="{{ $size->id }}">
                                                                <div class="storage__name">{{ $size->name }}</div>
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
                                                        @foreach ($clrs as $clr)
                                                            <div class="color__item" data-id="{{ $clr->id }}">
                                                                <div class="color__name">{{ $clr->name }}</div>
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
                                                data-url="{{ route('add.to.cart', $productDetail['id']) }}">Thêm vào giỏ
                                                hàng</div>
                                            <div class="product-detail__button-item add-cart buy-now"
                                                data-id="{{ $productDetail['id'] }}"
                                                data-url="{{ route('add.to.cart', $productDetail['id']) }}">Mua ngay</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail--left-bottom mt-5">
                            <div class="product-detail__content">
                                {!! $productDetail['content'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="product-detail--right">
                        @if (count($criterias))
                            <div class="product-detail__criteria mb-5">
                                <div class="product-detail__criteria-list">
                                    @foreach ($criterias as $criteria)
                                        <div class="product-detail__criteria-item">
                                            <div class="product-detail__criteria-item-inner">
                                                <div class="criteria__item-photo">
                                                    <figure class="criteria__item-photo-inner">
                                                        <img onerror="{{ asset('adminate/images/noimg.jpg') }}"
                                                            src="{{ asset('upload/blogs/' . $criteria->photo) }}"
                                                            alt="{{ $criteria->photo }}">
                                                        <figcaption class="figcaption-hidden">{{ $criteria->photo }}
                                                    </figure>
                                                </div>
                                                <div class="criteria__item-info">
                                                    <div class="criteria__item-info-inner">
                                                        <h3 class="criteria__item-name text-split">{{ $criteria->name }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (count($productsRelated))
                            <div class="product-related">
                                <div class="home__title">
                                    <h2 class="title">Sản phẩm liên quan</h2>
                                </div>
                                <div class="product-related__list">
                                    @foreach ($productsRelated as $product)
                                        @include('client.layouts.components.ProductItem')
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
