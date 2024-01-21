<header>
    <!-- Header Topbar Start -->
    <!-- <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="header-left">
                        <ul>
                            <li>We Provide lifetime support</li>							
                            <li><i class="icofont-ui-touch-phone"></i>+00 0123456789</li>							
                            <li><i class="icofont-envelope"></i>info@finixpro.com</li>
                        </ul>	
                    </div>
                </div>				
                <div class="col-md-3 col-sm-4">
                    <div class="header-right-div">
                        <div class="soical-profile">
                            <ul>
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                <li><a href="#"><i class="icofont-skype"></i></a></li>
                                <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Header Topbar End -->
    <!-- Main Bar Start -->
    <div class="hd-sec">
        <div class="container">
            <div class="row">
                <!-- Logo Start -->
                <div class="col-md-3 col-sm-12 col-xs-8">
                    <div class="logo">
                        <a href="index.html" class="site-logo"><img src="{{asset('frontend/img/logo.png')}}" alt=""/></a>
                        <a href="index.html" class="sticky-logo"><img src="{{asset('frontend/img/logo.png')}}" alt=""/></a>
                    </div>
                </div>	

                @php
                 $menus = App\Models\Menu::all();
                 $submenus = App\Models\Submenu::all();
                @endphp

                <div class="mobile-nav-menu"></div>						
                <div class="col-md-9 col-sm-9 nav-menu">
                    <div class="menu">
                        <nav id="main-menu" class="main-menu">
                            <ul>

                                @foreach($menus as $menu)
                                
                                <li><a href="{{ $menu->url }}">{{ $menu->name }}</a>								

                                @if(count($menu->submenus))

                                    <ul>
                                        
                                        @foreach($menu->submenus as $submenu)
                                        <li><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                                        @endforeach
                                        
                                    </ul>								
                                
                                    @endif
                                </li>												
                               	@endforeach						
                                
                            </ul>
                        </nav>
                    </div>					
                </div>	

            </div>
        </div>
    </div>
    <!-- Main Bar End -->
</header>