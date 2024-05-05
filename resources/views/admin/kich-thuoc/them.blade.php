@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('xulyCapNhatKichThuoc',['id' => $update['id']]) : route('xulyThemKichThuoc') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title">Tên kích thước</label>
                            <input type="text" class="form-control" name="ten_kich_thuoc" id="ten_kich_thuoc" placeholder="Tên kích thước" value="{{ ($update != NULL) ? $update['ten'] : '' }}">
                            @error('ten_kich_thuoc')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>   
            </div>
        </form>
    </div>
@endsection