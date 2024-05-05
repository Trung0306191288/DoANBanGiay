@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="main__title">
            <h2>{{ $newsDetail->name }}</h2>
        </div>
        <div class="news-detail__content">
            {!! $newsDetail->content !!}
        </div>
    </div>
@endsection
