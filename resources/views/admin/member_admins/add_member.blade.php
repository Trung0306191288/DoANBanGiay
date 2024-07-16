@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdatemember_admins',['id' => $update['id']]) : route('handleaddmember_admins') }}" method="POST" enctype="multipart/form-data">
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
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên thành viên</label>
                                <input type="text" class="form-control" name="ho_ten" id="ho_ten" placeholder="Tên thành viên" value="{{ ($update != NULL) ? $update['ho_ten']: ''}}">
                                @error('ho_ten')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{ ($update != NULL) ? $update['username']: ''}}">
                                @error('username')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input {{ ($update != NULL) ? 'd-none':''; }}">
                                <label for="title">Mật khẩu</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Mật khẩu" value="">
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item_box_list d-none">
                                <label for="supplier">Loại tài khoản</label>
                                <select class="form-select" name="cate_member" aria-label="Default select example">
                                    <option selected value="1">Chọn loại sản phẩm</option>
                                </select>
                            </div>
                            <div class="box_input">
                                <label for="title">Địa chỉ</label>
                                <input type="text" class="form-control" name="dia_chi" id="dia_chi" placeholder="Địa chỉ" value="{{ ($update != NULL) ? $update['dia_chi']: ''}}">
                                @error('dia_chi')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Số điện thoại</label>
                                <input type="number" class="form-control" name="dien_thoai" id="dien_thoai" placeholder="Số điện thoại" value="{{ ($update != NULL) ? $update['dien_thoai']: ''}}">
                                @error('dien_thoai')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ ($update != NULL) ? $update['email']: ''}}">
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>         
                            <div class="box_input">
                                <label for="title">Ngày sinh</label>
                                <input type="date" class="form-control" name="nam_sinh" id="nam_sinh" placeholder="Ngày sinh" value="{{ ($update != NULL) ? $update['nam_sinh']: ''}}">
                                @error('nam_sinh')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>            
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="status_member">            
                                        @if($update != NULL) 
                                            @if($update['tinh_trang'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @elseif($update['tinh_trang'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option selected value="2">Không hoạt động</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>                                    
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
                            <div class="card-header">Hình ảnh</div>
                            <div class="card-body">
                                <div class="box_img">         
                                    @if($update != NULL)
                                        @if($update['hinh_anh'] != NULL)
                                            <img src="{{ asset('upload/member_admins/'.$update['hinh_anh']) }}" alt="">
                                        @else
                                            <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                    @endif
                                </div>
                            <label for="photo_member" class="photo-label">Chọn hình ảnh....</label>
                            <input type="file" class="form-control btn-choose-file" name="photo_member" id="photo_member" value="{{ ($update != NULL) ? $update['hinh_anh']: ''}}">
                                @error('photo_member')
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
