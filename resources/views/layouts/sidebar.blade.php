
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('dist/img/avatar.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Rencar Mobil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar.png')}}" class="img-circle elevation-5" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-circle-o"></i>
                        <p>
                        MASTER
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('car.index') }} " class="nav-link {{($menu==1 ? 'active' : '')}}">
                                <i class="fa fa-car nav-icon"></i>
                                <p>Data Cars</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('brand.index') }} " class="nav-link {{($menu==2 ? 'active' : '')}}">
                                <i class="fa fa-database nav-icon"></i>
                                <p>Data Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('employee.index') }} " class="nav-link {{($menu==3 ? 'active' : '')}}">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Data Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('client.index') }} " class="nav-link {{($menu==4 ? 'active' : '')}}">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Data Clients</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>
                            TRANSACTION
                            <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=" {{ route('booking.index') }} " class="nav-link {{($menu==5 ? 'active' : '')}}">
                                    <i class="fa fa-book nav-icon"></i>
                                    <p>Bookings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" {{ route('returns.index') }} " class="nav-link {{($menu==6 ? 'active' : '')}}">
                                    <i class="fa fa-dollar nav-icon"></i>
                                    <p>Returns</p>
                                </a>
                            </li>
                        </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>
                            REPORT
                            <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=" {{ url('reports/transaction') }} " class="nav-link {{($menu==7 ? 'active' : '')}}">
                                    <i class="fa fa-book nav-icon"></i>
                                    <p>Transaction</p>
                                </a>
                            </li>
                        </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
        <!-- /.sidebar -->




</aside>