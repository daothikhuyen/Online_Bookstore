@extends('admin.main')

@section('header')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mt-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Sản Phẩm</span>
                        <span class="info-box-number">
                            {{ $revenues->count() }}
                            <small>sản phẩm</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3 mt-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-ban"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Đơn Huỷ</span>
                        <span class="info-box-number">{{ $cancel_order }} <small>sản phẩm</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3 mt-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Doanh Thu</span>

                        @php
                            $total = 0;
                        @endphp
                        @foreach ($revenues as $revenue)
                            @php
                                $total += $revenue->total_price;

                            @endphp
                        @endforeach
                        <span class="info-box-number product_price">{{ number_format($total, 0, ',', '.') }}&nbsp;₫</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3 mt-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Số Tài Khoản</span>
                        <span class="info-box-number">{{ $number_users->count() }} <small>người dùng</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- /.col (LEFT) -->
                            <div class="col-md-12">

                                <!-- BAR CHART -->
                                <div class="card card-success">

                                    <div class="card-body">
                                        <div class="chart">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="barChart"
                                                style="min-height: 250px; display: block; width: 548px; height: 312px;"
                                                width="685" height="390" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
