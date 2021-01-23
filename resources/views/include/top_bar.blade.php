<!--  BEGIN TOPBAR  -->
<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ secure_asset('img/logo-korlantas.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> {{ env('APP_NAME') }} </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li id="menuDashboard" class="menu single-menu {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu single-menu {{ request()->is('admin/category') || request()->is('admin/article') || request()->is('admin/polda') ? 'active' : '' }}">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Master Data</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                    <li class="{{ request()->is('admin/category/*') || request()->is('admin/category') ? 'active' : '' }}">
                        <a href="{{ route('category_index') }}"> Category </a>
                    </li>
                    <li class="{{ request()->is('admin/article/*') || request()->is('admin/article') ? 'active' : '' }}">
                        <a href="{{ route('article_index') }}"> Article </a>
                    </li>
                    <li class="{{ request()->is('admin/polda/*') || request()->is('admin/polda') ? 'active' : '' }}">
                        <a href="{{ route('polda_index') }}"> Polda </a>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu {{ request()->is('admin/operasi/*') ? 'active' : '' }}">
                <a href="#operation" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        <span>Operation</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="operation" data-parent="#topAccordion">
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> List and Create Operation </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> Create Operation </a>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu {{ request()->is('admin/operasi/*') ? 'active' : '' }}">
                <a href="#reportpusat" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        <span>Admin Reporting</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="reportpusat" data-parent="#topAccordion">
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> This Week </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> This Month </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Date </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Date Range </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Polda </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Status </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Filter Week </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Filter Month </a>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu {{ request()->is('admin/operasi/*') ? 'active' : '' }}">
                <a href="#reportpolda" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></svg>
                        <span>Reporting</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="reportpolda" data-parent="#topAccordion">
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Date </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Date Range </a>
                    </li>
                    <li class="{{ request()->is('admin/rencana-operasi') ? 'active' : '' }}">
                        <a href="{{ route('rencana_operasi_index') }}"> By Month </a>
                    </li>
                </ul>
            </li>

            <li id="menuAcl" class="menu single-menu {{ request()->is('/acl') ? 'active' : '' }}">
                <a href="#acl" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>ACL</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="acl" data-parent="#topAccordion">
                    <li class="{{ request()->is('admin/acl/role') || request()->is('admin/acl/role/*') ? 'active' : '' }}">
                        <a href="{{ route('role_index') }}"> Manage Role </a>
                    </li>
                    <li class="{{ request()->is('admin/acl/permission') || request()->is('admin/acl/permission/*') ? 'active' : '' }}">
                        <a href="{{ route('permission_index') }}"> Manage Permission </a>
                    </li>
                    <li class="{{ request()->is('admin/acl/user-has-role') || request()->is('admin/acl/user-has-role/*') ? 'active' : '' }}">
                        <a href="{{ route('user_to_role_index') }}"> Attach User To Role </a>
                    </li>
                    <li class="{{ request()->is('admin/acl/user/*') || request()->is('admin/acl/user') ? 'active' : '' }}">
                        <a href="{{ route('polda_index') }}"> Manage User </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
<!--  END TOPBAR  -->