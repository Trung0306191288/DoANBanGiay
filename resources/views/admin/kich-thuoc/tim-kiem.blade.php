@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadThemKichThuoc') }}">Thêm mới</a></div>
            <form action="{{ route('timkiemkichthuoc') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input_search">
                    <input type="text" name="name_search" id="name_search" placeholder="Nhập kích thước cần tìm" class="form-control">
                    <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
                </div>          
            </form>
            <a href="{{ route('LayDsKichThuoc') }}" class="btn_redirect"><ion-icon name="reload-circle-outline"></ion-icon></a>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                <th style="width: 50px;" ></th>
                <th style="width: 75px;" class="text-center">STT</th>
                <th>Kích thước</th>
                <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td>{{ $v['ten'] }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadCapNhatKichThuoc',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="kich-thuoc"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection