@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span>Giỏ hàng của bạn</span>
            <div class="animate-border"></div>
        </div>
        <div class="cart wrap-cart">
            <div class="cart__inner">
                @if (session('cart'))
                    @php $total = 0 @endphp
                    <div class="cart--left">
                        <div class="cart__list mb-4">
                            @foreach (session('cart') as $id => $details)
                            @php
                                if ($details['price_new']) {
                                    $total += $details['price_new'] * $details['quantity'];
                                } else {
                                    $total += $details['price_old'] * $details['quantity'];
                                }
                            @endphp
                                <div class="cart__item" data-id="{{ $id }}">
                                    <div class="cart__item-inner">
                                        <div class="cart__item--left">
                                            <div class="cart__item-photo">
                                                <div class="cart__item-photo-inner">
                                                    <img onerror="{{ asset('adminbuild/images/noimage.png') }}"
                                                        src="{{ asset('upload/sanpham/' . $details['photo']) }}"
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
                                                        <span>Kích thước: </span>
                                                        <span>{{ $details['sizeName'] }}</span>
                                                    </div>
                                                    <div class="cart__item-price">
                                                        <div class="cart__item-price-title">Giá:</div>
                                                        @if($details['price_new'])
                                                            <div class="cart__item-price-new">@convert($details['price_new'])</div>
                                                            <div class="cart__item-price-old">@convert($details['price_old'])</div>
                                                        @else
                                                            <div class="cart__item-price-new">@convert($details['price_old'])</div>
                                                        @endif
                                                       
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
                                                        class="hidden-spin" data-max="{{ $details['inventory'] }}" />
                                                        {{-- <input type="number" value="{{ $details['quantity'] }}"
                                                        class="hidden-spin" data-max="{{ $details['inventory'] }}"
                                                        readonly /> --}}
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
                        <form class="cart__info" action="{{ route('payment', $code) }}" method="POST" id="paymentForm">
                            @csrf
                            <div class="cart__info-item">
                                <label for="payment_method" class="cart__info-item-label">Hình thức thanh toán</label>
                                <select name="payment_method" id="payment_method" class="cart__info-selection" required>
                                    <option value="">Chọn hình thức thanh toán</option>
                                    @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}.{{ $payment->ten }}">{{ $payment->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="cart__info-item-list">
                                <div class="cart__info-item">
                                    <label for="name" class="cart__info-item-label">Tên người nhận</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->ho_ten : '' }}" class="cart__info-item-input" required>
                                </div>
                                <div class="cart__info-item">
                                    <label for="phone" class="cart__info-item-label">Số điện thoại</label>
                                    <input type="number" name="phone" id="phone" value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->dien_thoai : '' }}" class="cart__info-item-input hidden-spin" required>
                                </div>
                            </div>
                            <div class="cart__info-item">
                                <label for="email" class="cart__info-item-label">Email</label>
                                <input type="email" name="email" id="email" value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->email : '' }}" class="cart__info-item-input" required>
                            </div>
                            <div class="cart__info-item">
                                <label for="address" class="cart__info-item-label">Địa chỉ</label>
                                <input type="text" name="address" id="address" value="{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->dia_chi : '' }}" class="cart__info-item-input" required>
                            </div>
                            <div class="cart__info-item">
                                <label for="note" class="cart__info-item-label">Ghi chú</label>
                                <textarea name="note" id="note" rows="5" class="cart__info-item-textarea"></textarea>
                            </div>
                            <div class="cart__info-item">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="code" value="{{ $code }}">
                                <button type="submit" name="payment" class="cart__info-item-button mb-4">Thanh toán ngay</button>
                                <button type="submit" name="redirect" class="cart__info-item-button" onclick="submitVnPayForm()">Thanh toán VnPay</button>
                            </div>
                        </form>
                        <script>
                            function submitVnPayForm() {
                                const form = document.getElementById('paymentForm');
                                form.action = "{{ url('/vnpay_payment') }}";
                                form.method = "POST";
                                form.submit();
                            }
                        </script>
                    </div>
                @else
                    <a href="{{ route('TrangChu') }}" class="empty-cart text-decoration-none d-block">
                        <div><ion-icon name="cart-outline"></ion-icon></div>
                        <p>Không tồn tại sản phẩm nào trong giỏ hàng !</p>
                        <span class="btn btn-warning">Về trang chủ</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
