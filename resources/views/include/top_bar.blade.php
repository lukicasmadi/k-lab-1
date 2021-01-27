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

            <li class="menu single-menu {{
                request()->is('admin/category') ||
                request()->is('admin/category/*') ||
                request()->is('admin/article') ||
                request()->is('admin/article/*') ||
                request()->is('admin/polda') ||
                request()->is('admin/polda/*') ||
                request()->is('admin/unit') ||
                request()->is('admin/unit/*') ||
                request()->is('admin/violation') ||
                request()->is('admin/violation/*')
                ? 'active' : ''
            }}">
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
                    <li class="{{ request()->is('admin/unit/*') || request()->is('admin/unit') ? 'active' : '' }}">
                        <a href="{{ route('unit_index') }}"> Unit </a>
                    </li>
                    <li class="{{ request()->is('admin/violation/*') || request()->is('admin/violation') ? 'active' : '' }}">
                        <a href="{{ route('violation_index') }}"> Violation </a>
                    </li>
                </ul>
            </li>

            <li class="menu single-menu {{ request()->is('admin/operasi/*') ? 'active' : '' }}">
                <a href="#operation" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
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
                        <span>Access Control</span>
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
                        <a href="{{ route('user_index') }}"> Manage User </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
<!--  END TOPBAR  -->