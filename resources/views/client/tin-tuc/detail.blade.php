@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span>{{ $newsDetail->ten }}</span>
            <div class="animate-border"></div>
        </div>
        <div class="news-detail__content">
            {!! $newsDetail->noi_dung !!}
        </div>
    </div>
@endsection
