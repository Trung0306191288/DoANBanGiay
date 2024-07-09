@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($setting != null) ? route('xulyCapNhatCauHinhChung', ['id' => $setting->id]) : route('xulyThemCauHinhChung') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($setting != null)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
            <div class="flex_form">
                <div class="left_form full_form">
                    <div class="box_list_img">
                        <div class="card">
                            <div class="card-header">Thông tin chung</div>
                            <div class="card-body">
                                <div class="box_input">
                                    <label for="setting_phone">Điện thoại</label>
                                    <input type="text" class="form-control" name="setting_phone" id="setting_phone" placeholder="Điện thoại" value="{{ $setting != null ? $setting->dien_thoai : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_hotline">Hotline</label>
                                    <input type="text" class="form-control" name="setting_hotline" id="setting_hotline" placeholder="Hotline" value="{{ $setting != null ? $setting->hotline : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_zalo">Zalo</label>
                                    <input type="text" class="form-control" name="setting_zalo" id="setting_zalo" placeholder="Zalo" value="{{ $setting != null ? $setting->zalo : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_copyright">Copyright</label>
                                    <input type="text" class="form-control" name="setting_copyright" id="setting_copyright" placeholder="Copyright" value="{{ $setting != null ? $setting->copyright : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_email">Email</label>
                                    <input type="text" class="form-control" name="setting_email" id="setting_email" placeholder="Email" value="{{ $setting != null ? $setting->email : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_fanpage">Fanpage</label>
                                    <input type="text" class="form-control" name="setting_fanpage" id="setting_fanpage" placeholder="Fanpage" value="{{ $setting != null ? $setting->fanpage : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_dia_chi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="setting_dia_chi" id="setting_dia_chi" placeholder="Địa chỉ" value="{{ $setting != null ? $setting->dia_chi : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_khoang_gia">Khoảng giá</label>
                                    <input type="text" class="form-control" name="setting_khoang_gia" id="setting_khoang_gia" placeholder="Khoảng giá" value="{{ $setting != null ? $setting->khoang_gia : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_khoang_gia_admin">Khoảng giá admin</label>
                                    <input type="text" class="form-control" name="setting_khoang_gia_admin" id="setting_khoang_gia_admin" placeholder="Khoảng giá admin" value="{{ $setting != null ? $setting->khoang_gia_admin : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="setting_link_map">
                                        <span class="edit">Tọa độ google map iframe:</span>
                                        <a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank" title="Lấy mã nhúng google map">(Lấy mã nhúng google map)</a>
                                    </label>
                                    <textarea class="form-control text-sm" name="setting_link_map" id="setting_link_map" rows="5" placeholder="Tọa độ google map iframe">{{ $setting != null ? $setting->link_map : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
