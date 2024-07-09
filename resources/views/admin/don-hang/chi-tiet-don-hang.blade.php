<?php
use App\Http\Controllers\DonHangController;
?>
@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ route('capnhatdonhang', ['id' => $orderInfo->id]) }}" method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
                @csrf
                <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
            </div>
            <div class="flex_form">
                <div class="left_form full_form">
                    <div class="box_list_img">
                        <div class="card">
                            <div class="card-header">Thông tin chi tiết đơn hàng</div>
                            <div class="card-body">
                                <div class="box_info">
                                    <div class="item_info">
                                        <div class="title_info">Mã đơn hàng</div>
                                        <div class="content_info" style="color:#ec2d3f;font-weight:bold;">
                                            {{ $orderInfo->ma_don_hang }}</div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Tên khách hàng</div>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $orderInfo->ho_ten }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Số điện thoại</div>
                                        <input type="number" class="form-control" name="phone" id="phone"
                                            value="{{ $orderInfo->dien_thoai }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Email</div>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $orderInfo->email }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Địa chỉ giao hàng</div>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $orderInfo->dia_chi }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Ghi chú</div>
                                        <input type="text" class="form-control" name="note" id="note"
                                            value="{{ $orderInfo->ghi_chu }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Hình thức thanh toán</div>
                                        <div class="content_info">
                                            {{-- {{ DonHangController::orderPayments($orderInfo->payments)->ten }} --}}
                                            {{ $orderInfo->hinh_thuc_thanh_toan  }}
                                        </div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Trạng thái đơn hàng</div>
                                        @if ($orderInfo->tinh_trang_don_hang != 'Đã hủy')
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_order">
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="Chờ xác nhận"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Chờ xác nhận' ? 'selected' : null }}>
                                                    Chờ xác nhận</option>
                                                <option value="Đã xác nhận"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Đã xác nhận' ? 'selected' : null }}>
                                                    Đã xác nhận</option>
                                                <option value="Chờ vận chuyển"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Chờ vận chuyển' ? 'selected' : null }}>
                                                    Chờ vận chuyển</option>
                                                <option value="Đã vận chuyển"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Đã vận chuyển' ? 'selected' : null }}>
                                                    Đã vận chuyển</option>
                                                <option value="Đã giao"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Đã giao' ? 'selected' : null }}>
                                                    Đã giao</option>
                                                <option value="Đã hủy"
                                                    {{ $orderInfo->tinh_trang_don_hang == 'Đã hủy' ? 'selected' : null }}>
                                                    Đã hủy</option>
                                            </select>
                                        @else
                                            <div class="content_info">{{ $orderInfo->tinh_trang_don_hang }}</div>
                                        @endif
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Trạng thái thanh toán</div>
                                        @if ($orderInfo->tinh_trang_hinh_thuc != 'Đã thanh toán' && $orderInfo->tinh_trang_don_hang != 'Đã hủy')
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_payment">
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="Chưa thanh toán"
                                                    {{ $orderInfo->tinh_trang_hinh_thuc == 'Chưa thanh toán' ? 'selected' : null }}>
                                                    Chưa thanh toán</option>
                                                <option value="Đã thanh toán"
                                                    {{ $orderInfo->tinh_trang_hinh_thuc == 'Đã thanh toán' ? 'selected' : null }}>
                                                    Đã thanh toán</option>
                                            </select>
                                        @else
                                            <div class="content_info">{{ $orderInfo->tinh_trang_hinh_thuc }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">Thông tin sản phẩm</div>
                            <div class="card-body">
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
                                        @foreach ($orderDetails as $k => $orderDetail)
                                            <tr>
                                                <th class="text-center">{{ $k + 1 }}</th>
                                                <th class="text-center">
                                                    <img class="img_main"
                                                        onerror="this.src='{{ asset('adminbuild/images/noimage.png') }}'"
                                                        src="{{ asset('upload/sanpham/' . $orderDetail->hinh_anh) }}"
                                                        width="100" height="100" alt="{{ $orderDetail->ten_san_pham }}">
                                                </th>
                                                <th>{{ $orderDetail->ten_san_pham }}</th>
                                                <th>{{ $orderInfo->hinh_thuc_thanh_toan }}</th>
                                                <th class="text-center">{{ $orderDetail->ten_kich_thuoc }}</th>
                                                <th class="text-center">{{ $orderDetail->ten_mau_sac }}</th>
                                                <th class="text-center">{{ $orderDetail->so_luong }}</th>
                                                <th class="txt_green text-center">
                                                    @if($orderDetail->gia_moi)
                                                        <p class="m-0" style="color:#ec2d3f;">@convert($orderDetail->gia_moi)</p>
                                                        <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                            @convert($orderDetail->gia_ban)
                                                        </p>
                                                    @else
                                                        <p class="m-0" style="color:#ec2d3f;">@convert($orderDetail->gia_ban)</p>
                                                    @endif
                                                </th>
                                                <th class="text-center">
                                                    @if($orderDetail->gia_moi)
                                                        <p class="m-0" style="color:#ec2d3f;">
                                                            @convert($orderDetail->gia_moi * $orderDetail->so_luong)
                                                        </p>
                                                        <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                            @convert($orderDetail->gia_ban * $orderDetail->so_luong)
                                                        </p>
                                                    @else
                                                        <p class="m-0" style="color:#ec2d3f;">
                                                            @convert($orderDetail->gia_ban * $orderDetail->so_luong)
                                                        </p>
                                                    @endif
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="box_total_order">
                                    <div class="item_Ship">
                                        <span style="font-weight:bold;">Tổng tiền:</span>
                                        <span style="color:#ec2d3f;font-weight:bold;">@convert($orderInfo->tong_gia)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
