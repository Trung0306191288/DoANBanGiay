@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadThemLoaiHinhAnh',['loai' => $loai_man, 'cate' => 'man']) }}">Thêm mới</a></div>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th class="text-center">Tên hình ảnh</th>
                    <th class="text-center">Link</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if (count($photo))
                    @foreach($photo as $k => $v) 
                        <tr>
                            <td class="text-center">
                                <input class="sty_checkbox form-check-input" type="checkbox">
                            </td>
                            <td class="text-center">{{ ($k + 1) }}</td>
                            <td class="text-center">
                                <a href="{{ route('loadCapNhatLoaiHinhAnh',['id' => $v['id'],'loai' => $loai_man, 'cate' => 'man']) }}">
                                    @if($v['hinh_anh'] != NULL) 
                                        <img class="img_main" src="{{ asset('upload/loaihinhanh/'.$v['hinh_anh']) }}" width="100" height="100" alt="">
                                    @else
                                        <img class="img_main" src="{{ asset('adminbuild/images/noimage.png') }}" width="100" height="100" alt="">
                                    @endif 
                                </a>
                            </td>
                            <td class="text-center">{{ $v['ten'] }}</td>
                            <td class="text-center">{{ $v['link'] }}</td>
                            <td class="text-center">
                                <div class="flex_options">
                                    <a href="{{ route('loadCapNhatLoaiHinhAnh',['id' => $v['id'],'loai' => $loai_man, 'cate' => 'man']) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                    <a href="{{ route('xoaLoaiHinhAnh',['id' => $v['id'],'loai' => $loai_man, 'cate' => 'man']) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                </div>
                            </td>
                        </tr>    
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