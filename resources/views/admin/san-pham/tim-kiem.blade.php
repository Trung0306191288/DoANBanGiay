@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadThemSanPham') }}">Thêm mới</a></div>
            <form action="{{ route('timkiemsanpham') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input_search">
                    <input type="text" name="name_search" id="name_search" placeholder="Nhập sản phẩm cần tìm" class="form-control">
                    <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
                </div>          
            </form>
            <a href="{{ route('LayDsSanPham') }}" class="btn_redirect"><ion-icon name="reload-circle-outline"></ion-icon></a>
        </div>
        <div class="alert_ajax"><span>Không có sản phẩm bạn đang cần tìm</span><span class="btn_reload_alert"><ion-icon name="close-outline"></ion-icon></span></div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 175px;" class="text-center">Hiển thị</th>
                    <th style="width: 175px;" class="text-center">Nổi bật</th>
                    <th style="width: 175px;" class="text-center">Hàng mới về</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td class="text-center"><img class="img_main" src="{{ asset('upload/sanpham/'.$v['hinh_anh']) }}" width="100" height="100" alt=""></td>
                        <td>{{ $v['ten'] }}</td>
                        <td class="text-center" style="width: 175px;">
                            <select class="form-select" aria-label="Default select example" name="status_product_ajax" id="status_product_ajax" data-id="{{ $v['id'] }}"> 
                                @if($v['tinh_trang'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                @elseif($v['tinh_trang'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Hiển thị</option>
                                    <option selected value="2">Không hiển thị</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center" style="width: 175px;">
                            <select class="form-select" aria-label="Default select example" name="status_product_ajax_1" id="status_product_ajax_1" data-id="{{ $v['id'] }}"> 
                                @if($v['noi_bat'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Nổi bật</option>
                                    <option value="2">Không nổi bật</option>
                                @elseif($v['noi_bat'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Nổi bật</option>
                                    <option selected value="2">Không nổi bật</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Nổi bật</option>
                                    <option value="2">Không nổi bật</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center" style="width: 175px;">
                            <select class="form-select" aria-label="Default select example" name="status_product_ajax_2" id="status_product_ajax_2" data-id="{{ $v['id'] }}"> 
                                @if($v['hang_moi_ve'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Hàng mới về</option>
                                    <option value="2">Không</option>
                                @elseif($v['hang_moi_ve'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Hàng mới về</option>
                                    <option selected value="2">Không</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hàng mới về</option>
                                    <option value="2">Không</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadCapNhatSanPham',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="san-pham"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                    
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection