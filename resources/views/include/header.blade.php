<!--  BEGIN NAVBAR  -->
<div class="header-container layout-px-menu">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <div class="nav-logo align-self-center">
            <a class="navbar-brand" href="{{ route('dashboard') }}"><img alt="logo" src="{{ asset('img/korlantas.png') }}"> <span class="navbar-brand-name">SISLAPOPS KORLANTAS POLRI</span></a>
        </div>

        <ul class="navbar-item flex-row mr-auto"></ul>

        <ul class="navbar-item flex-row nav-dropdowns">

            <div class="topbar-nav header navbar" role="banner">
                <nav id="topbar">
                    <ul class="navbar-nav theme-brand flex-row  text-center">
                        <li class="nav-item theme-logo">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('img/logo-korlantas.png') }}" class="navbar-logo" alt="logo">
                            </a>
                        </li>
                        <li class="nav-item theme-text">
                            <a href="{{ route('dashboard') }}" class="nav-link"> {{ env('APP_NAME') }} </a>
                        </li>
                    </ul>

                    <ul class="list-unstyled menu-categories" id="topAccordion">

                        <li class="menu single-menu {{ request()->is('dashboard') || request()->is('polda-data/*') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <div>
                                    <span>Beranda</span>
                                </div>
                            </a>
                        </li>

                        @role('access_pusat|administrator')
                            <!-- <li class="menu single-menu {{ request()->is('statistics') || request()->is('statistics/*') ? 'active' : '' }}">
                                <a href="{{ route('statistics_index') }}">
                                    <div>
                                        <span>Data Statistik</span>
                                    </div>
                                </a>
                            </li> -->

                            <li class="menu single-menu {{
                                request()->is('operation-plan') ||
                                request()->is('operation-plan/*') ||
                                request()->is('operation-onsite') ||
                                request()->is('operation-onsite/*')
                                ? 'active' : ''
                                }}">
                                <a href="{{ route('rencana_operasi_index') }}">
                                    <div>
                                        <span>Rencana Operasi</span>
                                    </div>
                                </a>
                            </li>

                            <li class="menu single-menu {{
                                request()->is('report/*') ? 'active' : ''
                                }}">
                                <a href="#reportpusat" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                                    <div>
                                        <span>Laporan</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </a>
                                <ul class="collapse submenu list-unstyled" id="reportpusat" data-parent="#topAccordion">
                                    <li class="{{ request()->is('report/daily') ? 'active' : '' }}">
                                        <a href="{{ route('report_daily_all_polda') }}"> Laporan Rekap Harian </a>
                                    </li>
                                    <li class="{{ request()->is('report/anev-compare') ? 'active' : '' }}">
                                        <a href="{{ route('report_comparison') }}"> Laporan Anev </a>
                                    </li>
                                    <li class="{{ request()->is('report/anev-date-compare') ? 'active' : '' }}">
                                        <a href="{{ route('report_anev_daily') }}"> Laporan Anev Harian </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole

                        @role('access_daerah')
                            <li class="menu single-menu {{ request()->is('custom-name') ? 'active' : '' }}">
                                <a href="{{ route('polda_custom_name') }}">
                                    <div>
                                        <span>RENCANA OPERASI</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu single-menu {{
                                request()->is('report/*') || request()->is('operation-onsite') || request()->is('operation-onsite/*') ? 'active' : ''
                                }}">
                                <a href="#reportpusat" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                                    <div>
                                        <span>Laporan</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </a>
                                <ul class="collapse submenu list-unstyled" id="reportpusat" data-parent="#topAccordion">
                                    <li class="{{ request()->is('operation-onsite') || request()->is('operation-onsite/*') ? 'active' : '' }}">
                                        <a href="{{ route('phro_index') }}"> Laporan Operasi </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole

                        @role('administrator|access_pusat')
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
                                    <li class="{{ request()->is('article/*') || request()->is('article') ? 'active' : '' }}">
                                        <a href="{{ route('article_index') }}"> Master Artikel </a>
                                    </li>
                                    <li class="{{ request()->is('polda/*') || request()->is('polda') ? 'active' : '' }}">
                                        <a href="{{ route('polda_index') }}"> Master Polda </a>
                                    </li>
                                    {{-- <li class="{{ request()->is('unit/*') || request()->is('unit') ? 'active' : '' }}">
                                        <a href="{{ route('unit_index') }}"> Master Kesatuan </a>
                                    </li> --}}
                                    {{-- <li class="{{ request()->is('violation/*') || request()->is('violation') ? 'active' : '' }}">
                                        <a href="{{ route('violation_index') }}"> Master Pelanggaran </a>
                                    </li> --}}
                                </ul>
                            </li>
                        @endrole

                        <li class="menu single-menu">
                            <a href="{{ route('dashboard') }}">
                                <div>
                                    <span class="tourcolor">Panduan Web</span>
                                </div>
                            </a>
                        </li>

                        @role('administrator')
                            <li class="menu single-menu {{
                                request()->is('access/*') ? 'active' : ''
                                }}">
                                <a href="#acl" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                                    <div>
                                        <span>Akses</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </a>
                                <ul class="collapse submenu list-unstyled" id="acl" data-parent="#topAccordion">
                                    <li class="{{ request()->is('access/role') || request()->is('access/role/*') ? 'active' : '' }}">
                                        <a href="{{ route('role_index') }}"> Manajemen Role </a>
                                    </li>
                                    <li class="{{ request()->is('access/permission') || request()->is('access/permission/*') ? 'active' : '' }}">
                                        <a href="{{ route('permission_index') }}"> Manajemen Permission </a>
                                    </li>
                                    <li class="{{ request()->is('access/permission-to-role') || request()->is('access/permission-to-role/*') ? 'active' : '' }}">
                                        <a href="{{ route('permission_to_role_index') }}"> Attach Permission To Role </a>
                                    </li>
                                    <li class="{{ request()->is('access/user-to-role') || request()->is('access/user-to-role/*') ? 'active' : '' }}">
                                        <a href="{{ route('user_to_role_index') }}"> Attach User To Role </a>
                                    </li>
                                    <li class="{{ request()->is('access/user/*') || request()->is('access/user') ? 'active' : '' }}">
                                        <a href="{{ route('user_index') }}"> Manajemen User </a>
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

            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg style="margin-right: 33px; position: absolute;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                <div class="media">
                        @php
                            if(!empty(auth()->user())) {
                                $user = App\Models\User::whereId(myUserId())->first();

                                if(empty($user->profile) || is_null($user->profile)) {
                                    echo '<div class="media-body align-self-center" style="margin-right: 35px;"><h6><span>Hi,</span> '.$user->name.'</h6></div>';
                                } else {
                                    echo '<div class="media-body align-self-center" style="margin-right: 35px;"><h6><span>Hi,</span> '.$user->profile.'</h6></div>';
                                }

                                if(isAdmin()) {
                                    if(empty($user->avatar)) {
                                        echo "<img src='".asset('img/profile/default.jpg')."' class='img-fluid' alt='admin-profile' />";
                                    } else {
                                        echo "<img src='".asset('storage/upload/profile/'.$user->avatar)."' class='img-fluid' alt='admin-profile' />";
                                    }
                                }

                                if(isPusat()) {
                                    echo "<img src='".asset('img/polda/mabes.png')."' class='img-fluid' alt='admin-profile' />";
                                }

                                if(isPolda()) {
                                    echo "<img src='".asset('img/polda/'.poldaImage()->polda->logo)."' class='img-fluid' alt='admin-profile' />";
                                }
                            }
                        @endphp
                    </div>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                    <div class="row">

                        <div class="dropdown-item">
                            <a class="active" href="{{ route('profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profil
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route('change_password') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                                Ubah Password
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Keluar
                            </a>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>
<div class="layout-px-spacing">
    <div class="page-header">
        @stack('page_title')
        <div class="toggle-switch">
            <label class="switch s-icons s-outline  s-outline-secondary">
                <input type="checkbox" checked="" class="theme-shifter" id="changeTheme">
                <span class="slider round">
                    <svg class="feather feather-sun" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    <svg class="feather feather-moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </span>
            </label>
        </div>
    </div>
</div>

@push('page_js')
<script>
$(document).ready(function () {
    $('#changeTheme').click(function() {
        alert("Fitur ini masih dalam tahap pengembangan")
    })
})
</script>
@endpush