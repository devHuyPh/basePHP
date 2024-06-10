<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="{{url('')}}"><img src="{{ asset ('assets/admin/img/logo.png')}}" alt></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a class="" href="{{ url('admin') }}" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/dashboard.svg')}}" alt>
                    </div>
                    <span>Dashboard</span>
                </a>
                
            </li>
           
            
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/8.svg')}}" alt>
                    </div>
                    <span>Products</span>
                </a>
                <ul>
                    <li><a href="{{ url('admin/products') }}">List Products</a></li>
                    <li><a href="{{ url('admin/products/create') }}">Add Product</a></li>
                    
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/8.svg')}}" alt>
                    </div>
                    <span>User</span>
                </a>
                <ul>
                    <li><a href="{{ url('admin/users') }}">List User </a></li>
                    <li><a href="{{ url('admin/users/create') }}">Add User</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/9.svg')}}" alt>
                    </div>
                    <span>Category</span>
                </a>
                <ul>
                    <li><a href="{{ url('admin/categories') }}">List Category</a></li>
                    <li><a href="{{ url('admin/categories/create') }}">Add Category</a></li>
                    <li><a href="tilt.html">Tilt Animation</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="{{url('admin/orders')}}" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/10.svg')}}" alt>
                    </div>
                    <span>Order</span>
                </a>
                
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/11.svg')}}" alt>
                    </div>
                    <span>Table</span>
                </a>
                <ul>
                    <li><a href="data_table.html">Data Tables</a></li>
                    <li><a href="bootstrap_table.html">Bootstrap</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/12.svg')}}" alt>
                    </div>
                    <span>Cards</span>
                </a>
                <ul>
                    <li><a href="basic_card.html">Basic Card</a></li>
                    <li><a href="theme_card.html">Theme Card</a></li>
                    <li><a href="dargable_card.html">Draggable Card</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/13.svg')}}" alt>
                    </div>
                    <span>Charts</span>
                </a>
                <ul>
                    <li><a href="chartjs.html">ChartJS</a></li>
                    <li><a href="apex_chart.html">Apex Charts</a></li>
                    <li><a href="chart_sparkline.html">Chart sparkline</a></li>
                    <li><a href="am_chart.html">am-charts</a></li>
                    <li><a href="nvd3_charts.html">nvd3 charts.</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/14.svg')}}" alt>
                    </div>
                    <span>Widgets</span>
                </a>
                <ul>
                    <li><a href="chart_box_1.html">Chart Boxes 1</a></li>
                    <li><a href="profilebox.html">Profile Box</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/15.svg')}}" alt>
                    </div>
                    <span>Maps</span>
                </a>
                <ul>
                    <li><a href="mapjs.html">Maps JS</a></li>
                    <li><a href="vector_map.html">Vector Maps</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('assets/admin/img/menu-icon/16.svg')}}" alt>
                    </div>
                    <span>Pages</span>
                </a>
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="resister.html">Register</a></li>
                    <li><a href="error_400.html">Error 404</a></li>
                    <li><a href="error_500.html">Error 500</a></li>
                    <li><a href="forgot_pass.html">Forgot Password</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                </ul>
            </li>
        </ul>
    </nav>