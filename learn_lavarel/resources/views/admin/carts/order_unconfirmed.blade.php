
@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@endsection

@section('content')
<div class="container mt-3 py-3">
    <table class="table ">
      <thead>
        <tr>
          <th style="width:50px">STT</th>
          <th>Tên khách hàng</th>
          <th class="text-center">Số điện thoại</th>
          <th class="text-center">Email</th>
          <th class="text-center">Ngày Đặt Hàng</th>
          <th class="text-center">Tình Trạng</th>
          <th style="width:100px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ( $orders as $key => $order)
            @if ($order->status == 0)
            <tr class="align-middle products">
                <td class="align-middle">{{ $key+=1 }}</td>
                <td class="align-middle text-center">{{$order->fullname}}</td>
                <td class="align-middle text-center ">{{ $order->phone_number }}</td>
                <td class="align-middle text-center ">{{ $order->email }}</td>
                <td class="align-middle text-center ">{{  \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') }}</td>
                <td class="align-middle text-center ">Chưa Xác Nhận </td>
                <td class="align-middle text-center">
                    <a class="btn btn-primary btn-sm" href="/admin/carts/order_detail/{{$order->id}}">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick = "update({{$order->id}},'/admin/carts/destroy/{{$order->id}}')">
                        <i class="fa-solid fa-trash-can "></i>
                    </a>
                </td>
            </tr>
            @endif
        @endforeach
      </tbody>
    </table>

    {!! $orders->links() !!}
  </div>
@endsection

@section('footer')

@endsection


