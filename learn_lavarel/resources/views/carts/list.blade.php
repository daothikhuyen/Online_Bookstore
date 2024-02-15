<!DOCTYPE html>
<html lang="en">
<head>
 @include('head')
</head>
<body>
    <div class="main">
        @include('header')
        <div class="cart">
            @include('admin.alter')
            <div class="container">
                <div class="row">
                    <div class="header-title my-4">
                        <h5 class="">Giỏ Hàng (<span class="number_order">{{Session::get('cart')}}</span> sản phẩm)</h5>
                    </div>
                    <form action="#" class="order_cart" onsubmit="return false">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="header-cart d-flex bg-white">
                                    <div class="check-all-product">
                                        <input type="checkbox" class="check-box-product-all" name="check-box-product-id" id="check-box-product">
                                    </div>
                                    <div>
                                        <span>Chọn tất cả <span class="num-items-checkbox">{{Session::get('cart')}}</span> sản phẩm</span>
                                    </div>
                                    <div>Số lượng</div>
                                    <div>Thành tiền</div>
                                    <div></div>
                                </div>
                                <div class="product-cart-left ">
                                    @if (count($products) <>0)
                                        @foreach ($products as $key => $product)

                                            <div class="item-product-cart-left">
                                                <div class="check-box-cart">
                                                    <input type="checkbox" class="check-box-product" name="check-box-product" id="check-box-product" value="{{$product->product->id}}">
                                                </div>
                                                <div class="img-product-cart">

                                                    <a href="/product/{{$product->product->id}}-{{Str::slug($product->product->name, '-')}}.html" class="product-image">
                                                        <img src="{{$product->product->image}}" width="120px" height="120px"  alt="{{$product->product->name}}">
                                                    </a>
                                                </div>
                                                <div class="group-product-info">
                                                    <div class="info-product-cart">
                                                        <div>
                                                            <h2 class="product-name-full-text">
                                                                <a class="name" href="/product/{{$product->product->id}}-{{Str::slug($product->product->name, '-')}}.html">{{$product->product->name}}</a>
                                                            </h2>
                                                        </div>
                                                        <div class="price-original">
                                                            <div class="cart-price">
                                                                <div class="cart-price-iten">
                                                                    <div>
                                                                        <span class="price price-order-item" data-price-item ="{{($product->product->price * (100 - $product->product->discount)) / 100}}">{{($product->product->price * (100 - $product->product->discount)) / 100}}</span>
                                                                    </div>
                                                                    <div class="item-price-old">
                                                                        <span class="price">{{$product->product->price}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="number-product-cart">
                                                        <div class="product-view-quantity-box">
                                                            <div class="product-view-quantity-box-block-cart p-0 m-0">
                                                                <div class="d-flex align-items-center border border-1 rounded-3">
                                                                    <input type="hidden" name="limit_quantity" id="" class="limit_quantity" value="{{$product->product->quantity}}">
                                                                    <button class="button-minus ms-2 border-0"  onclick="handleMinus({{$product->id}},{{$key}})">
                                                                        <img src="/template/image/ico_minus2x.png" alt="">
                                                                    </button>
                                                                    <input type="number" name="quantity" id="quantity-{{$product->product->id}}" class="qty-carts quantity text-center fw-light" style="outline: none;" value="{{$product->quantity}}">
                                                                    <button class="button-plus border-0" onclick="handlePlus({{$product->id}},{{$key}})">
                                                                        <img src="/template/image/ico_plus2x.png" alt="" class="me-2">
                                                                    </button>
                                                                </div>

                                                            </div>
                                                            <div class="error">
                                                                Quá số lượng hiện có
                                                            </div>

                                                        </div>
                                                        <div class="cart-price-total pe-4">
                                                            <span class="cart-price">
                                                                <span class="price total_order_product_cart" id="total_order_product_cart" data-price="{{(($product->product->price *(100- $product->product->discount)/100)*$product->quantity)}}">{{(($product->product->price * (100- $product->product->discount)/100)*$product->quantity)}}</span>
                                                            </span>
                                                        </div>
                                                        <input type="hidden" name="id-product" class="id_product" id="" value="{{$product->product->id}}">

                                                    </div>
                                                </div>


                                                <div class="remove-cart">
                                                    <a href="/carts/delete/{{$product->id}}" >
                                                        <i class='bx bx-trash fa-xl'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="border-product"></div>
                                        @endforeach
                                    @else
                                    <div class="item-product-cart-left">
                                        <div class="null-img w-100">
                                            <img src="/template/image/null_cart.jpg" class="w-100" alt="">
                                        </div>
                                    </div>
                                    @endif

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
                                                        <div class="promote">
                                                            <div class="event-promo-list-item-content event-promo-list-item-line pt-3 promote">
                                                                <div>
                                                                    <div class="event-promo-list-item-conent-title">
                                                                        <input type="hidden" name="price" id="" class="price_discount" value="{{$promote->price}}">
                                                                        <input type="hidden" name="price" id="" class="price_discount_id" value="{{$promote->id}}">
                                                                        <span style="font-family:'Times New Roman', Times, serif;">{{$promote->request}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="event-promo-list-item-conent-description">
                                                                    Không áp dụng cho phiếu quà tặng và sách giáo khoa
                                                                </div>
                                                                <div class="btn-app-dung">
                                                                    <button class="btn-app">Áp Dụng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {!! $promotes->links() !!}

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
                                                    <span class="price" id="total_price" data-price = "0">0</span>
                                                </div>
                                            </div>
                                            <div class="border-product"></div>
                                            <div class="total-cart-page title-final-total">
                                                <div class="title-cart-page-left">Tổng Số Tiền (gồm VAT)</div>
                                                <div class="number-cart-page-right d-flex">
                                                    <div class="price" id="total_price_after" data-price-new = "0" >0</div>
                                                </div>
                                            </div>
                                            <div class="checkout-type-button-cart" style="text-align: center;">
                                                <div class="method-button-cart">
                                                    <button type="submit" title="Thanh toán" id="btn-checkout" class="button btn-proceed-checkout btn-checkout">
                                                        <span>
                                                            <span>Thanh toán</span>
                                                        </span>
                                                    </button>
                                                    <div class="retail-note"><a href="https://www.fahasa.com/chinh-sach-khach-si/" target="_blank">(Giảm giá trên web chỉ áp dụng cho bán lẻ)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="error">
            <div>
                Số lượng không đủ
            </div>
        </div>
        @include('footer')

</body>
</html>
