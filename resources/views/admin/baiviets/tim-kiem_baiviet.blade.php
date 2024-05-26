@extends('admin.index')
@section('body')
<div class="box_btn_search">
    <div class="flex_btn_search">
        <div class="btn_add"><a href="{{ route('LoadAddBaiviets',['type' => $type_page]) }}">Thêm mới</a></div>
        <div class="btn_delete_all">Xóa tất cả</div>
        <form action="{{ route('searchBaiviets',['type' => $type_page]) }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="input_search">
                <input type="text" name="name_search" id="name_search" placeholder="Nhập bài viết cần tìm" class="form-control">
                <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
            </div>
        </form>
        <a href="{{ route('bai_viets',['type' => $type_page]) }}" class="btn_redirect"><ion-icon name="reload-circle-outline"></ion-icon></a>
    </div>
</div>
<div class="box_table_list_product">
    <table class="table table_list_product align-middle">
        <thead>
            <tr class="sty_head_table">
            <th></th>
            <th class="text-center">STT</th>
            <th>Hình Ảnh</th>
            <th>Tiêu đề</th>
            <th class="text-center">Trạng thái</th>
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
                    <td>
                        <a href="{{ route('loadUpdateBaiviets', ['id' => $v['id'],'type' => $type_page]) }}">
                            @if($v['hinh_anh'] != NULL) 
                                <img class="img_main" src="{{ asset('upload/baiviets/'.$v['hinh_anh']) }}" width="100" height="100" alt="">
                            @else
                                <img class="img_main" src="{{ asset('adminbuild/images/noimage.png') }}" width="100" height="100" alt="">
                            @endif  
                        </a>
                    </td>
                    <td>{{ $v['name'] }}</td>
                    <td class="text-center" style="width: 200px;">
                        <select class="form-select" aria-label="Default select example" name="status_baiviet_ajax_1" id="status_baiviet_ajax_1" data-id="{{ $v['id'] }}"> 
                            @if($v['trang_thai'] == 1)
                                <option value="0">Chọn trạng thái</option>
                                <option selected value="1">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                            @elseif($v['trang_thai'] == 2)
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
                            <a href="{{ route('loadUpdateBaiviets',['id' => $v['id'],'type' => $type_page]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                            <a class="delete_main" data-id="{{ $v['id'] }}" data-type="baiviets" data-type_baiviets="{{ $type_page }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection