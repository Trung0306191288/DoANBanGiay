@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span><?= $TieuDe ?></span>
            <div class="animate-border"></div>
        </div>
        <section class="news">
            <div class="wrap-content">
                @if ($brandList != false)
                    <div class="w-clear">
                        @foreach ($brandList as $item)
                            <div class="brand-page">
                                <div class="box-brand hrv-rotateY">
                                    <div class="pic-brand">
                                        <a class="img-brand" title="{{ $item['ten'] }}" href="{{ route('brandDetailPage',['name_list'=>$item->ten,'id_brand'=>$item->id]) }}">
                                            <img src="{{ asset('upload/thuonghieu/' . $item['hinh_anh']) }}" alt="{{ $item['ten'] }}">
                                        </a>
                                    </div>
                                    <div class="info-brand">
                                        <h3 class="mb-0 name-brand"><a title="{{ $item['ten'] }}" href="{{ route('brandDetailPage',['name_list'=>$item->ten,'id_brand'=>$item->id]) }}">{{ $item['ten'] }}</a></h3>
                                        <ion-icon name="chevron-forward-outline"></ion-icon>
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
        </section>
    </div>
@endsection
