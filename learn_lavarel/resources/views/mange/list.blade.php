<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    <div class="main">
        <header>
            @include('header')

        </header>

        <div class="mange_order mt-5">
            <div class="container bg-white py-3">
                <div class="row d-flex justify-content-center">
                    <div class="order_left_info col-md-3 text-black container">
                        <div class="Home_Info active">
                            <h6 class="">
                                <span>
                                    <a href="/" class="text-decoration-none" style="color: #fff;"></span><i
                                    class="fa-solid fa-house"></i> Trang Chủ</a>
                                </span>
                                <span class="text-center">
                                    <i class="fa-solid fa-caret-right text-white text-center"></i>
                                </span>
                                <span>
                                    Đơn Hàng
                                </span>
                            </h6>
                        </div>
                        <div class="Home_Info">
                            <a href="/manger/purchase/type/{{4}}">
                                <span><i class="fa-solid fa-user"></i></span>
                                <span>Tài Khoản</span>
                            </a>
                        </div>
                        <div class="Home_Info">
                            <a href="/manger/purchase/type/{{0}}">
                                <span><i class="fa-solid fa-truck-fast"></i></span>
                                <span>Quản Lí Đơn Hàng</span>
                            </a>
                        </div>

                    </div>
                    @if ($pages == 4)
                        <div class="cart_01 col-md-9">
                            <div class="container">
                                @include('mange.account')
                            </div>
                        </div>

                    @else
                    <div class="cart_01 col-md-9">
                        <div class="container">
                            <div class="text-black w-100 h-100 bg-white mb-3">
                                <div class="text-center">
                                    <div class="d-flex justify-content-between border-bottom">

                                        <a href="/manger/purchase/type/0" class="menu_order_page {{$pages == 0 ?"under_menu":''}}">
                                            <button class="btn_order_page ">Tất cả đơn</button>
                                        </a>
                                        <a href="/manger/purchase/type/1" class="menu_order_page {{$pages == 1 ?"under_menu":''}}" >
                                            <button class="btn_order_page">Đang xử lí</button>
                                        </a>
                                        <a href="/manger/purchase/type/2" class="menu_order_page {{$pages == 2 ?"under_menu":''}}">
                                            <button class="btn_order_page">Đã Giao</button>
                                        </a>
                                        <a href="/manger/purchase/type/3" class="menu_order_page {{$pages == 3 ?"under_menu":''}}">
                                            <button class="btn_order_page">Đã Huỷ</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="all_order">
                                @foreach ($orders as $order)
                                    @switch($pages)
                                        @case(0)
                                            @include('mange.all_order_user')
                                        @break

                                        @case(1)
                                            @include('mange.unconfirmed_user')
                                        @break

                                        @case(2)
                                            @include('mange.confirmed_order_user')
                                        @break

                                        @case(3)
                                            @include('mange.cancel_order')
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>


        @include('footer')
</body>

</html>
