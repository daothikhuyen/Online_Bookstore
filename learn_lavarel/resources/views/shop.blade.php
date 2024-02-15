@extends('main')

@section('content')
    <header>
        @include('header')
    </header>

    <div class="wraper_shop">
        <div class="container ">
            <div class="book-type py-4">
                <!-- <h1>Sách-Truyện-Thể Loại</h1> -->
            </div>
            <div class="d-flex">
                <div class="left-menu pe-0">
                    <div class="border-end">
                        <div class="categoey-title w-100 bg-white py-1">
                            <div class="category ps-3">
                                <h4 class="title">Danh Mục</h4>
                            </div>
                            <div class="slidermenubox">
                                <div class="siderbar-menu-new">
                                    @foreach ($menus as $menu)
                                        <div class="has-sub">
                                            <a
                                                href="/shop/{{ $menu->id }}-{{ Str::slug($menu->name, '-') }}.html">{{ $menu->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="categoey-title w-100 bg-white pt-2 pb-3 mt-1 w-100">
                            <div class="category ps-3 ">
                                <h4 class="title">Theo Giá</h4>
                            </div>
                            <div class="slidermenubox">
                                <div class="siderbar-menu-new">
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-0-50000.html">Giá nhỏ hơn <span>
                                                50.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-50000-100000.html">Giá từ <span>
                                                50.000<small>đ</small></span> - <span> 100.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-100000-200000.html">Giá từ <span>
                                                100.000<small>đ</small></span> - <span> 200.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-200000-300000.html">Giá từ <span>
                                                200.000<small>đ</small></span> - <span> 300.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-300000-400000.html">Giá từ <span>
                                                300.000<small>đ</small></span> - <span> 400.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-400000-500000.html">Giá từ <span>
                                                400.000<small>đ</small></span> - <span> 500.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-500000-1000000.html">Giá từ <span>
                                                500.000<small>đ</small></span> - <span> 1000.000<small>đ</small></span></a>
                                    </div>
                                    <div class="has-sub">
                                        <a href="/shop/gia/{{ $id_menu }}-1000000-9999999.html"> Giá trên <span>
                                                1000.000<small>đ</small></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-menu p-0 bg-white ">
                    <div class="categoey-title w-100 px-3 border-bottom">
                        <div class="d-flex align-items-center justify-content-between py-2">
                            <div class="category">
                                <h4 class="title"></h4>
                            </div>
                            <div class="div category-search d-flex align-items-center">
                                <div class="search-query">
                                    <select name="" id="" class="px-3 rounded-2"
                                        style="outline: 0; border: 1px solid #949494;" onchange="handleChange(this)">
                                        <option value="1">Sản Phẩm Bán Chạy</option>
                                        <option value="2"
                                            data-url="{{ request()->fullUrlWithQuery(['discount' => 'khuyen_mai']) }}">Sản
                                            Phẩm khuyến mãi</option>
                                        <option value="3"
                                            data-url="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}">Giá tăng dần
                                        </option>
                                        <option value="4"
                                            data-url="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}">Giá giảm dần
                                        </option>
                                    </select>
                                </div>
                                <form action="" method="post" id="header-search">
                                    <div class="search-word ms-2">
                                        <div class="input-search">
                                            <input type="text" name="search">
                                        </div>
                                        <span class="icon-search">
                                            <button class="bg-white border-0">
                                                <small><i class="fa-solid fa-magnifying-glass pe-2"></i></small>
                                            </button>
                                        </span>
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-book">
                        @if ($products->isEmpty())
                            <div class="row image-slider_three">
                                <div class="col-12">
                                    <h6 class="w-100 py-3 text-danger fw-bold text-center" style="background-color: #eee">
                                        Không Tìm Thấy Sản Phẩm</h6>
                                </div>
                            </div>
                        @else
                            <div class="row image-slider_three px-2 pt-2">
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-sm-7 ">
                                        @include('products.list')
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        {{ $products->links() }}
                            {{-- <div class="page d-flex justify-content-center py-5">
                                <span>
                                    <a href="">1</a>
                                </span>
                                <span>
                                    <a href="">1</a>
                                </span>
                                <span>
                                    <a href="">1</a>
                                </span>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
