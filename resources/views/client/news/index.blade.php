@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="main__title">
            <h2><?= $pageName ?></h2>
        </div>
        <section class="news">
            <div class="wrap-content">
                @if ($newsList != false)
                    <div class="news__list flex-list">
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
