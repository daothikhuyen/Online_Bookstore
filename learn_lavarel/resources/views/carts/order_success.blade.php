@extends('main')

@section('content')
    <header>
        @include('header')

        <div class="order-success">
            <div class="container my-5 bg-white">
                <div class="row">
                    <div class="info-order-success col-md-10 offset-md-1">
                        <div class="success-img w-100 text-center">
                            <img src="/template/image/order_success.jpg" alt="" class="w-75">
                        </div>
                        <div class="btn-back">
                            <a href="/" class="d-flex align-items-center "><i class="fa-solid fa-play fa-2xs"></i>&nbsp; Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
@endsection
