
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>BookStore</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng nhập để trải nghiệm được nhiều hơn</p>

            @include('admin.alter')
        <form action="/admin/users/login/store" method="post">
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Nhập email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-7">
                <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                    Không phải Robot
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-5">
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
            </div>
            <!-- /.col -->
            </div>

            @csrf
        </form>
        </div>
        <a href="/admin/users/register" class="text-right pb-2 px-4">Đăng Kí</a>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

    @include('admin.footer')
</body>
</html>
