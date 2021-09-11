@section('sidebar')
<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <!--        <div class="image">
                            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>-->
    <div class="info">
        <?php
        if (auth()->user()->name == null) {
            header("Location: /");
            die();
        }
        ?>
        <a href="#" class="d-block">Welcome, {{ auth()->user()->name }}!</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Dashboards
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Main dashboard</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Graduate
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/graduate_registration') }}" class="nav-link {{ Request::is('graduate_registration') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Graduate Registration</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/registered_graduates') }}" class="nav-link {{ Request::is('registered_graduates') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Registered Graduates</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pending_graduates') }}" class="nav-link {{ Request::is('pending_graduates') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Pending Graduates</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Vacancy
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/vacancy') }}" class="nav-link {{ Request::is('vacancy') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Vacancy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vacancy_status') }}" class="nav-link {{ Request::is('vacancy_status') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Vacancy Status</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/all_adds_view') }}" class="nav-link {{ Request::is('all_adds_view') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>All Adds</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Notification
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/sms_management') }}" class="nav-link {{ Request::is('sms_management') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Send Individual SMS</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/graduate_report') }}" class="nav-link">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Graduate Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/sms_report') }}" class="nav-link">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>SMS Report</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('/sector_service_cat') }}" class="nav-link {{ Request::is('sector_service_cat') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Sectors/Service Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/university') }}" class="nav-link {{ Request::is('university') ? 'active' : '' }}">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>University</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Users
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('#') }}" class="nav-link {{ Request::is('#') ? 'active' : '' }}">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Create User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('#') }}" class="nav-link {{ Request::is('#') ? 'active' : '' }}">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Create Role</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</nav>
<!-- /.sidebar-menu -->

@endsection