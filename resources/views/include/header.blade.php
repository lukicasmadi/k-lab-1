<!--  BEGIN NAVBAR  -->
<div class="header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <div class="nav-logo align-self-center">
            <a class="navbar-brand" href="{{ route('dashboard') }}"><img alt="logo" src="{{ secure_asset('img/korlantas.png') }}"> <span class="navbar-brand-name">KORLANTAS POLRI</span></a>
        </div>

        <ul class="navbar-item flex-row mr-auto">

          <!--  BEGIN TOPBAR  -->
            <div class="topbar-nav header navbar" role="banner">
                <nav id="topbar">
                    <ul class="navbar-nav theme-brand flex-row  text-center">
                        <li class="nav-item theme-logo">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ secure_asset('img/logo-korlantas.png') }}" class="navbar-logo" alt="logo">
                            </a>
                        </li>
                        <li class="nav-item theme-text">
                            <a href="{{ route('dashboard') }}" class="nav-link"> {{ env('APP_NAME') }} </a>
                        </li>
                    </ul>

                    <ul class="list-unstyled menu-categories" id="topAccordion">

                        <li class="menu single-menu {{ request()->is('dashboard') ? 'active' : '' }}">
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
                                        <a href="{{ route('report_daily_all_polda') }}"> Rekap Laporan Harian </a>
                                    </li>
                                    <li class="{{ request()->is('report/comparison') ? 'active' : '' }}">
                                        <a href="{{ route('report_comparison') }}"> Laporan Tahunan </a>
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
                                    <span class="tourcolor">Tour Website</span>
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

        </ul>

        <ul class="navbar-item flex-row nav-dropdowns">

            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg id="notification-dot" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30">
                <defs>
                    <clipPath id="clip-path">
                    <rect id="Rectangle_1929" data-name="Rectangle 1929" width="30" height="30" fill="#fff"/>
                    </clipPath>
                </defs>
                <path id="notification_dot" d="M13.362,25.406a2.341,2.341,0,0,1-2.341-2.341H15.7A2.341,2.341,0,0,1,13.362,25.406Zm9.362-3.511H4V19.554l2.341-1.17V11.947A9.438,9.438,0,0,1,7.422,7.2a5.447,5.447,0,0,1,3.6-2.645V2h4.267a5.266,5.266,0,0,0,5.032,8.66c.041.418.061.851.061,1.287v6.437l2.341,1.17v2.341Z" transform="translate(1.635 1.297)" fill="#fff"/>
                <path id="notification_dot-2" data-name="notification_dot" d="M19.214,9.022a3.511,3.511,0,1,1,.8-.09A3.551,3.551,0,0,1,19.214,9.022Z" transform="translate(1.635 1.297)" fill="#ea1c26"/>
                </svg>
                <span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">

                        <div class="dropdown-item">
                            <div class="media server-log">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Server Rebooted</h6>
                                        <p class="">45 min ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Licence Expiring Soon</h6>
                                        <p class="">8 hrs ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media file-upload">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Kelly Portfolio.pdf</h6>
                                        <p class="">670 kb</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        @php
                            if(!empty(auth()->user())) {
                                $user = App\Models\User::whereId(myUserId())->first();
                                echo '<div class="media-body align-self-center" style="margin-right: 10px;"><h6><span>Hi,</span> '.$user->name.'</h6></div>';
                                if(empty($user->avatar)) {
                                    echo "<img src='".secure_asset('img/profile/default.jpg')."' class='img-fluid' alt='admin-profile' />";
                                } else {
                                    echo "<img src='".secure_asset('storage/upload/profile/'.$user->avatar)."' class='img-fluid' alt='admin-profile' />";
                                }
                            }
                        @endphp
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                    <div class="">

                        <div class="dropdown-item">
                            <a class="active" href="{{ route('profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profile
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route('change_password') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                                Change Password
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                {{ __('Sign Out') }}
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
<!--  END NAVBAR  -->