@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span><?= $pageName ?></span>
            <div class="animate-border"></div>
        </div>
        <div class="product-page">
            <div class="wrap-content">
                @if ($search != false)
                    <div class="product__list flex-list">
                        @foreach ($search as $v)
                            <div class="product-paging">
                                <div class="box-product">
                                    <div class="pic-product">
                                        <a class="img-product scale-img hover_xam" href="{{ route('productDetailPage',['id'=>$v->id]) }}" title="{{ $v['ten'] }}">
                                            <img src="{{ asset('upload/sanpham/' . $v['hinh_anh']) }}" alt="{{ $v['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-product">
                                        <h3 class="mb-0"><a class="text-decoration-none text-split split2 name-product" href="{{ route('productDetailPage',['id'=>$v->id]) }}"" title="{{ $v['ten'] }}">{{ $v['ten'] }}</a></h3>
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
            </div>
        </div>
    </div>
@endsection
