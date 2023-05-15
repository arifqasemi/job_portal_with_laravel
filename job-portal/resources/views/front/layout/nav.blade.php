<div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">111-222-3333</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                        @if(Auth::guard('company')->check())
                            <li class="menu">
                                <a href="{{ route('company_dashboard') }}">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>

                            @elseif(Auth::guard('candidate')->check())
                            <li class="menu">
                                <a href="{{ route('candidate_dashboard') }}">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>

                            @else
                            <li class="menu">
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            </li>
                            <li class="menu">
                                <a href="{{ route('signup') }}">
                                    <i class="fas fa-user"></i> Sign Up
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-area" id="stickymenu">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{asset('front/uploads/logo.png')}}" alt="" />
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('front/uploads/logo.png')}}" alt="" />
                        </a>
                        <div
                            class="collapse navbar-collapse mean-menu"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ Request::is('/') ? 'active' : ''}}">
                                    <a href="{{route('home')}} " class="nav-link"
                                        >Home</a
                                    >
                                </li>
                                <li class="nav-item {{ Request::is('job/search') ? 'active' : ''}}">
                                    <a href="{{route('job_search')}}" class="nav-link">
                                        Find Jobs</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('company_search')}}" class="nav-link"
                                        >Companies</a
                                    >
                                </li>
                                <li class="nav-item {{Request::is('contact') ? 'active' : ''}}">
                                    <a href="{{route('pricing')}}" class="nav-link"
                                        >Pricing</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item {{Request::is('post') ? 'active' : ''}}">
                                    <a href="{{route('posts')}}" class="nav-link"
                                        >Blog</a
                                    >
                                </li>
                                <li class="nav-item {{Request::is('contact') ? 'active' : ''}}">
                                    <a href="{{route('front.contact')}}" class="nav-link"
                                        >Contact</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>