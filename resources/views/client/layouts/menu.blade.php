<?php
use App\Http\Controllers\Clients\TrangChuController;
?>



<div class="menu">
    <div class="wrap-content">
        <ul class="menu-main">
            <li><a class="transition" href="{{route('TrangChu')}}"  title="Trang chủ">Trang chủ</a></li>
            <li><a class="transition" href="" title="">Giới thiệu</a></li>
            @if(TrangChuController::loadLevel1Cate() == true)
                @foreach (TrangChuController::loadLevel1Cate() as $category)
                    <li>
                        @if (TrangChuController::loadLevel2Cate($category->id) != false)
                            <a class="has-child transition" href="{{ route('categoriesList',['name_list'=>$category->ten,'id_list'=>$category->id]) }}" title="{{ $category->ten }}">
                                <span>{{ $category->ten }}</span>
                            </a>
                        @else
                            <a class="transition" title="{{ $category->ten }}">
                                <span>{{ $category->ten }}</span>
                            </a>
                        @endif
                        @if (TrangChuController::loadLevel2Cate($category->id) != false)
                                <ul>
                                    @foreach (TrangChuController::loadLevel2Cate($category->id) as $category_cat)
                                        <li>
                                            <a href="{{ route('categoriesCat',['name_list'=>$category->ten,'id_list'=>$category->id,'name_cat'=>$category_cat->ten,'id_cat'=>$category_cat->id]) }}" title="{{ $category_cat->ten }}">
                                                {{ $category_cat->ten }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                        @endif
                    </li>
                @endforeach
            @endif
            <li><a class="transition" href="" title="">Thương hiệu</a></li>
            <li><a class="transition" href="" title="">Tin tức</a></li>
        </ul>
    </div>
</div>