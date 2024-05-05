@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('xulyCapNhatDanhMucCapHai',['id' => $update['id']]) : route('xulyThemDanhMucCapHai') }}" method="POST" enctype="multipart/form-data">
        <div class="box_btn_main">
            @if ($update)
                <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
            @else
                <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
            @endif
            <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            <a class="btn btn-danger gradient-buttons" href="{{ route('LayDsDanhMucCapHai') }}">Thoát</a>
            @csrf
            @if ($update)
                @method('PATCH')
            @endif
        </div>
        <div class="flex_form">
            <div class="left_form">
                <div class="card">
                    <div class="card-header">Thông tin chung</div>
                    <div class="card-body">
                        <div class="item_box_list">
                            <label for="cate_two">Danh mục cấp một</label>
                            <select class="form-select" name="cap_mot_san_pham" aria-label="Default select example">
                                <option selected value="" >Chọn danh mục cấp một</option>
                                @foreach ($cap_mot as $k1 => $v1)
                                    @if ($update != NULL)
                                        @if ($v1['id'] == $update['id_cap_mot']) 
                                            <option selected value="{{ $v1['id'] }}">{{ $v1['ten'] }}</option>
                                        @else
                                            <option value="{{ $v1['id'] }}">{{ $v1['ten'] }}</option>    
                                        @endif        
                                    @else       
                                        <option value="{{ $v1['id'] }}">{{ $v1['ten'] }}</option>    
                                    @endif      
                                @endforeach
                            </select>
                            @error('cap_mot_san_pham')
                                <span class="message_red">{{ $message }}</span>
                            @enderror
                            </div>
                        <div class="box_input">
                            <label for="title">Tên danh mục</label>
                            <input type="text" class="form-control" name="ten_cap_hai" id="ten_cap_hai" placeholder="Tên danh mục" value="{{ ($update != NULL) ? $update['ten'] : '' }}">
                            @error('ten_cap_hai')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="box_check_status">
                            <div class="item_check_status">
                                <label for="tinh_trang">Trạng thái:</label>
                                <select class="form-select" aria-label="Default select example" name="tinh_trang_cap_hai">            
                                    @if($update != NULL) 
                                        @if($update['tinh_trang'] == 1)
                                            <option value="0">Chọn trạng thái</option>
                                            <option selected value="1">Hiển thị</option>
                                            <option value="2">Không hiển thị</option>
                                        @elseif($update['tinh_trang'] == 2)
                                            <option value="0">Chọn trạng thái</option>
                                            <option value="1">Hiển thị</option>
                                            <option selected value="2">Không hiển thị</option>
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="2">Không hiển thị</option>
                                        @endif
                                    @else
                                        <option selected value="0">Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Không hiển thị</option>                                    
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="right_form">
                <div class="box_list_img">
                    <div class="card">
                        <div class="card-header">Hình ảnh danh mục</div>
                        <div class="card-body">
                            <div class="box_img">         
                                @if($update != NULL)
                                    @if($update['hinh_anh'] != NULL)
                                        <img src="{{ asset('upload/danhmuccaphai/'.$update['hinh_anh']) }}" alt="">
                                    @else
                                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />   
                                @endif
                            </div>
                            <label for="hinh_anh_cap_hai" class="photo-label">Chọn hình ảnh....</label>
                            <input type="file" class="form-control btn-choose-file" name="hinh_anh_cap_hai" id="hinh_anh_cap_hai">
                            @error('hinh_anh_cap_hai')
                                <span class="message_red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection