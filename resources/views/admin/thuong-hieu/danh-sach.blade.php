@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadThemThuongHieu') }}">Thêm mới</a></div>
            <form action="{{ route('timkiemthuonghieu') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input_search">
                    <input type="text" name="name_search" id="name_search" placeholder="Nhập thương hiệu cần tìm" class="form-control">
                    <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
                </div>          
            </form>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th>Hình Ảnh</th>
                    <th>Tên thương hiệu</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if (count($brands))
                    @foreach ($brands as $k => $v)
                        <tr>
                            <td class="text-center">
                                <input class="sty_checkbox form-check-input" type="checkbox">
                            </td>
                            <td class="text-center">{{ $k + 1 }}</td>
                            <td>
                                <a href="{{ route('loadCapNhatThuongHieu', ['id' => $v['id']]) }}">
                                    @if($v['hinh_anh'] != NULL) 
                                        <img class="img_main" src="{{ asset('upload/thuonghieu/'.$v['hinh_anh']) }}" width="100" height="100" alt="">
                                    @else
                                        <img class="img_main" src="{{ asset('adminbuild/images/noimage.png') }}" width="100" height="100" alt="">
                                    @endif 
                                </a>
                            </td>
                            <td>{{ $v['ten'] }}</td>
                            <td class="text-center" style="width: 200px;">
                                <select class="form-select" aria-label="Default select example" name="status_brand_ajax" id="status_brand_ajax" data-id="{{ $v['id'] }}"> 
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
                            <td class="text-center">
                                <div class="flex_options">
                                    <a href="{{ route('loadCapNhatThuongHieu', ['id' => $v['id']]) }}">
                                        <span>
                                            <ion-icon name="create-outline"></ion-icon>
                                        </span>
                                    </a>
                                    <a class="delete_main" data-id="{{ $v['id'] }}" data-type="thuong-hieu"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                </div>
                            </td>
                        <tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
