@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ $update ? route('xulyCapNhatThuongHieu', ['id' => $update['id']]) : route('xulyThemThuongHieu') }}"
            method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
                @if ($update)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
                <a class="btn btn-danger gradient-buttons" href="{{ route('LayDsThuongHieu') }}">Thoát</a>
                @csrf
                @if ($update)
                    @method('PATCH')
                @endif
            </div>
            <div class="flex_form">
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="ten" id="ten"
                                    placeholder="Tên thương hiệu" value="{{ $update ? $update['ten'] : '' }}">
                                @if ($errors->get('ten'))
                                    <div class="alert-validate">
                                        <ul>
                                            @foreach ($errors->get('ten') as $key => $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="box_input">
                                <label for="title">Trạng thái</label>
                                <select class="form-select" aria-label="Default select example" name="tinh_trang">            
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
                                @if ($errors->get('tinh_trang'))
                                    <div class="alert-validate">
                                        <ul>
                                            @foreach ($errors->get('tinh_trang') as $key => $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right_form">
                    <div class="card">
                        <div class="card-header">Hình ảnh thương hiệu</div>
                        <div class="card-body">
                            <div class="box_img">
                                @if ($update)
                                    @if ($update['hinh_anh'])
                                        <img src="{{ asset('upload/thuonghieu/' . $update['hinh_anh']) }}" alt="">
                                    @else
                                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                @endif
                            </div>
                            <label for="photo" class="photo-label">Chọn hình ảnh....</label>
                            <input type="file" class="form-control btn-choose-file" name="hinh_anh" id="photo">
                            @if ($errors->get('hinh_anh'))
                                <div class="alert-validate">
                                    <ul>
                                        @foreach ($errors->get('hinh_anh') as $key => $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
