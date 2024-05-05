@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($convert_photo != NULL) ? route('xulyCapNhatLoaiHinhAnh',['id' => $convert_photo['id'],'loai' => $loai_man, 'cate' => 'static']) : route('xulyThemLoaiHinhAnh',['loai' => $loai_man, 'cate' => 'static']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($convert_photo != NULL)
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
                                <div class="box_photo_man mb-3">
                                    @if($convert_photo != NULL)
                                        <div class="box_delete">
                                            <a href="{{ route('xoaLoaiHinhAnh',['id' => $convert_photo['id'],'loai' => $loai_man, 'cate' => 'static']) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                        </div>
                                    @endif
                                    <div class="box_img">         
                                        @if($convert_photo != NULL)
                                            @if($convert_photo['hinh_anh'] != NULL)
                                                <img src="{{ asset('upload/loaihinhanh/'.$convert_photo['hinh_anh']) }}" alt="">
                                            @else
                                                <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                            @endif
                                        @else
                                            <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                        @endif
                                    </div>
                                    <label for="photo_man" class="photo-label">Chọn hình ảnh....</label>
                                    <input type="file" class="form-control btn-choose-file" name="photo_man" id="photo_man" value="{{ ($convert_photo != NULL) ? $convert_photo['hinh_anh']: ''}}">
                                    @error('photo_man')
                                        <span class="message_red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="box_input">
                                    <label for="title">Tên hình ảnh</label>
                                    <input type="text" class="form-control" name="photo_name" id="photo_name" placeholder="Tên hình ảnh" value="{{ ($convert_photo != NULL) ? $convert_photo['ten']: ''}}">
                                </div>
                                <div class="box_input">
                                    <label for="title">Link</label>
                                    <input type="text" class="form-control" name="photo_link" id="photo_link" placeholder="Link" value="{{ ($convert_photo != NULL) ? $convert_photo['link']: ''}}">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection