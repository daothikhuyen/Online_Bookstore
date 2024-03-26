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
                            <span><i class="fa-solid fa-user"></i></span>
                            <span>Tài Khoản</span>
                        </div>
                        <div class="Home_Info">
                            <span><i class="fa-solid fa-truck-fast"></i></span>
                            <span>Quản Lí Đơn Hàng</span>
                        </div>

                    </div>
                    <div class="cart_01 col-md-9">
                        <div class="detail_order_your">
                            <div class="container mt-3 py-3 bg-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_user_order">
                                            <div class="order-item">
                                                <label for="" class="fw-bold">Tên khách hàng</label>
                                                <span>: &nbsp; {{ $orders->fullname }}</span>
                                            </div>
                                            <div class="order-item">
                                                <label for="" class="fw-bold">Email</label>
                                                <span>: &nbsp; {{ $orders->email }}</span>
                                            </div>
                                            <div class="order-item">
                                                <label for="" class="fw-bold">Số điện thoại</label>
                                                <span>: &nbsp; {{ $orders->phone_number }}</span>
                                            </div>
                                            <div class="order-item">
                                                <label for="" class="fw-bold">Địa chỉ</label>
                                                <span>: &nbsp; {{ $orders->address }}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info_user_order">
                                            <div class="order-item">
                                                <label for="" class="fw-bold">Ngày Đặt Hàng</label>
                                                <span class="price_order">: &nbsp;{{ \Carbon\Carbon::parse($orders->created_at)->format('d-m-Y H:i:s')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="info_user_order">
                                        <div class="order-item">
                                            <label for="" class="fw-bold" style="width: 15%;">Ghi Chú</label>
                                            <span>: &nbsp; {{ is_null($orders->note) ? 'Không Có' : $orders->note }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">STT</th>
                                                <th>&nbsp;</th>
                                                <th class="text-center">Tên sản phẩm</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="text-center">Giá</th>
                                                <th class="text-center">Tổng tiền</th>
                                            </tr>
                                        </thead>

                                        <tbody class="mt-3">
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($order_details as $key => $order_detail)
                                                @php
                                                    $total += $order_detail->price * $order_detail->quantity;
                                                @endphp
                                                <tr class="align-middle products">
                                                    <td class="align-middle">{{ $key += 1 }}</td>
                                                    <td class="align-middle">
                                                        <img src="{{ $order_detail->product->image }}" alt=""
                                                            style="width:80px">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $order_detail->product->name }}</td>
                                                    <td class="align-middle text-center price_order">
                                                        {{ $order_detail->quantity }}</td>
                                                    <td class="align-middle text-center price">
                                                        {{ $order_detail->price }}
                                                    </td>
                                                    <td class="align-middle text-center price">
                                                        {{ $order_detail->price * $order_detail->quantity }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="align-middle products">
                                                <td colspan="5" class="text-right price_order"
                                                    style="text-align: end">Tổng tiền: </td>
                                                <td class="align-middle text-center price">{{ $total }} </td>
                                            </tr>
                                            <tr class="align-middle products border-top-0">
                                                <td colspan="5" class="text-right border-top-0"></td>
                                                <td class="align-middle text-center border-top-0">

                                                    <a href="#" class="btn btn-secondary btn-sm">
                                                        @if ($orders->status == 1)
                                                            Đã Giao
                                                        @elseif ($orders->status == 2)
                                                            Đã Huỷ
                                                        @elseif ($orders->status == 0)
                                                            Chưa Xác Nhận
                                                        @endif
                                                    </a>
                                                    @if ($orders->status == 0)
                                                        <a href="#" class="btn btn-danger" onclick = "update({{$order->id}},'/admin/carts/destroy/{{$order->id}}')">
                                                           Huỷ Đơn
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('footer')
</body>

</html>
