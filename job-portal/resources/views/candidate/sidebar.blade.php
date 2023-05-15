<div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item {{Request::is('candidate_dashboard')?'active':''}}">
                                    <a href="{{route('candidate_dashboard')}}"
                                        >Dashboard</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('applied_jobs')?'active':''}}">
                                    <a href="{{route('applied_jobs')}}"
                                        >Applied Jobs</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('view_bookmark')?'active':''}}">
                                    <a href="{{route('view_bookmark')}}"
                                        >Bookmarked Jobs</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('candidate_education')?'active':''}}">
                                    <a href="{{route('candidate_education')}}"
                                        >Education</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('candidate_skill')?'active':''}}">
                                    <a href="{{route('candidate_skill')}}">Skills</a>
                                </li>
                                <li class="list-group-item {{Request::is('candidate_experience')?'active':''}}">
                                    <a href="{{route('candidate_experience')}}"
                                        >Work Experience</a
                                    >
                                </li>
                                <li class="list-group-item {{Request::is('candidate_award')?'active':''}}">
                                    <a href="{{route('candidate_award')}}">Awards</a>
                                </li>
                                <li class="list-group-item ">
                                    <a href=""
                                        >Edit Profile</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('candidate_resume')}}"
                                        >Resume Upload</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('candidate_logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>