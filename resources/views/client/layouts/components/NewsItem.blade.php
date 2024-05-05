<div class="news__item">
    <a class="news__item-inner" href="{{ route('newsDetailPage',$item->id) }}">
        <div class="news__photo">
            <figure class="news__photo-inner hvr-scale-img">
                <img src="{{ asset('upload/blogs/' . $item->photo) }}" alt="{{ $item->name }}">
                <figcaption class="figcaption-hidden">{{ $item->name }}
            </figure>
        </div>
        <div class="news__info">
            <div class="news__info-inner">
                <h3 class="news__name text-spplit transition">{{ $item->name }}</h3>
            </div>
            <p class="news__desc text-split">{{ $item->desc }}</p>
        </div>
    </a>
</div>