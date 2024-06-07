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
                                    <p class="order-info__content">
                                        <span>{{ $orderInfo->hinh_thuc_thanh_toan }}</span>
                                    </p>
                                </div>
                                <div class="order-info__item is-note">
                                    <p class="order-info__title">Cách thức thanh toán:</p>
                                    <div class="order-info__content ckeditor">
                                        <span>{!! $payment->noi_dung !!}</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-info__inner-bottom">
                    <div class="cart-info__inner-bottom-title">Chi tiết đơn hàng</div>
                    <div class="card-body add">
                        <table class="table table_list_product align-middle">
                            <thead>
                                <tr class="sty_head_table">
                                    <th style="width: 30px;" class="text-center" scope="col">STT</th>
                                    <th style="width: 150px;" class="text-center" scope="col">HÌnh ảnh</th>
                                    <th style="width: 250px;" scope="col">Tên sản phẩm</th>
                                    <th style="width: 250px;" scope="col">Hình thức thanh toán</th>
                                    <th style="width: 150px;" class="text-center" scope="col">Kích thước</th>
                                    <th style="width: 150px;" class="text-center" scope="col">Màu sắc</th>
                                    <th style="width: 100px;" class="text-center" scope="col">Số lượng</th>
                                    <th style="width: 150px;" class="text-center" scope="col">Giá bán</th>
                                    <th style="width: 150px;" class="text-center" scope="col">Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody class="sty_body_table">
                                @foreach ($orderDetail as $k => $orderDetail)
                                    <tr>
                                        <th class="text-center">{{ $k + 1 }}</th>
                                        <th class="text-center">
                                            <img class="img_main"
                                                onerror="{{ asset('adminbuild/images/noimage.png') }}"
                                                src="{{ asset('upload/sanpham/' . $orderDetail->hinh_anh) }}"
                                                width="100" height="100" alt="{{ $orderDetail->ten }}">
                                        </th>
                                        <th>{{$orderDetail->ten_san_pham }}</th>
                                        <th> {{ $orderInfo->hinh_thuc_thanh_toan  }}
                                        </th>
                                        <th class="text-center">{{ $orderDetail->ten_kich_thuoc }}</th>
                                        <th class="text-center">{{ $orderDetail->ten_mau_sac }}</th>
                                        <th class="text-center">{{ $orderDetail->so_luong }}</th>
                                        <th class="txt_green text-center">
                                            <p class="m-0" style="color:#ec2d3f;">@convert($orderDetail->gia_moi)</p>
                                            <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                @convert($orderDetail->gia_ban)
                                            </p>
                                        </th>
                                        <th class="text-center">
                                            <p class="m-0" style="color:#ec2d3f;">
                                                @convert($orderDetail->gia_moi * $orderDetail->so_luong)
                                            </p>
                                            <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                @convert($orderDetail->gia_ban * $orderDetail->so_luong)
                                            </p>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box_total_order">
                            <div class="item_Ship">
                                <span style="font-weight:bold;">Tổng tiền của bạn:</span>
                                <span style="color:#ec2d3f;font-weight:bold;">@convert($orderInfo->tong_gia)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
