<!--  BEGIN TOPBAR  -->
<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ asset('img/logo-korlantas.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('dashboard') }}" class="nav-link"> {{ env('APP_NAME') }} </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li class="menu single-menu {{
                request()->is('/dashboard') ? 'active' : ''
                }}">
                <a href="{{ route('dashboard') }}">
                    <div>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            @hasanyrole('administrator|access_daerah|access_pusat')
            <li class="menu single-menu {{
                request()->is('operation-plan') ||
                request()->is('operation-plan/*') ||
                request()->is('operation-onsite') ||
                request()->is('operation-onsite/*')
                ? 'active' : ''
                }}">
                <a href="#operation" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <span>Rencana Operasi</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="operation" data-parent="#topAccordion">
                    @role('access_pusat|administrator')
                        <li class="{{ request()->is('operation-plan') || request()->is('operation-plan/*') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Buat Rencana Operasi </a>
                        </li>
                    @endrole

                    @role('access_daerah|administrator')
                        <li class="{{ request()->is('operation-onsite') || request()->is('operation-onsite/*') ? 'active' : '' }}">
                            <a href="{{ route('phro_index') }}"> Laporan Operasi </a>
                        </li>
                    @endrole
                </ul>
            </li>
            @endhasanyrole

            @role('access_pusat|administrator')
                <li class="menu single-menu {{
                    request()->is('operasi/*') ? 'active' : ''
                    }}">
                    <a href="#reportpusat" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div>
                            <span>Laporan</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="reportpusat" data-parent="#topAccordion">
                        <li class="{{ request()->is('rencana-operasi') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Filter Tanggal </a>
                        </li>
                        <li class="{{ request()->is('rencana-operasi') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Filter Bulan </a>
                        </li>
                        <li class="{{ request()->is('rencana-operasi') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Filter Polda </a>
                        </li>
                    </ul>
                </li>
            @endrole

            @role('access_daerah')
                <li class="menu single-menu {{
                    request()->is('operasi/*') ? 'active' : ''
                    }}">
                    <a href="#reportpusat" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div>
                            <span>Laporan</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="reportpusat" data-parent="#topAccordion">
                        <li class="{{ request()->is('rencana-operasi') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Filter Tanggal </a>
                        </li>
                        <li class="{{ request()->is('rencana-operasi') ? 'active' : '' }}">
                            <a href="{{ route('rencana_operasi_index') }}"> Filter Bulan </a>
                        </li>
                    </ul>
                </li>
            @endrole

            @role('administrator|access_daerah|access_pusat')
                <li class="menu single-menu {{
                        request()->is('category') ||
                        request()->is('category/*') ||
                        request()->is('article') ||
                        request()->is('article/*') ||
                        request()->is('polda') ||
                        request()->is('polda/*') ||
                        request()->is('unit') ||
                        request()->is('unit/*') ||
                        request()->is('violation') ||
                        request()->is('violation/*')
                        ? 'active' : ''
                    }}">
                    <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div class="">
                            <span>Manajemen Data</span>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                        <li class="{{ request()->is('category/*') || request()->is('category') ? 'active' : '' }}">
                            <a href="{{ route('category_index') }}"> Master Kategori Artikel </a>
                        </li>
                        <li class="{{ request()->is('article/*') || request()->is('article') ? 'active' : '' }}">
                            <a href="{{ route('article_index') }}"> Master Artikel </a>
                        </li>
                        <li class="{{ request()->is('polda/*') || request()->is('polda') ? 'active' : '' }}">
                            <a href="{{ route('polda_index') }}"> Master Polda </a>
                        </li>
                        <li class="{{ request()->is('unit/*') || request()->is('unit') ? 'active' : '' }}">
                            <a href="{{ route('unit_index') }}"> Master Kesatuan </a>
                        </li>
                        <li class="{{ request()->is('violation/*') || request()->is('violation') ? 'active' : '' }}">
                            <a href="{{ route('violation_index') }}"> Master Pelanggaran </a>
                        </li>
                    </ul>
                </li>
            @endrole

            <li class="menu single-menu">
                <a href="{{ route('dashboard') }}">
                    <div>
                        <span>Tour Website</span>
                    </div>
                </a>
            </li>

            @role('administrator')
                <li class="menu single-menu {{
                    request()->is('access/*') ? 'active' : ''
                    }}">
                    <a href="#acl" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                            <span>Akses</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="acl" data-parent="#topAccordion">
                        <li class="{{ request()->is('access/role') || request()->is('access/role/*') ? 'active' : '' }}">
                            <a href="{{ route('role_index') }}"> Manajement Role </a>
                        </li>
                        <li class="{{ request()->is('access/permission') || request()->is('access/permission/*') ? 'active' : '' }}">
                            <a href="{{ route('permission_index') }}"> Manajement Permission </a>
                        </li>
                        <li class="{{ request()->is('access/permission-to-role') || request()->is('access/permission-to-role/*') ? 'active' : '' }}">
                            <a href="{{ route('permission_to_role_index') }}"> Attach Permission To Role </a>
                        </li>
                        <li class="{{ request()->is('access/user-to-role') || request()->is('access/user-to-role/*') ? 'active' : '' }}">
                            <a href="{{ route('user_to_role_index') }}"> Attach User To Role </a>
                        </li>
                        <li class="{{ request()->is('access/user/*') || request()->is('access/user') ? 'active' : '' }}">
                            <a href="{{ route('user_index') }}"> Manajement User </a>
                        </li>
                        <li class="{{ request()->is('access/polda/*') || request()->is('access/polda') ? 'active' : '' }}">
                            <a href="{{ route('polda_access_index') }}"> Akses Polda </a>
                        </li>
                    </ul>
                </li>
            @endrole

        </ul>
    </nav>
</div>
<!--  END TOPBAR  -->