<div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item {{Request::is('company_dashboard')?'active':''}}">
                                    <a href="{{route('company_dashboard')}}"
                                        >Dashboard</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('company_payment')?'active':''}}">
                                    <a href="{{route('company_payment')}}"
                                        >Make Payment</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('company_order')?'active':''}}">
                                    <a href="{{route('company_order')}}">Orders</a>
                                </li>
                        
                                <li class="list-group-item {{Request::is('add_job')?'active':''}}">
                                    <a href="{{route('add_job')}}">Add Job</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('all_jobs')}}">All Jobs</a>
                                </li>
                             
                                <li class="list-group-item {{Request::is('company_candidate_application')?'active':''}}">
                                    <a href="{{route('company_candidate_application')}}"
                                        >Candidate Applications</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('company_profile')?'active':''}}">
                                    <a href="{{route('company_profile')}}"
                                        >Edit Profile</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('company_logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>