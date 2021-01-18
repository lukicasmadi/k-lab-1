<!--  BEGIN TOPBAR  -->
<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ secure_asset('template/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> CORK </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li class="menu single-menu">
                <a href="{{ route('home') }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu single-menu">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Master Data</span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                    <li>
                        <a href="{{ route('category_index') }}"> Category </a>
                    </li>
                    <li>
                        <a href="{{ route('article_index') }}"> Article </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
<!--  END TOPBAR  -->