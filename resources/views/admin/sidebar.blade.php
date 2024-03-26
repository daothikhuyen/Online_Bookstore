<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link ">
        <img src="/template/image/logo_green.png" alt="AdminLTE Logo" class="bg-white"
            style="opacity: .8">
        <span class="brand-text font-weight-light">

        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Session::get('user')->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-list"></i>

                        <p>
                            Danh Mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Danh Mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Danh Mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="fa-solid fa-shop"></i>
                        <p>
                            Sản Phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="fa-solid fa-image"></i>
                        <p>
                            Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class='bx bxs-discount'></i>
                        <p>
                            Khuyến Mãi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/promote/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/promote/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách khuyến mãi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="fa-solid fa-truck-fast"></i>
                        <p>
                            Đơn Hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/carts/order_unconfirmed" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chưa Xác Nhận</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/carts/order_confirmed" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đã Giao</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/carts/order_cancel" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đã Huỷ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/comment" class="nav-link">
                        <i class="fa-solid fa-comments"></i>
                        <p>Quản Lí Bình Luận</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/account" class="nav-link">
                        <i class="fa-solid fa-comments"></i>
                        <p>Quản Lí Tài Khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/revenue" class="nav-link">

                        <i class="fa-solid fa-chart-simple"></i>
                        <p>
                            Doanh Thu

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="/admin/logout" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Đăng Xuất</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
