<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'bg-primary' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'bg-primary' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('mahasiswa/createMahasiswa') || Request::is('mahasiswa/readMahasiswa') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('mahasiswa/createMahasiswa') || Request::is('mahasiswa/readMahasiswa') ? 'bg-primary' : '' }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        {{ __('Mahasiswa') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('create.mahasiswa') }}" class="nav-link {{ Request::is('mahasiswa/createMahasiswa') ? 'active' : '' }}">
                            <i class="far fa-edit nav-icon ml-2 "></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('read.mahasiswa') }}" class="nav-link {{ Request::is('mahasiswa/readMahasiswa') ? 'active' : '' }}">
                            <i class="fas fa-table nav-icon ml-2"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('dosen/createDosen') || Request::is('dosen/readDosen') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('dosen/createDosen') || Request::is('dosen/readDosen') ? 'bg-primary' : '' }}">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        {{ __('Dosen') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('create.dosen') }}" class="nav-link {{ Request::is('dosen/createDosen') ? 'active' : '' }}">
                            <i class="far fa-edit nav-icon ml-2 "></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('read.dosen') }}" class="nav-link {{ Request::is('dosen/readDosen') ? 'active' : '' }}">
                            <i class="fas fa-table nav-icon ml-2"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('mata_kuliah/createMataKuliah') || Request::is('mata_kuliah/readMataKuliah') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('mata_kuliah/createMataKuliah') || Request::is('mata_kuliah/readMataKuliah') ? 'bg-primary' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Mata Kuliah') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('create.mata_kuliah') }}" class="nav-link {{ Request::is('mata_kuliah/createMataKuliah') ? 'active' : '' }}">
                            <i class="far fa-edit nav-icon ml-2"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('read.mata_kuliah') }}" class="nav-link {{ Request::is('mata_kuliah/readMataKuliah') ? 'active' : '' }}">
                            <i class="fas fa-table nav-icon ml-2"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link {{ Request::is('about') ? 'bg-primary' : '' }}">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->