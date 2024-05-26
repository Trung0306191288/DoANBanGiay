@extends('admin.index')
@section('body')
    
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th>Tên thành viên</th>
                    <th class="text-center">Quyền</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member_client as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td class="text-center">
                            <a href="{{ route('loadupdatemember_client',['id' => $v['id']]) }}">
                                @if($v['hinh_anh'] != NULL) 
                                    <img class="img_main" src="{{ asset('upload/member_admins/'.$v['hinh_anh']) }}" width="100" height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminbuild/images/noimage.png') }}" width="100" height="100" alt="">
                                @endif 
                            </a>
                        </td>
                        <td>{{ $v['ho_ten'] }}</td>
                        <td class="text-center txt_green">{{ ($v['vai_tro'] == 1)? 'admin':'thành viên' }}</td>
                        <td class="text-center" style="width: 200px;">
                            <select class="form-select" aria-label="Default select example" name="status_member" id="status_member" data-id="{{ $v['id'] }}">            
                                @if($v['tinh_trang'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @elseif($v['tinh_trang'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option selected value="2">Không hoạt động</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdatemember_client',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="member_client"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection