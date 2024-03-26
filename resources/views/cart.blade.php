<!DOCTYPE html>
<html lang="en">
<head>
 @include('head')
</head>
<body>
    <div class="main">
        @include('header')
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="header-title my-4">
                        <h5 class="">Giỏ Hàng (<span> 3</span> sản phẩm)</h5>
                    </div>
                    <form action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="header-cart d-flex bg-white">
                                    <div class="check-all-product">
                                        <input type="checkbox" class="check-box-product" name="check-box-product-id" id="check-box-product">
                                    </div>
                                    <div>
                                        <span>Chọn tất cả <span class="num-items-checkbox">2</span> sản phẩm</span>
                                    </div>
                                    <div>Số lượng</div>
                                    <div>Thành tiền</div>
                                    <div></div>
                                </div>
                                <div class="product-cart-left ">
                                    <div class="item-product-cart-left" style=" border-radius: 8px;">
                                        <div class="check-box-cart">
                                            <input type="checkbox" class="check-box-product" name="check-box-product-id" id="check-box-product">
                                        </div>
                                        <div class="img-product-cart">
                                            <a href="" class="product-image">
                                                <img src="image/ben-cua-ngam-xuan_128256_1.jpg" width="120px" height="120px"  alt="Bên Của Ngắm Xuân">
                                            </a>
                                        </div>
                                        <div class="group-product-info">
                                            <div class="info-product-cart">
                                                <div>
                                                    <h2 class="product-name-full-text">
                                                        <a href="">Vì Cậu Là Bạn Nhỏ Của Tớ</a>
                                                    </h2>
                                                </div>
                                                <div class="price-original">
                                                    <div class="cart-price">
                                                        <div class="cart-price-iten">
                                                            <div>
                                                                <span class="price">75.240 đ</span>
                                                            </div>
                                                            <div class="item-price-old">
                                                                <span class="price">75.240 đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="number-product-cart">
                                                <div class="product-view-quantity-box">
                                                    <div class="product-view-quantity-box-block">
                                                        <div class="d-flex align-items-center border border-1 rounded-3">
                                                            <button class="button-minus ms-2 border-0"  onclick="handleMinus()">
                                                                <img src="image/ico_minus2x.png" alt="">
                                                            </button>
                                                            <input type="text" name="quantity" id="qty-carts" class="qty-carts text-center fw-light" value="1">
                                                            <button class="button-plus border-0" onclick="handlePlus()">
                                                                <img src="image/ico_plus2x.png" alt="" class="me-2">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-price-total pe-4">
                                                    <span class="cart-price">
                                                        <span class="price">75.240 đ</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="remove-cart">
                                            <i class='bx bx-trash fa-xl'></i>
                                        </div>
                                    </div>
                                    <div class="border-product"></div>
                                    <div class="item-product-cart-left">
                                        <div class="check-box-cart">
                                            <input type="checkbox" class="check-box-product" name="check-box-product-id" id="check-box-product">
                                        </div>
                                        <div class="img-product-cart">
                                            <a href="" class="product-image">
                                                <img src="image/bia_1_dam_khang_chi_2018.jpg" width="120px" height="120px"  alt="Bên Của Ngắm Xuân">
                                            </a>
                                        </div>
                                        <div class="group-product-info">
                                            <div class="info-product-cart">
                                                <div>
                                                    <h2 class="product-name-full-text">
                                                        <a href="">Vì Cậu Là Bạn Nhỏ Của Tớ</a>
                                                    </h2>
                                                </div>
                                                <div class="price-original">
                                                    <div class="cart-price">
                                                        <div class="cart-price-iten">
                                                            <div>
                                                                <span class="price">75.240 đ</span>
                                                            </div>
                                                            <div class="item-price-old">
                                                                <span class="price">75.240 đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="number-product-cart">
                                                <div class="product-view-quantity-box">
                                                    <div class="product-view-quantity-box-block">
                                                        <div class="d-flex align-items-center border border-1 rounded-3">
                                                            <button class="button-minus ms-2 border-0"  onclick="handleMinus()">
                                                                <img src="image/ico_minus2x.png" alt="">
                                                            </button>
                                                            <input type="text" name="quantity" id="qty-carts" class="qty-carts text-center fw-light" value="1">
                                                            <button class="button-plus border-0" onclick="handlePlus()">
                                                                <img src="image/ico_plus2x.png" alt="" class="me-2">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-price-total pe-4">
                                                    <span class="cart-price">
                                                        <span class="price">75.240 đ</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="remove-cart">
                                            <i class='bx bx-trash fa-xl'></i>
                                        </div>
                                    </div>
                                    <div class="border-product"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="total-cart-right mt-sm-3 mt-md-0">
                                    <div class="block-totals bg-white " style="border-radius: 8px;">
                                        <div class="total">
                                            <div class="event-promo py-2 px-3">
                                                <div class="event-promo-title pb-2">
                                                    <div class="event-promo-title-left">
                                                        <span class="pe-2">
                                                            <img src="/template/image/ico_coupon.svg" alt="">
                                                        </span>
                                                        <span>Khuyến mãi</span>
                                                    </div>
                                                </div>
                                                <div class="event-promo-item event-promo-line">
                                                    @foreach ($promotes as $promote )
                                                        <div>
                                                            <div class="event-promo-list-item-content event-promo-list-item-line pt-3">
                                                                <div>
                                                                    <div class="event-promo-list-item-conent-title">
                                                                        <input type="hidden" name="price" id="" class="price_discount" value="{{$promote->price}}">
                                                                        <span style="font-family:'Times New Roman', Times, serif;">{{$promote->request}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="event-promo-list-item-conent-description">
                                                                    Không áp dụng cho phiếu quà tặng và sách giáo khoa
                                                                </div>
                                                                <div class="btn-app-dung">
                                                                    <button>Áp Dụng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-total-cart">
                                        <div class="block-totals-cart-page">
                                            <div class="total-cart-page">
                                                <div class="title-cart-page-left">
                                                    Thành Tiền
                                                </div>
                                                <div class="number-cart-page-right">
                                                    <span class="price">75.240 đ</span>
                                                </div>
                                            </div>
                                            <div class="border-product"></div>
                                            <div class="total-cart-page title-final-total">
                                                <div class="title-cart-page-left">Tổng Số Tiền (gồm VAT)</div>
                                                <div class="number-cart-page-right">
                                                    <span class="price">75.240 đ</span>
                                                </div>
                                            </div>
                                            <div class="checkout-type-button-cart" style="text-align: center;">
                                                <div class="method-button-cart">
                                                    <button onclick="cart.goToCheckout(this)" type="button" title="Thanh toán" class="button btn-proceed-checkout btn-checkout"><span><span>Thanh toán</span></span>
                                                    </button>
                                                    <div class="retail-note"><a href="https://www.fahasa.com/chinh-sach-khach-si/" target="_blank">(Giảm giá trên web chỉ áp dụng cho bán lẻ)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/js/home.js"></script>
<!-- <script src="assets/js/product-detail.js"></script> -->
</body>
</html>
