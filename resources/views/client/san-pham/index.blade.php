@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span><?= $pageName ?></span>
            <div class="animate-border"></div>
        </div>
        <section class="product-page">
            <div class="wrap-content">
                @if($cap_2 == 1) 
                    <div class="flex_product">
                        <div class="left_product">
                            <div class="box_select">
                                <label for="cate_search_index">Danh mục cấp một</label>
                                <select class="form-select" id="cate_search_index" data-page="{{ $pageName }}">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($cate as $v)
                                        <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>   
                                    @endforeach
                                </select>    
                            </div>
                            <div class="box_select">
                                <label for="cate_search_index">Danh mục cấp hai</label>
                                <select class="form-select" id="cate_two_search_index" data-page="{{ $pageName }}">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($cate_two as $v)
                                        <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>   
                                    @endforeach
                                </select>    
                            </div>
                            <div class="box_select">
                                <label for="brand_search_index">Danh mục thương hiệu</label>
                                <select class="form-select" id="brand_search_index">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($brand as $v)
                                        <option value="{{ $v['id'] }}">{{ $v['ten'] }}</option>   
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
                            <div class="product-main w-clear">
                                @foreach ($products as $k => $v)
                                    <div class="product">
                                        <div class="box-product">
                                            <div class="pic-product">
                                                <a class="img-product scale-img hover_xam" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">
                                                    <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                                </a>
                                            </div>
                                            <div class="info-product">
                                                <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
                                                <p class="price-product">
                                                    @if ($v['gia_moi'])
                                                        <span class="price-new"><span>Giá: </span>@convert($v->gia_moi)</span>
                                                        <span class="price-old"><span>Giá: </span>@convert($v->gia_ban)</span>
                                                    @else 
                                                        <span class="price-new">
                                                            @if($v['gia_ban'])
                                                                <span>Giá:</span> @convert($v->gia_ban)
                                                            @else
                                                                <span>Giá:</span> Liên hệ
                                                            @endif
                                                        </span>
                                                    @endif
                                                </p>
                                            </div> 
                                        </div>    
                                    </div>
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
