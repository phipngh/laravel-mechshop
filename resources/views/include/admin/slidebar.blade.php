<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Admin</li>

            <li class="nav-item">
                <a href="{{route('adminDashboard')}}" class="nav-link font-weight-bold {{Route::currentRouteName() == 'adminDashboard' ? 'active' : ''}}">
                    <i class="icon icon-chart"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('adminCatelogies')}}" class="nav-link font-weight-bold {{Route::currentRouteName() == 'adminCatelogies' ? 'active' : ''}}">
                    <i class="icon icon-book-open"></i> Catelogies
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('adminBrands')}}" class="nav-link font-weight-bold {{Route::currentRouteName() == 'adminBrands' ? 'active' : ''}}">
                    <i class="icon icon-umbrella"></i> Brands
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('adminProducts')}}" class="nav-link font-weight-bold {{Route::currentRouteName() == 'adminProducts' ? 'active' : ''}}">
                    <i class="icon icon-bag"></i> Products
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('adminUsers')}}" class="nav-link font-weight-bold {{Route::currentRouteName() == 'adminUsers' ? 'active' : ''}}">
                    <i class="icon icon-people"></i> Users
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-energy"></i> UI Kits <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <i class="icon icon-energy"></i> Alerts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="buttons.html" class="nav-link">
                            <i class="icon icon-energy"></i> Buttons
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="cards.html" class="nav-link">
                            <i class="icon icon-energy"></i> Cards
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="modals.html" class="nav-link">
                            <i class="icon icon-energy"></i> Modals
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="tabs.html" class="nav-link">
                            <i class="icon icon-energy"></i> Tabs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="progress-bars.html" class="nav-link">
                            <i class="icon icon-energy"></i> Progress Bars
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="widgets.html" class="nav-link">
                            <i class="icon icon-energy"></i> Widgets
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
