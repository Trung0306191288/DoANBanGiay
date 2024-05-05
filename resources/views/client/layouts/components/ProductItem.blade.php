<div class="product__item">
    <a class="product__item-inner" href="{{ route('productDetailPage',['id'=>$product->id]) }}" title="{{ $product->name }}">
        <div class="product__photo">
            <figure class="product__photo-inner hvr-flash-shape">
                <img src="{{ asset('upload/products/' . $product->photo) }}"
                    alt="{{ $product->name }}">
                <figcaption class="figcaption-hidden">{{ $product->name }}
            </figure>
        </div>
        <div class="product__info">
            <h3 class="product__name">{{ $product->name }}</h3>
            <div class="product__price">
                <div class="product__price-from product__price-range">
                    Giá từ:
                    <span class="product__price-new">@convert($product->price_from)</span>
                </div>
                <div class="product__price-to product__price-range">
                    Đến: 
                    <span class="product__price-new">@convert($product->price_to)</span>
                </div>
                {{-- <span class="product__price-discount">20%</span> --}}
            </div>
            <div class="product__rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
        </div>
    </a>
</div>