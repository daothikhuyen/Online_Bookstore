<div class="header_info py-2" style="background-color: #f5f5f5;">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div class="info fs-small " style="color: #a2a0a0;">
                    <span>
                        Cong Nghe Thong Tin Viet Han
                    </span>
                </div>
                <div class="info fs-small " style="color: #a2a0a0;">
                    <span class="" style="font-size: small;">
                        --34| 945098455| 84
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header_2 py-3" style="background-color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="logo col-xs-12 col-sm-6 col-lg-8 col-md-6">
                <img src="/template/image/logo_green.png" alt="">
            </div>
            <div class="cart col-xs-12 col-sm-6 col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="comboo_cart">
                    <a href="#" onclick="showcarts()">
                        <i class="fa-solid fa-cart-shopping fs-5"></i>
                    </a>

                </div>
                <div class="giohang ms-3 pt-2" style="font-size: 13px; font-family: sans-serif;">
                    Giỏ Hàng (<span class="number_order" style="font-family: sans-serif;">{{ Session::get('cart')?Session::get('cart'):0}}</span>)
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm navbar-light fw-bold py-2" style="background-color: #27ae61;">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="/">
            TRANG CHỦ
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <li class="nav-item dropdown">
                    {!! \App\Helpers\Helper::menus($menus, 0) !!}
                </li>
            </ul>
            <div class="info_user my-2 my-lg-0">
                @if (Session::has('user') && Session::get('user')->level == '2')
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold" href="#" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ Session::get('user')->name }}</a>
                            <div class="dropdown-menu text-white" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="/manger/purchase/type/{{4}}">Tài Khoản Của Tôi</a>
                                <a class="dropdown-item" href="/manger/purchase/type/{{0}}">Đơn Hàng Của Tôi</a>
                                <a class="dropdown-item" href="/admin/logout">Đăng Xuất</a>
                            </div>
                        </li>
                    </ul>
                @else
                    <div class='btn-dk-dn'>
                        <a href="/admin/users/login">
                            Đăng Nhập
                        </a>
                        <a href="/admin/users/register" class="me-0">Đăng Kí</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</nav>
