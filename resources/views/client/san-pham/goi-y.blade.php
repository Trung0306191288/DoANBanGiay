@if($search->isNotEmpty())
    <div class="ul-sugges-search">
        @foreach($search as $val)
            <div class="item-search">
                <a href="{{ route('productDetailPage',['id'=>$val->id]) }}" style="color: #000;" data-ten="{{ $val->ten }}" class="sugges-search-a d-flex justify-content-left align-items-start">
                    <div class="img_product_search">
                        <img src="{{ asset('upload/sanpham/' . $val['hinh_anh']) }}" alt="{{ $val['ten'] }}">
                    </div>
                    <div class="content">
                        <div class="tieude text-split split1">{{ $val->ten }}</div>
                        @if ($val['gia_moi'])
                            <div class="giaban">@convert($val->gia_moi)</div>
                            <div class="giacu">@convert($val->gia_ban)</div>
                        @else 
                            @if($val['gia_ban'])
                                <div class="giaban">@convert($val->gia_ban)</div>
                            @else
                                <span>Giá:</span> Liên hệ
                            @endif
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
