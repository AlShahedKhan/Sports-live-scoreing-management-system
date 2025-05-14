<aside class="main-sidebar sidebar-dark-primary elevation-4 slimScrollBar" style="overflow-y: scroll;">
    <!-- Brand Logo -->
    <a href="public_scores" class="brand-link">
        <span class="brand-text font-weight-light">খেলা | পাগল</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
            {{-- <div class="image">
                <img src="https://allworldpm.com/wp-content/uploads/2016/10/230x230-avatar-dummy-profile-pic.jpg"
                    class="img-circle elevation-2">
            </div> --}}
            {{-- <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div> --}}
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    {{-- <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a> --}}
                    {{-- <ul class="nav nav-treeview"> --}}
                        <li class="nav-item">
                            <a href="public_scores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ক্রিকেট</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teams.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ফুটবল</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News</p>
                            </a>
                        </li>
                    {{-- </ul> --}}
                </li>

                <li class="nav-header">PROFILE</li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
