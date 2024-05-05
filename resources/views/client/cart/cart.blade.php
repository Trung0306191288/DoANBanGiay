@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="cart">
            <div class="main__title text-left">
                <h2>Giỏ hàng</h2>
            </div>
            <div class="cart__inner">
                @if (session('cart'))
                    @php $total = 0 @endphp
                    <div class="cart--left">
                        <div class="cart__list mb-4">
                            @foreach (session('cart') as $id => $details)
                                @php $total += $details['price_new'] * $details['quantity'] @endphp
                                <div class="cart__item" data-id="{{ $id }}">
                                    <div class="cart__item-inner">
                                        <div class="cart__item--left">
                                            <div class="cart__item-photo">
                                                <div class="cart__item-photo-inner">
                                                    <img onerror="{{ asset('adminate/images/noimg.jpg') }}"
                                                        src="{{ asset('upload/products/' . $details['photo']) }}"
                                                        alt="{{ $details['name'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart__item--right">
                                            <div class="cart__item-info">
                                                <div class="cart__item-name">{{ $details['name'] }}</div>
                                                <div class="cart__item-attr">
                                                    <div class="cart__item-attr-color">
                                                        <span>Màu: </span>
                                                        <span>{{ $details['colorName'] }}</span>
                                                    </div>
                                                    <div class="cart__item-attr-storage">
                                                        <span>Dung lượng: </span>
                                                        <span>{{ $details['sizeName'] }}</span>
                                                    </div>
                                                    <div class="cart__item-price">
                                                        <div class="cart__item-price-title">Giá:</div>
                                                        <div class="cart__item-price-new">@convert($details['price_new'])</div>
                                                        <div class="cart__item-price-old">@convert($details['price_old'])</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart__item-action">
                                                <div class="cart__item-action-delete remove-from-cart"
                                                    data-url="{{ route('remove.from.cart') }}">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </div>
                                                <div class="cart__item-quantity" data-url="{{ route('update.cart') }}">
                                                    <span
                                                        class="cart__item-quantity-minus --minus cart__item-quantity-button">
                                                        <ion-icon name="remove-outline"></ion-icon>
                                                    </span>
                                                    <input type="number" value="{{ $details['quantity'] }}"
                                                        class="hidden-spin" data-max="{{ $details['inventory'] }}"
                                                        readonly />
                                                    <span
                                                        class="cart__item-quantity-plus --plus cart__item-quantity-button">
                                                        <ion-icon name="add-outline"></ion-icon>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="cart__total">
                            <div class="cart__total-cost">
                                <p>Tổng tiền: </p>
                                <p>@convert($total)</p>
                            </div>
                        </div>
                    </div>
                    <div class="cart--right">
                        <form class="cart__info" action="{{ route('payment', $code) }}" method="POST">
                            @csrf
                            <div class="cart__info-item">
                                <label for="payment_method" class="cart__info-item-label">Hình thức thanh toán</label>
                                <select name="payment_method" id="payment_method" class="cart__info-selection"
                                    oninvalid="this.setCustomValidity('Vui lòng chọn hình thức thanh toán')"
                                    oninput="setCustomValidity('')" title="Vui lòng chọn hình thức thanh toán" required>
                                    <option value="">Chọn hình thức thanh toán</option>
                                    @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="cart__info-item-list">
                                <div class="cart__info-item">
                                    <label for="name" class="cart__info-item-label">Tên người nhận</label>
                                    <input type="text" name="name" id="name"
                                        value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->fullname : '' }}"
                                        class="cart__info-item-input" required>
                                </div>
                                <div class="cart__info-item">
                                    <label for="phone" class="cart__info-item-label">Số điện thoại</label>
                                    <input type="number" name="phone" id="phone"
                                        value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->phone : '' }}"
                                        class="cart__info-item-input hidden-spin" required>
                                </div>
                            </div>
                            <div class="cart__info-item">
                                <label for="email" class="cart__info-item-label">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->email : '' }}"
                                    class="cart__info-item-input" required>
                            </div>
                            <div class="cart__info-item">
                                <label for="address" class="cart__info-item-label">Địa chỉ</label>
                                <input type="text" name="address" id="address"
                                    value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->address : '' }}"
                                    class="cart__info-item-input" required>
                            </div>
                            <div class="cart__info-item">
                                <label for="note" class="cart__info-item-label">Ghi chú</label>
                                <textarea name="note" id="note" rows="5" class="cart__info-item-textarea"></textarea>
                            </div>
                            <div class="cart__info-item">
                                <button type="submit" name="payment" class="cart__info-item-button">Thanh toán
                                    ngay</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="alert alert-warning text-center w-100">
                        <a href="{{ route('clientIndex') }}">Bạn chưa thêm sản phẩm nào!</a>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
