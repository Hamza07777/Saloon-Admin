<!-- Page Sidebar Start-->
    <nav-menus></nav-menus>
    <header class="main-nav null" style="margin-top: -11px;">
        <nav>
            <div class="main-navbar">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="mainnav">
                    <ul class="nav-menu custom-scrollbar">
                        <li class="back-btn">
                            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                        </li>

                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('categories.index') }}"><i data-feather="grid"> </i><span>Categories</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('services.index') }}"><i data-feather="box"> </i><span>Services</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('product.index') }}"><i data-feather="box"> </i><span>Brands</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('raw-companies') }}"><i data-feather="home"> </i><span>Raw Company</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('change_password_view') }}"><i data-feather="lock"> </i><span>Change Password</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('purpose_service.index') }}"><i data-feather="box"> </i><span>Propose Services</span></a></li>
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('purpose_brand.index') }}"><i data-feather="box"> </i><span>Propose Brands</span></a></li>


                        
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
        </nav>
    </header>

    <!-- Page Sidebar Ends-->
