<header class="header">
    <div class="header-information">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-10 logo-part align-self-center">
                    <a class="brand" href="{{ home_url('/') }}">
                        <img src="{{Wappz\Assets\asset_path('images/logo.svg')}}"/>
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 col-sm-5 d-md-flex d-none social-wrapper align-self-center justify-content-end">
                    {{--<div class="language-switcher align-self-center">--}}
						{{--<?php language_selector_flags()?>--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-2 col-2 d-lg-none d-md-none d-flex align-self-center justify-content-end">
                    <div class="mobile-hamburger">
                        <svg class="mobilemenubutton" fill="#000000" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                             viewBox="0 0 100 100"
                             style="enable-background:new 0 0 100 100;" xml:space="preserve">
                            <g>
                                <path d="M10,26h80c0.6,0,1-0.4,1-1s-0.4-1-1-1H10c-0.6,0-1,0.4-1,1S9.4,26,10,26z"/>
                                <path d="M90,49H10c-0.6,0-1,0.4-1,1s0.4,1,1,1h80c0.6,0,1-0.4,1-1S90.6,49,90,49z"/>
                                <path d="M90,74H10c-0.6,0-1,0.4-1,1s0.4,1,1,1h80c0.6,0,1-0.4,1-1S90.6,74,90,74z"/>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-navigation d-none d-md-block d-lg-block d-xl-block ">
        <div class="container">
            <nav class="nav-primary d-md-flex mx-auto">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav mx-auto', 'container' => false]) !!}
                @endif
            </nav>
        </div>
    </div>
</header>
