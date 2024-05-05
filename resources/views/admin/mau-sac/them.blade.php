@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('xulyCapNhatMauSac',['id' => $update['id']]) : route('xulyThemMauSac') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="submit" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
        <div class="flex_form_color">
            <div class="card">
                <div class="card-header">Thông tin chung</div>
                <div class="card-body">
                    <div class="box_input">
                        <label for="title">Lựa chọn mã màu</label>
                        <input type="color" class="form-control sty_code_color" name="ten_ma" id="ten_ma" value="{{ ($update != NULL) ? $update['code_mau'] : '' }}">
                        @error('ten_ma')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="box_input">
                        <label for="title">Tên màu sắc</label>
                        <input type="text" class="form-control" name="ten_mau_sac" id="ten_mau_sac" placeholder="Tên màu sắc" value="{{ ($update != NULL) ? $update['ten'] : '' }}">
                        @error('ten_mau_sac')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>   
        </div>
    </form>
</div>
@endsection