@extends('admin.index')
@section('body')
<div class="box_btn_search">
    <div class="flex_btn_search">
        <div class="btn_add"><a href="{{ route('loadThemMauSac') }}">Thêm mới</a></div>
        <form action="{{ route('timkiemmausac') }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="input_search">
                <input type="text" name="name_search" id="name_search" placeholder="Nhập màu sắc cần tìm" class="form-control">
                <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
            </div>          
        </form>
    </div>
</div>
<div class="box_table_list_product">
    <table class="table table_list_product align-middle">
        <thead>
            <tr class="sty_head_table">
            <th></th>
            <th class="text-center">STT</th>
            <th>Màu</th>
            <th>Tên màu</th>
            <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if (count($colors))
                @foreach($colors as $k => $v)
                    <tr>
                        <th class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </th>
                        <th class="text-center">{{ ($k + 1) }}</th>
                        <td><div class="board_color" style="background: {{ $v['code_mau'] }};"></div></td>
                        <td>{{ $v['ten'] }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadCapNhatMauSac', ['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a href="{{ route('xoaMauSac', ['id' => $v['id']]) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="100" class="text-center">Không có dữ liệu</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection