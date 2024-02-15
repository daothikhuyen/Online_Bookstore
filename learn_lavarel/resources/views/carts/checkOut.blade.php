@extends('main')

@section('content')
    <header>
        @include('header')
    </header>

    <div class="checkout">
        <form action="/carts/buy" method="post">
            <div class="container">
                <div class="row mt-4 p-2 bg-white">
                    <div class="col-md-6 bg-white p-2">
                        <div class="order-address">
                            <h5 class="fw-bold">Địa Chỉ Giao Hàng</h5>
                        </div>
                        <div class="border-product border-1"></div>
                        <div class="info_user_order">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên người nhận</label>
                                    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện điện thoại</label>
                                    <input type="text" name="number_phone" class="form-control"
                                        id="exampleInputPassword1" placeholder="Ví dụ: 0834006551 tối đa 10 kí tự">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" name="daiajchi">Địa chỉ nhập hàng</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nhập đại chỉ nhận hàng">
                                </div>
                                <div class="form-group">
                                    <label>Ghi Chú</label>
                                    <textarea class="form-control" name="note" rows="3" placeholder="Nhập ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="order-address">
                            <h5 class="fw-bold">Mã Giảm Giá</h5>
                        </div>
                        @if ($promote !== null)
                            <div class="border-product border-1"></div>
                            <div class="discount-code">
                                <div class="promote py-3">
                                    <div class="discount-code-item my-2">
                                        <div class=" px-4 border-end text-center">
                                            <div>
                                                <img src="/template/image/ico_coupon.svg" class=""
                                                    style="width: 40px;" alt="">
                                            </div>
                                            <div class="discount-price"
                                                style='color: #2F80ED; font-family: "Poppins", sans-serif;'>
                                                {{ $promote !== null ? $promote->price / 1000 : 0 }}K
                                            </div>
                                        </div>
                                        <div>
                                            <div class="event-promo-list-item-content px-3 ">
                                                <div>
                                                    {{-- <div class="event-promo-list-item-conent-title">
                                                    Mã Giảm <span class="" style="font-family:'Times New Roman', Times, serif;">10</span>k - Đơn Hàng Từ <span style="font-family:'Times New Roman', Times, serif;">150</span>k
                                                </div> --}}
                                                    <div class="event-promo-list-item-conent-title">
                                                        <span
                                                            style="font-family:'Times New Roman', Times, serif;">{{ $promote !== null ? $promote->request : '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="event-promo-list-item-conent-description">
                                                    Không áp dụng cho phiếu quà tặng và sách giáo khoa
                                                </div>
                                                <div class="icon-x">
                                                    <i class="fa-solid fa-x"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="border-product border-1"></div>
                        @endif

                    </div>
                    <div class="col-md-6 bg-white p-2">
                        <div class="order-address">
                            <h5 class="fw-bold">Đơn Hàng </h5>
                        </div>
                        <div class="border-product border-1"></div>
                        <div class="checkout-product my-4 pe-3">
                            @php
                                $total = 0;

                            @endphp
                            @foreach ($products as $product)
                                @php
                                    $total += (($product->price * (100 - $product->discount)) / 100) * Session::get('cart_order')[$product->id];
                                @endphp
                                <div class="checkproduct-item">
                                    <div class="checkOut-item-box-img-name">
                                        <div class="checkOut-img">
                                            <img src="{{ $product->image }}" width="120px" height="110px" alt="">
                                        </div>
                                        <div class="checkout-item-box-name">
                                            <span name="product-name-order"
                                                class="product-name-order">{{ $product->name }}</span>
                                        </div>
                                    </div>

                                    <div class="checkOut-item-box-price-qyt pt-2">
                                        <div class="price-order">
                                            <span class="price check-out-price"
                                                data-price="{{ $product->price }}">{{ $product->price }}</span>
                                        </div>
                                        <div class="qyt">
                                            <span class="price_order check-out-price"
                                                data-price="">{{ Session::get('cart_order')[$product->id] }}</span>
                                        </div>
                                        <div class="price-order">
                                            <span class="price check-out-price fw-bold" style="color: #27ae61;"
                                                data-price="">{{ (($product->price * (100 - $product->discount)) / 100) * Session::get('cart_order')[$product->id] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-product border-1"></div>
                        <div class="total-checkout">
                            <div class="form-group">
                                <div for="">Thuế</div>
                                <div for="">Phí Vận Chuyển</div>
                                <div for="">Giảm Giá</div>
                                <div for="" class="fw-bold" style="font-size: 18px;">Tổng tiền:</div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <span class="price">
                                        0
                                    </span>
                                </div>
                                <div>
                                    <span class="price">
                                        0
                                    </span>
                                </div>
                                <div>
                                    <span class="price">
                                        {{ $promote !== null ? $promote->price : 0 }}
                                    </span>
                                    <input type="hidden" class=" fw-bold d-inline-block"
                                        id="total_price"name="id_promote"
                                        value="{{ $promote !== null ? $promote->price / 1000 : 0 }}">
                                </div>
                                <div>
                                    <span class=" fw-bold price" name="total_price"
                                        style='color: #27ae61;    font-family: "Poppins", sans-serif;'>
                                        {{ $total -= $promote !== null ? $promote->price : 0 }}
                                    </span>
                                    <input type="hidden" class=" fw-bold d-inline-block" id="total_price"
                                        name="total_price" value="{{ $total -= $promote !== null ? $promote->price : 0 }}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout-type-button-cart my-3">
                            <div class="method-button-cart">
                                <button type="submit" name="buy_order" title="Thanh toán"
                                    class="button btn-proceed-checkout btn-checkout"><span><span>Thanh toán</span></span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @csrf
        </form>
    </div>
@endsection
