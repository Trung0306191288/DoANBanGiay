<div class="news-page">
    <div class="box-news">
        <div class="pic-news add">
            <a class="img-news scale-img hover_xam" href="{{ route('newsDetailPage',$item->id) }}" title="{{ $item['ten'] }}" >
                <img src="{{ asset('upload/baiviets/' . $item['hinh_anh']) }}" alt="{{ $item['ten'] }}">
            </a>
        </div>
        <div class="info-news">
            <h3 class="mb-0 name-news"><a title="{{ $item['ten'] }}" href="{{ route('newsDetailPage',$item->id) }}">{{ $item['ten'] }}</a></h3>
            <div class="mb-0 mota-news text-split">{{$item['mo_ta']}}</div>
        </div>
    </div>
</div>