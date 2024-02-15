
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
          <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>
  <!-- /.navbar -->
        @include('admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content mt-2">
                <div class="container-fluid">

                    @include('admin.alter')
                    <div class="row">
                    <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{$title }}</h3>
                                </div>

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    @include('admin.footer')

</body>
</html>
