<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>BookStore</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Đăng Kí Tài Khoản</p>

                @include('admin.alter')
                <form action="/admin/users/register/store" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nhập Họ Và tên">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="current_password" placeholder="Nhập Lại Mật Khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="remember" value="agree">
                                <label for="agreeTerms">
                                    Tôi đồng ý <a href="#">điều khoản</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Kí</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    @csrf
                </form>

                <div class="social-auth-links text-center">
                    <p>- Hoặc -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Đăng kí với Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Đăng kí với Google+
                    </a>
                </div>

                <a href="/admin/users/login" class="text-center float-right">Đăng Nhập</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    @include('admin.footer')
</body>

</html>
