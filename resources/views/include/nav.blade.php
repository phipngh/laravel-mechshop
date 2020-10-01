<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->


                            <li class="language">
                                <a href="#">
                                    English

                                </a>
                            </li>

                            @if(Auth::check())
                                @if(Auth::user()->admin == 1){
                                        <li class="account">
                                            <a href="#">
                                                {{Auth::user()->name}}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="account_selection">
                                                <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Management</a></li>
                                                <li>
                                                    <form action="{{route('logout')}}" method="POST" id="logout-form"  >@csrf </form>
                                                        <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a>

                                                </li>
                                            </ul>
                                        </li>
                                    }
                                    @else
                                        <li class="account">
                                            <a href="#">
                                                {{Auth::user()->name}}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="account_selection">

                                                <li>
                                                    <form action="{{route('logout')}}" method="POST" id="logout-form"  >@csrf </form>
                                                    <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a>

                                                </li>
                                            </ul>
                                        </li>
                                @endif

                            @else
                            <li class="account">
                                <a href="#">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    <li><a href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                    <li><a href="{{url('/register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                </ul>
                            </li>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">Mech<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="#">home</a></li>
                            <li><a href="#">keyboard</a></li>
                            <li><a href="#">keycap</a></li>
                            <li><a href="#">accessories</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                        <ul class="navbar_user">
                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>

                            <li class="checkout">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">2</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item has-children">
                <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="#">home</a></li>
            <li class="menu_item"><a href="#">keyboard</a></li>
            <li class="menu_item"><a href="#">accessories</a></li>
            <li class="menu_item"><a href="#">accessories</a></li>
            <li class="menu_item"><a href="#">contact</a></li>
        </ul>
    </div>
</div>
