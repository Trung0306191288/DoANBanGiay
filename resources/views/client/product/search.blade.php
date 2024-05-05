@extends('client.index')
@section('content')
    <div class="wrap-main">
        <div class="main__title">
            <h2><?= $pageName ?></h2>
        </div>
        <section class="product">
            <div class="wrap-content">
                @if ($search != false)
                    <div class="product__list flex-list">
                        @foreach ($search as $product)
                            @include('client.layouts.components.ProductItem')
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
