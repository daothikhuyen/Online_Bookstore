
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3 py-3">
    <div class="info_user_order">
        <div class="order-item">
            <label for="">Tên khách hàng</label>
            <span>: &nbsp; {{$orders->fullname}}</span>
        </div>
        <div class="order-item">
            <label for="">Email</label>
            <span>: &nbsp; {{$orders->email}}</span>
        </div>
        <div class="order-item">
            <label for="">Số điện thoại</label>
            <span>: &nbsp; {{$orders->phone_number}}</span>
        </div>
        <div class="order-item">
            <label for="">Địa chỉ</label>
            <span>: &nbsp; {{$orders->address}}</span>
        </div>
        <div class="order-item">
            <label for="">Ghi Chú</label>
            <span>: &nbsp; {{is_null($orders->note) ?"Không Có":$orders->note }}</span>
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
        @foreach ( $order_details as $key => $order_detail)
        @php
            $total +=($order_detail->price) * $order_detail->quantity
        @endphp
        <tr class="align-middle products">
            <td class="align-middle">{{ $key+=1 }}</td>
            <td class="align-middle">
                <img src="{{ $order_detail->product->image }}" alt="" style="width:80px">
            </td>
            <td class="align-middle text-center">{{  $order_detail->product->name}}</td>
            <td class="align-middle text-center ">{{ $order_detail->quantity }}</td>
            <td class="align-middle text-center product_price">{{  $order_detail->price}}</td>
            <td class="align-middle text-center product_price">{{  ($order_detail->price) * $order_detail->quantity }} </td>
        </tr>
        @endforeach
        <tr class="align-middle products">
            <td colspan="5" class="text-right">Tổng tiền: </td>
            <td class="align-middle text-center product_price">{{ $total}} </td>
        </tr>
        <tr class="align-middle products border-top-0">
            <td colspan="5" class="text-right border-top-0"></td>
            <td class="align-middle text-center border-top-0">
                @if ($orders->status == 0)
                    <a href="/admin/carts/confirmed/{{$orders->id}}" class="btn btn-success btn-sm" >
                        Xác Nhận
                    </a>
                @else
                <a href="#" class="btn btn-secondary btn-sm" >
                    Đã Giao Hàng Thành Công
                </a>
                @endif
            </td>
        </tr>

      </tbody>
    </table>
    </div>
</div>
@endsection

@section('footer')

@endsection


