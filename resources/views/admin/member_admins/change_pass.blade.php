@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ route('xu_ly_doi_mat_khau_admin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
            </div>
            <div class="flex_form">
                <div class="left_form full_form">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="flex_change_pass">
                                <div class="box_input">
                                    <label for="title">Mật khẩu mới</label>
                                    <input type="text" class="form-control" name="password_new" id="password_new" placeholder="Mật khẩu mới" value="">
                                    @error('password_new')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="box_input">
                                    <label for="title">Nhập lại mật khẩu</label>
                                    <input type="text" class="form-control" name="comfirm_password" id="comfirm_password" placeholder="Nhập lại mật khẩu" value="">
                                    @error('comfirm_password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>       
                            </div> 
                        </div>
                    </div>    
                </div>
            </div>
        </form>
    </div>
@endsection
