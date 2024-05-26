@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddcate_member') }}">Thêm mới</a></div>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th>Tên danh mục</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cate_member as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td>{{ $v['ten_vai_tro'] }}</td>
                        <td class="text-center" style="width: 200px;">
                            <select class="form-select" aria-label="Default select example" name="status_ajax_cate_member" id="status_ajax_cate_member" data-id="{{ $v['id'] }}">            
                                @if($v['tinh_trang'] == 1)
                                    <option value="3">Chọn trạng thái</option>
                                    <option selected value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @elseif($v['tinh_trang'] == 2)
                                    <option value="3">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option selected value="2">Không hoạt động</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdatecate_member',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="cate_members"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                               
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection