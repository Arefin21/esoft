<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.menu')}}">All Menu</a></li>
                        <li><a href="{{route('add.menu')}}">Add Menu</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>SubMenu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.subMenu')}}">All SubMenu</a></li>
                        <li><a href="{{route('add.subMenu')}}">Add SubMenu</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.banner')}}">All Banner</a></li>
                        <li><a href="{{route('add.banner')}}">Add Banner</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="{{ route('all.banner') }}" class="">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Banner</span>
                    </a>
                </li> --}}
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>About</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.about')}}">All About</a></li>
                        <li><a href="{{route('add.about')}}">Add About</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Product Gallary</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.product')}}">All Product</a></li>
                        <li><a href="{{route('add.product')}}">Add Product</a></li>
                    </ul>
                </li> 

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>