@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="main__title">
            <h2><?= $pageName ?></h2>
        </div>
        <section class="product">
            <div class="wrap-content">
                @if($cap_2 == 1) 
                <div class="flex_product">
                    <div class="left_product">
                        <div class="box_select">
                            <label for="cate_search_index">Danh mục cấp 1</label>
                            <select class="form-select" id="cate_search_index" data-page="{{ $pageName }}">
                                <option value="0">Chọn danh mục</option>
                                @foreach ($cate as $v)
                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>   
                                @endforeach
                            </select>    
                        </div>
                        <div class="box_select">
                            <label for="cate_search_index">Danh mục cấp 2</label>
                            <select class="form-select" id="cate_two_search_index" data-page="{{ $pageName }}">
                                <option value="0">Chọn danh mục</option>
                                @foreach ($cate_two as $v)
                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>   
                                @endforeach
                            </select>    
                        </div>
                        <div class="box_select">
                            <label for="brand_search_index">Danh mục hãng</label>
                            <select class="form-select" id="brand_search_index">
                                <option value="0">Chọn danh mục</option>
                                @foreach ($brand as $v)
                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>   
                                @endforeach
                            </select>
                        </div>
                        <div class="box_select">
                            <label for="price_search_index">Giá trị sản phẩm</label>
                            <select class="form-select" id="price_search_index">
                                <option value="0">Chọn giá trị</option>
                                <option value="1">0đ - @convert('1000000')</option>
                                <option value="2">@convert('1000000') - @convert('10000000')</option>
                                <option value="3">@convert('10000000') - @convert('15000000')</option>
                                <option value="4">@convert('15000000') - @convert('20000000')</option>
                                <option value="5">@convert('20000000') - @convert('25000000')</option>
                                <option value="6">trên @convert('25000000')</option>
                            </select>
                        </div>
                    </div>
                    <div class="right_product">
                @endif
                        @if ($products != false)
                            <div class="product__list flex-list">
                                @foreach ($products as $product)
                                    @include('client.layouts.components.ProductItem')  
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-warning w-100" role="alert">
                                <strong>Không tìm thấy kết quả</strong>
                            </div>
                        @endif
                    @if($cap_2 == 1) 
                    </div>
                    @endif
                </div>
                
            </div>
        </section>
    </div>
@endsection
