@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="title-main">
            <span><?= $TieuDe ?></span>
            <div class="animate-border"></div>
        </div>
        <section class="news">
            <div class="wrap-content">
                @if ($newsList != false)
                    <div class="w-clear">
                        @foreach ($newsList as $item)
                            @include('client.layouts.components.NewsItem')
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
