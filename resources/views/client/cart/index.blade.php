@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="cart-info">
            <div class="cart-info__inner">
                <div class="cart-info__head mb-4">
                    <h2 class="cart-info__title">Thông tin đơn hàng của bạn đã được tiếp nhận</h2>
                    <p class="cart-info__desc">
                        Cảm ơn bạn đã tin tưởng mua hàng của cửa hàng chúng tôi. <br>
                        Chúng tôi sẽ liên hệ cho bạn sớm nhất qua số điện thoại đặt hàng. <br>
                        Dưới đây là thông tin đơn hàng và thông tin hình thức thanh toán của bạn.
                    </p>
                </div>
                <div class="cart-info__inner-top d-flex flex-wrap justify-content-between mb-4">
                    <div class="cart-info--left">
                        <div class="order-info">
                            <div class="order-info__list">
                                <div class="order-info__item">
                                    <p class="order-info__title">Mã đơn hàng:</p>
                                    <p class="order-info__content">
                                        <span>{{ $orderInfo->ma_don_hang }}</span>
                                    </p>
                                </div>
                                <div class="order-info__item">
                                    <p class="order-info__title">Tên người nhận:</p>
                                    <p class="order-info__content">{{ $orderInfo->ho_ten }}</p>
                                </div>
                                <div class="order-info__item">
                                    <p class="order-info__title">Số điện thoại:</p>
                                    <p class="order-info__content">{{ $orderInfo->dien_thoai }}</p>
                                </div>
                                <div class="order-info__item">
                                    <p class="order-info__title">Email:</p>
                                    <p class="order-info__content">{{ $orderInfo->email }}</p>
                                </div>
                                <div class="order-info__item">
                                    <p class="order-info__title">Địa chỉ giao hàng:</p>
                                    <p class="order-info__content">{{ $orderInfo->dia_chi }}</p>
                                </div>
                                <div class="order-info__item is-note">
                                    <p class="order-info__title">Ghi chú:</p>
                                    <p class="order-info__content">{{ $orderInfo->ghi_chu }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-info--right">
                        <div class="order-info">
                            <div class="order-info__list">
                                <div class="order-info__item">
                                    <p class="order-info__title">Hình thức thanh toán:</p>
                                    {{-- <p class="order-info__content"><span>{{ $payment->name }}</span></p> --}}
                                </div>
                                <div class="order-info__item is-note">
                                    <p class="order-info__title">Cách thức thanh toán:</p>
                                    <div class="order-info__content ckeditor">
                                        {{-- {!! $payment->content !!} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-info__inner-bottom">
                    <div class="cart-info__inner-bottom-title">Chi tiết đơn hàng</div>
                    <div class="cart__total mb-4">
                        <div class="cart__total-cost">
                            <p>Tổng tiền: </p>
                            <p>@convert($orderInfo->tong_gia)</p>
                        </div>
                    </div>
                    <div class="cart__list flex-list">
                        @foreach ($orderDetail as $details)
                            <div class="cart__item">
                                <div class="cart__item-inner">
                                    <div class="cart__item--left">
                                        <div class="cart__item-photo">
                                            <div class="cart__item-photo-inner">
                                                <img onerror="{{ asset('adminbuild/images/noimage.png') }}"
                                                    src="{{ asset('upload/sanpham/' . $details['hinh_anh']) }}"
                                                    alt="{{ $details['ten'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__item--right">
                                        <div class="cart__item-info">
                                            <div class="cart__item-name">{{ $details['ten'] }}</div>
                                            <div class="cart__item-attr">
                                                <div class="cart__item-attr-color">
                                                    <span>Màu:</span>
                                                    <span>{{ $details['ten_mau_sac'] }}</span>
                                                </div>
                                                <div class="cart__item-attr-storage">
                                                    <span>Kích thước:</span>
                                                    <span>{{ $details['ten_kich_thuoc'] }}</span>
                                                </div>
                                                <div class="cart__item-quantity">
                                                    <span>Số lượng:</span>
                                                    <span>{{ $details['so_luong'] }}</span>
                                                </div>
                                                <div class="cart__item-price">
                                                    <div class="cart__item-price-title">Giá:</div>
                                                    <div class="cart__item-price-new">@convert($details['gia_moi'])</div>
                                                    <div class="cart__item-price-old">@convert($details['gia_ban'])</div>
                                                </div>
                                            </div>
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </div>
            </div>
        </section>
    </div>
@endsection
