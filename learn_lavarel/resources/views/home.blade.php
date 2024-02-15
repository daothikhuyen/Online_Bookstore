@extends('main')

@section('content')
    <header>
        @include('header')
    </header>
    <div class="wraper">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($sliders as $slider)
                    @if ($loop->first)
                        <div class="carousel-item active">
                            <img src="{{ $slider->image }}" class="w-100 d-block" alt="First slide" />
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ $slider->image }}" class="w-100 d-block" alt="First slide" />
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <div class="promote-banners">
        <div class="container">
            <div class="banner-item item1">
                <a href="">
                    <img src="/template/image/sale_banner.jpg" alt="">
                </a>
            </div>
            <div class="banner-item item1">
                <a href="">
                    <img src="/template/image/sale_banner.jpg" alt="">
                </a>
            </div>
            <div class="banner-item item1">
                <a href="">
                    <img src="/template/image/sale_banner.jpg" alt="">
                </a>
            </div>

        </div>
    </div>

    <div class="week-book product_famous">
        <div class="container bg-white">
            <div class="header">
                <div class="book-header">
                    <h1>Sách Hot ⚡ Giảm Sốc </h1>
                </div>
            </div>
        </div>
        <div class="week-book1">
            <div class="container bg-white">
                <div class="image-slider bg-white py-3">
                    @foreach ($products as $product)
                        @if ($product->discount > 0)
                            @include('products.list')
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="week-book mt-3">
        <div class="container bg-white">
            <div class="header">
                <div class="book-header">
                    <h1>Văn Học - Huyền Thoại </h1>
                </div>
            </div>
        </div>
        <div class="week-book2">
            <div class="container bg-white">
                <div class="row">
                    <div class="col-sm-4 col-md-4 poster-book py-4">
                        <div class="poster-item">
                            <img src="/template/image/poster/poster_1.jpg" class="w-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 slider-2-book ">
                        <div class="image-slider_two bg-white py-3">
                            @foreach ($products as $product)
                                @if ($product->menu->name == 'Văn Học' || $product->menu->name == 'Huyền Thoại')
                                    @include('products.list')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-body container mt-3 px-0">
        <div class="banner-slider">
            <div class="banner-item w-100">
                <div class="banner-img w-100">
                    <img src="/template/image/poster/banner-body.jpg" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="week-book mt-3">
        <div class="container bg-white">
            <div class="header">
                <div class="book-header">
                    <h1>Tiểu Thuyết - Ngôn Tình</h1>
                </div>
            </div>
        </div>
        <div class="week-book2">
            <div class="container bg-white">
                <div class="row">
                    <div class="col-sm-4 col-md-4 poster-book py-4">
                        <div class="poster-item">
                            <img src="/template/image/poster/poster_2.jpg" class="w-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 slider-2-book ">
                        <div class="image-slider_two bg-white py-3">
                            @foreach ($products as $product)
                                @if ($product->menu->name == 'Tiểu Thuyết' || $product->menu->name == 'Ngôn Tình')
                                    @include('products.list')
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
