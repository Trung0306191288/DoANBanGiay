@extends('admin.index')
@section('body')
    <div class="box_form">
        <form
            action="{{ $update != null ? route('xulyCapNhatSanPham', ['id' => $update['id']]) : route('xulyThemSanPham') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if ($update != null)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
            <div class="flex_form flex_form_product">
                <div class="right_form">
                    <div class="box_list_img">
                        <div class="card mb-3">
                            <div class="card-header">Danh mục Sản phẩm</div>
                            <div class="card-body">
                                <div class="box_list">
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục cấp một</label>
                                        <select class="form-select" name="cate_product"
                                            id="{{ $update != null ? 'cate_product_up' : 'cate_product_add' }}"
                                            aria-label="Default select example">
                                            <option selected value="">Chọn danh mục sản phẩm</option>
                                            @foreach ($categorys as $k => $v)
                                                @if ($update != null)
                                                    @if ($v['id'] == $update['id_cap_mot'])
                                                        <option selected value="{{ $v['id'] }}">{{ $v['ten'] }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('cate_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục cấp hai</label>
                                        <select class="form-select" name="cate_two_product" id="cate_two_product"
                                            aria-label="Default select example">
                                            <option selected value="">Chọn danh mục sản phẩm</option>
                                            @if ($update != null)
                                                @foreach ($categorys_2 as $k => $v)
                                                    @if ($update != null)
                                                        @if ($v['id'] == $update['id_cap_hai'])
                                                            <option selected value="{{ $v['id'] }}">
                                                                {{ $v['ten'] }}</option>
                                                        @else
                                                            <option value="{{ $v['id'] }}">{{ $v['ten'] }}
                                                            </option>
                                                        @endif
                                                    @else
                                                        <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('cate_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Thương hiệu</label>
                                        <select class="form-select" name="sup_product" aria-label="Default select example">
                                            <option selected value="">Chọn thương hiệu</option>
                                            @foreach ($brands as $k1 => $v1)
                                                @if ($update != null)
                                                    @if ($v1['id'] == $update['id_thuong_hieu'])
                                                        <option selected value="{{ $v1['id'] }}">{{ $v1['ten'] }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $v1['id'] }}">{{ $v1['ten'] }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $v1['id'] }}">{{ $v1['ten'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('sup_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Màu sắc</label>
                                        <ul class="select_multi">
                                            @if ($color_product != null)
                                                @foreach ($colors as $k2 => $v2)
                                                    @if (in_array($v2['id'], $color_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                                id="arr_color" type="checkbox" value="{{ $v2['id'] }}"
                                                                checked>
                                                            <label>{{ $v2['ten'] }}</label>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                                id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                            <label>{{ $v2['ten'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($colors as $k2 => $v2)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                            id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                        <label>{{ $v2['ten'] }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Kích thước</label>
                                        <ul class="select_multi">
                                            @if ($size_product != null)
                                                @foreach ($sizes as $k3 => $v3)
                                                    @if (in_array($v3['id'], $size_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                                id="arr_size" type="checkbox" value="{{ $v3['id'] }}"
                                                                checked>
                                                            <label>{{ $v3['ten'] }}</label>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                                id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
                                                            <label>{{ $v3['ten'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($sizes as $k3 => $v3)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                            id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
                                                        <label>{{ $v3['ten'] }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Hình ảnh sản phẩm</div>
                            <div class="card-body">
                                <div class="box_img">
                                    @if ($update != null)
                                        @if ($update['hinh_anh'] != null)
                                            <img width="385" height="385"
                                                src="{{ asset('upload/sanpham/' . $update['hinh_anh']) }}" alt="">
                                        @else
                                            <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                                    @endif
                                </div>
                                <label for="photo_product" class="photo-label">Chọn hình ảnh....</label>
                                <input type="file" class="form-control btn-choose-file" name="photo_product"
                                    id="photo_product" value="{{ $update != null ? $update['hinh_anh'] : '' }}">
                                @error('photo_product')
                                    <span class="message_red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin sản phẩm</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name_product" id="name_product"
                                    placeholder="Tên sản phẩm" value="{{ $update != null ? $update['ten'] : '' }}">
                                @error('name_product')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Mô tả</label>
                                <textarea type="text" class="form-control" name="desc_product" id="desc_product" placeholder="Mô tả">{{ $update != null ? $update['mo_ta'] : '' }}</textarea>
                            </div>
                            <div class="box_input add">
                                <label for="title">Nội dung</label>
                                <textarea type="text" class="form-control form_textarea" name="content_product" id="content_product"
                                    placeholder="Nội dung">{{ $update != null ? $update['noi_Dung'] : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Thuộc tính sản phẩm</div>
                        <div class="card-body">
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Hiển thị:</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_product">
                                        @if ($update != null)
                                            @if ($update['tinh_trang'] == 1)
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
                                <div class="item_check_status">
                                    <label for="noi_bat">Nổi bật:</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_product_hot">
                                        @if ($update != null)
                                            @if ($update['noi_bat'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Nổi bật</option>
                                                <option value="2">Không nổi bật</option>
                                            @elseif($update['noi_bat'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Nổi bật</option>
                                                <option selected value="2">Không nổi bật</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Nổi bật</option>
                                                <option value="2">Không nổi bật</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Nổi bật</option>
                                            <option value="2">Không nổi bật</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="item_check_status">
                                    <label for="noi_bat">Hàng mới về:</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_product_new">
                                        @if ($update != null)
                                            @if ($update['hang_moi_ve'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Hàng mới về</option>
                                                <option value="2">Không</option>
                                            @elseif($update['hang_moi_ve'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Hàng mới về</option>
                                                <option selected value="2">Không</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Hàng mới về</option>
                                                <option value="2">Không</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hàng mới về</option>
                                            <option value="2">Không</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="flex_price">
                                <div class="box_input edit">
                                    <label for="ma_san_pham">Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="code_product" id="code_product"
                                        placeholder="Mã sản phẩm" value="{{ $update != null ? $update['ma_san_pham'] : '' }}">
                                        @error('code_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="box_input">
                                    <label for="gia_moi">Giá mới</label>
                                    <input type="text" class="form-control" name="price_sale_product"
                                        id="price_sale_product" placeholder="Giá mới"
                                        value="{{ $update != null ? $update['gia_moi'] : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="gia_ban">Giá bán</label>
                                    <input type="text" class="form-control" name="price_regular_product"
                                        id="price_regular_product" placeholder="Giá bán"
                                        value="{{ $update != null ? $update['gia_ban'] : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Gallery sản phẩm</div>
                        <div class="card-body">
                            <div class="box_photo_gallery">
                                @if ($update != null)
                                    @if ($photo_gallery != null)
                                        @foreach ($photo_gallery as $k => $v)
                                            <div class="img_gallery">
                                                <img src="{{ asset('upload/sanpham/gallery/' . $v['hinh_anh']) }}" alt="">
                                                <div class="btn_dlt_gallery" data-id="{{ $v['id'] }}">
                                                    xóa ảnh <ion-icon name="trash-outline"></ion-icon>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="btn_input_file">
                                <label for="photo_gallery[]" class="photo-label">Chọn hình ảnh....</label>
                                <input type="file" class="form-control btn-choose-file" name="photo_gallery[]"
                                    id="photo_gallery[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom_form">
                    <div class="card">
                        <div class="card-header">Giá theo thuộc tính kích thước - màu sắc</div>
                        <div class="card-body">
                            <div class="box_table_advanted">
                                <table class="table table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Kích thước</th>
                                            <th scope="col">Màu sắc</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Giá mới</th>
                                            <th scope="col">Kho hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @if ($list_advanted != null)
                                            @foreach ($list_advanted as $k4 => $v4)
                                                <tr>
                                                    <td><input type="hidden" name="id_adv[]"
                                                            value="{{ $v4['id'] }}"></td>
                                                    <td>{{ $v4['ten'] }}</td>
                                                    <td>{{ $v4['ten_mau'] }}</td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="price_regular_adv[]" id="price_regular_adv"
                                                            value="{{ $v4['gia_ban'] != null ? $v4['gia_ban'] : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="price_sale_adv[]" id="price_sale_adv"
                                                            value="{{ $v4['gia_moi'] != null ? $v4['gia_moi'] : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="inventory[]"
                                                            id="inventory"
                                                            value="{{ $v4['kho_hang'] != null ? $v4['kho_hang'] : '' }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
