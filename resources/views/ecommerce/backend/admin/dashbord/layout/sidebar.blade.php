<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="/admin/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="{{url('/category/list')}}">
                                <i class="fas fa-list"></i>CATEGORY</a>
                        </li>
                        <li>
                            <a href="{{route('coupon.list')}}">
                                <i class="fas fa-tag"></i>COUPON</a>
                        </li>
                        <li>
                            <a href="{{route('size.list')}}">
                                <i class="fas fa-tag"></i>SIZE</a>
                        </li>
                        <li>
                            <a href="{{route('color.list')}}">
                                <i class="fas fa-tag"></i>COLOR</a>
                        </li>
                        <li>
                            <a href="{{route('product.list')}}">
                                <i class="fas fa-product"></i>PRODUCT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>