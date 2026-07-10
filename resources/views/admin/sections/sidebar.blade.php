<!-- Main Sidebar Container -->
<aside class="bg-danger p-3 sticky-top" style="width: 15%; height:91vh;">

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesom e or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('show-services') }}" class="nav-link text-white">
                        <i class="bi bi-cpu-fill"></i>Services</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('device-type-index') }}" class="nav-link text-white">
                        <i class="bi bi-cpu-fill"></i> Device Type</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('modal-index') }}" class="nav-link text-white"><i
                            class="bi bi-x-diamond-fill"></i> Model</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('repair-index') }}" class="nav-link text-white"><i class="bi bi-arrow-repeat"></i>
                        Repair</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settingsV') }}" class="nav-link text-white"><i class="bi bi-gear-fill"></i> Site
                        Setting</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('addressV') }}" class="nav-link text-white"><i class="bi bi-geo-alt-fill"></i>
                        Addresses</a>
                <li class="nav-item">
                    <a href="{{ '/blog/view' }}" class="nav-link text-white"><i class="bi bi-flower2"></i> Blogs</a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="{{ route('landing.s1V') }}" class="nav-link text-white"><i class="bi bi-kanban-fill"></i>
                        Landing Page
                        Management</a>
                <li class="nav-item">
                    {{-- <a href="{{ route('blogs.view') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Blogs
                    </p>
                </a> --}}
                </li>
                <li class="nav-item">
                    <a href="{{ route('policy-terms-and-conditon') }}" class="nav-link text-white"><i
                            class="bi bi-arrow-repeat"></i>Terms/Policy</a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
