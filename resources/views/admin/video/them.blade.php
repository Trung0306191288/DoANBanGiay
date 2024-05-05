@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($convert_photo != NULL) ? route('xulyCapNhatLoaiHinhAnh',['id' => $convert_photo['id'],'loai' => $loai_man, 'cate' => 'video']) : route('xulyThemLoaiHinhAnh',['loai' => $loai_man, 'cate' => 'video']) }}" method="POST" enctype="multipart/form-data">
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
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-body">
                                        <div class="show-video">
                                            @if($convert_photo != NULL)
                                                <video controls autoplay>
                                                    <source src="{{ asset('upload/file/'.$convert_photo['file']) }}" type="video/mp4">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                            @endif
                                          
                                           
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="upload-file">
                                                <label for="video_man" class="photo-label">Upload Video</label>
                                                <label class="upload-file-label mb-0 max-width-full" for="video_man">
                                                    <div class="custom-file my-custom-file ">
                                                        <input type="file" class="form-control btn-choose-file" name="video_man" id="video_man" value="{{ ($convert_photo != NULL) ? $convert_photo['file']: ''}}">
                                                        <label class="custom-file-label mb-0" data-browse="Chọn" for="video">Video mp4</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection