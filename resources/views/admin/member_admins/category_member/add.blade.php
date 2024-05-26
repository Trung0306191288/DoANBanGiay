@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdatecate_member',['id' => $update['id']]) : route('handleaddcate_member') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
            <div class="flex_form">
                <div class="left_form full_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên danh mục</label>
                                <input type="text" class="form-control" name="ten_vai_tro" id="ten_vai_tro" placeholder="Tên danh mục" value="{{ ($update != NULL) ? $update['ten_vai_tro']: ''}}">
                                @error('ten_vai_tro')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>          
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="tinh_trang_cate_menber">            
                                        @if($update != NULL) 
                                            @if($update['tinh_trang'] == 1)
                                                <option value="3">Chọn trạng thái</option>
                                                <option selected value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @elseif($update['tinh_trang'] == 2)
                                                <option value="3">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option selected value="2">Không hoạt động</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @endif
                                        @else
                                            <option selected value="3">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>                                    
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </form>
    </div>
@endsection
