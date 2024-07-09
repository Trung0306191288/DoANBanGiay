<?php
use App\Http\Controllers\OrderController;
?>
@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_filter">
            <form class="flex_form_search add" action="{{ route('timkiemdonhang') }}" method="GET" enctype="multipart/form-data">
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
                <div class="wrapper">
                    <div class="flex2">
                        <p class="begin">0</p>
                        <div class="container1">
                            <div class="slider-track"></div>
                            <input type="range" min="0" max="100000000" value="0" name="giadau" id="slider-1" oninput="slideOne()">
                            <input type="hidden" id="giadau" name="giadau" value="{{ old('giadau', 0) }}">
                            <input type="range" min="0" max="100000000" value="100000000" id="slider-2" oninput="slideTwo()">
                            <input type="hidden" id="giacuoi" name="giacuoi" value="{{ old('giacuoi', 100000000) }}">
                        </div>
                        <p class="end">100000000</p>
                    </div>
                    <div class="values">
                        <span id="range1">{{ old('giadau', 0) }}</span>
                        <span> &dash; </span>
                        <span id="range2">{{ old('giacuoi', 100000000) }}</span>
                    </div>
                </div>  
                <input type="submit" class="btn btn-primary btn-sm" value="Tìm kiếm">
            </form>
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
                        <td>{{ $v->ho_ten }}</td>
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
