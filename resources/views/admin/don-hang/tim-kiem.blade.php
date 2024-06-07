<?php
use App\Http\Controllers\OrderController;
?>
@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_filter">
            <form class="flex_form_search" action="{{ route('timkiemdonhang') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="box_select">
                    <label for="select_status_order">Trạng thái đơn hàng</label>
                    <select class="form-select" aria-label="Default select example" name="select_status_order">
                        <option value="">Chọn trạng thái</option>
                        <option value="Chờ xác nhận">Chờ xác nhận</option>
                        <option value="Đã xác nhận">Đã xác nhận</option>
                        <option value="Chờ vận chuyển">Chờ vận chuyển</option>
                        <option value="Đã vận chuyển">Đã vận chuyển</option>
                        <option value="Đã giao">Đã giao</option>
                        <option value="Đã hủy">Đã hủy</option>
                    </select>   
                </div>
                <div class="box_select">
                    <label for="select_status_order">Trạng thái thanh toán</label>
                    <select class="form-select" aria-label="Default select example" name="select_status_payments">
                        <option value="">Chọn trạng thái</option>
                        <option value="Đã thanh toán">Đã thanh toán</option>
                        <option value="Chưa thanh toán">Chưa thanh toán</option>
                    </select>
                </div>
                <div class="box_range">
                    <label for="select_status_order">Giá trị đơn hàng</label>
                    <div class="btn_change_range">
                        <input type="range" class="form-range range_test" min="1" max="5" name="price_search">
                        <span class="range_number range_number_1">1</span>
                        <span class="range_number range_number_2">2</span>
                        <span class="range_number range_number_3">3</span>
                        <span class="range_number range_number_4">4</span>
                        <span class="range_number range_number_5">5</span>
                        <span class="hidden_range active_hidden"></span>
                    </div>
                </div>  
                <input type="submit" class="btn btn-primary btn-sm" value="Tìm kiếm">
            </form>
            <div class="note_filter">
                <p><span>Bật 1:</span> nhỏ hơn 1tr</p>
                <p><span>Bật 2:</span> nhỏ hơn 10tr</p>
                <p><span>Bật 3:</span> nhỏ hơn 50tr</p>
                <p><span>Bật 4:</span> nhỏ hơn 100tr</p>
                <p><span>Bật 5:</span> nhỏ hơn 200tr</p>
            </div>
        </div>
        <div class="alert_ajax act"><span>{{ $name_search }}</span><span class="btn_reload_alert"><ion-icon name="close-outline"></ion-icon></span></div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th style="width: 75px;"></th>
                    <th style="width: 30px;" class="text-center">STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th style="width: 230px;">Hình thức thanh toán</th>
                    <th style="width: 175px;" class="text-center">Trạng thái đơn hàng</th>
                    <th style="width: 175px;" class="text-center">Thanh toán</th>
                    <th style="width: 100px;" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="load_search">
                @foreach ($search as $k => $v)
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td style="width: 30px;" class="text-center">{{ $k + 1 }}</td>
                        <td>
                            <a href="{{ route('loaddonhang', ['id' => $v['id']]) }}">{{ $v->ma_don_hang }}</a>
                        </td>
                        <td>{{ $v->ten }}</td>
                        <td style="color:#ec2d3f;font-weight:bold;">@convert($v->tong_gia)</td>
                        <td> {{ $v->hinh_thuc_thanh_toan  }}</td>
                        <td class="text-center" style="width: 175px;">{{ $v->tinh_trang_don_hang }}</td>
                        <td class="text-center" style="width: 175px;">{{ $v->tinh_trang_hinh_thuc }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loaddonhang', ['id' => $v['id']]) }}"><span>
                                    <ion-icon name="create-outline"></ion-icon>
                                </span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="don-hang"><span>
                                    <ion-icon name="trash-outline"></ion-icon>
                                </span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
