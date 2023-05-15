<div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.html"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="{{Request::is('admin') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_home')}}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

                    <li class="nav-item dropdown {{Request::is('setting_page') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Setting page</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('setting_page') ? 'active' : ''}}"><a class="nav-link" href="{{route('setting_page')}}"><i class="fas fa-angle-right"></i>Home</a></li>
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Terms</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{Request::is('job_category') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Category</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('job_category') ? 'active' : ''}}"><a class="nav-link" href="{{route('job_category')}}"><i class="fas fa-angle-right"></i>Categories</a></li>
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>locations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{Request::is('testimonial') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Testimonial</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('testimonial') ? 'active' : ''}}"><a class="nav-link" href="{{route('testimonial')}}"><i class="fas fa-angle-right"></i>testimonials</a></li>
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>testimonials</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown {{Request::is('post') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Post</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('post') ? 'active' : ''}}"><a class="nav-link" href="{{route('post')}}"><i class="fas fa-angle-right"></i>Posts</a></li>
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>posts</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown {{Request::is('contact') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Contact</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('contact') ? 'active' : ''}}"><a class="nav-link" href=""><i class="fas fa-angle-right"></i>contacts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{Request::is('package') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Packages</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('package') ? 'active' : ''}}"><a class="nav-link" href="{{route('package')}}"><i class="fas fa-angle-right"></i>package</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{Request::is('job_loaction') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job </span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('job_loaction') ? 'active' : ''}}"><a class="nav-link" href="{{route('job_location')}}"><i class="fas fa-angle-right"></i>Job Locations</a></li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('job_type') ? 'active' : ''}}"><a class="nav-link" href="{{route('job_type')}}"><i class="fas fa-angle-right"></i>Job Type</a></li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('job_expereince') ? 'active' : ''}}"><a class="nav-link" href="{{route('job_expereince')}}"><i class="fas fa-angle-right"></i>Job Expereince</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{Request::is('company_location') ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Company Section</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('company_location') ? 'active' : ''}}"><a class="nav-link" href="{{route('company_location')}}"><i class="fas fa-angle-right"></i>Company Locations</a></li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li class="{{Request::is('company_industry') ? 'active' : ''}}"><a class="nav-link" href="{{route('company_industry')}}"><i class="fas fa-angle-right"></i>Company Industry</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>