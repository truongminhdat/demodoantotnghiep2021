<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{url('http://localhost:8000/admin/profile')}}" class="d-block"><img style="width: 50px;height: 50px;border-radius: 50%" src="/upload/user/{{\Illuminate\Support\Facades\Auth::user()->Anhdaidien}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p> Danh Mục Phòng Trọ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.loaiphong')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Danh Sách Loại Phòng Trọ</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                            <a href="{{url('/admin/dangtin')}}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Bài đăng</p>
                            </a>

                </li>
                <li class="nav-item">
                    <a href="/admin/taikhoannguoidung" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Danh sách người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('http://localhost:8000/admin/thongkebieudo')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Thống kê
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.datphong')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Danh sách đặt phòng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.binhluan')}}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>Danh sách bình luận
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('http://localhost:8000/admin/profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Tài khoản admin
                        </p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                            <i class="ti-face-sad"></i>
                            <p class="dn">Đăng xuất</p>
                        </a>


                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
