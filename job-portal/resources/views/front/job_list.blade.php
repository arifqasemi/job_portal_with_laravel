<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <meta name="description" content="" />
        <title>Job Hunt</title>

        <link rel="icon" type="image/png" href="{{asset('asset/uploads/favicon.png')}}" />

        <!-- All CSS -->
        @include('front.layout.style')

        <link rel="stylesheet" href="{{asset('dist/css/iziToast.min.css')}}">

        <!-- All Javascripts -->
        @include('front.layout.script')

        <script src="{{asset('dist/js/iziToast.min.js')}}"></script>

        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
    @include('front.layout.nav')

    <div
            class="page-top"
            style="background-image: url({{asset('front/uploads/banner.jpg')}})"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Job Lists</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-result">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                     <!-- job filter starts -->
                     @include('front.layout.job_filter')
                     <!-- job filter ends -->
                    </div>
                    <div class="col-md-9">
                        <div class="job">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="search-result-header">
                                            <i class="fas fa-search"></i> Search
                                            Result for {{ $form_title }}
                                        </div>
                                    </div>
                                    @if(!$jobs->count())
                                <div class="text-danger">No Result Found</div>
                            @else
                                    @foreach($jobs as $item)
                                    <div class="col-md-12">
                                        <div
                                            class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="uploads/logo1.png"alt=""/>
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{route('job_details',$item->id)}}">{{$item->title}}, {{$item->rCompany->company_name}}</a>
                                                </h3>
                                                <div
                                                    class="detail-1 d-flex justify-content-start">
                                                    <div class="category">
                                                    {{$item->rJobCategory->name}}
                                                    </div>
                                                    <div class="location">
                                                    {{$item->rJobLocation->name}}
                                                    </div>
                                                </div>
                                                <div class="detail-2 d-flex justify-content-start">
                                                    <div class="date">
                                                    {{ $item->created_at->diffForHumans() }}
                                                    </div>
                                                    <div class="budget">
                                                        $3000-$3500
                                                    </div>
                                                    @if(date('Y-m-d') > $item->deadline)
                                                    <div class="expired">
                                                        Expired
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="special d-flex justify-content-start" >
                                                        @if($item->is_featured == 1)
                                                    <div class="featured">
                                                        Featured
                                                    </div>
                                                    @endif
                                                    <div class="type">
                                                        {{ $item->rJobType->name }}
                                                    </div>
                                                    @if($item->is_urgent == 1)
                                                    <div class="urgent">
                                                        Urgent
                                                    </div>
                                                    @endif
                                                </div>
                                                @if(!Auth::guard('company')->check())
                                        <div class="bookmark">
                                            @if(Auth::guard('candidate')->check())
                                                @php
                                                $count = \App\Models\CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$item->id)->count();
                                                if($count>0) {
                                                    $bookmark_status = 'active';
                                                } else {
                                                    $bookmark_status = '';
                                                }
                                                @endphp
                                            @else
                                                @php $bookmark_status = ''; @endphp
                                            @endif
                                            <a href="{{route('add_bookmark',$item->id)}}"><i class="fas fa-bookmark {{ $bookmark_status }}"></i></a>
                                        </div>
                                        @endif
                                            </div>
                                        </div>
                                    </div>

                               @endforeach
                               @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Candidates</h2>
                            <ul class="useful-links">
                                <li>
                                    <a href="">Browser Jobs</a>
                                </li>
                                <li>
                                    <a href="">Browse Candidates</a>
                                </li>
                                <li>
                                    <a href="">Candidate Dashboard</a>
                                </li>
                                <li>
                                    <a href="">Saved Jobs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Companies</h2>
                            <ul class="useful-links">
                                <li>
                                    <a href="">Post Job</a>
                                </li>
                                <li>
                                    <a href="">Browse Jobs</a>
                                </li>
                                <li>
                                    <a href="">Company Dashboard</a>
                                </li>
                                <li>
                                    <a href="">Applications</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    34 Antiger Lane, USA, 12937
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">contact@arefindev.com</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">122-222-1212</div>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-pinterest-p"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                To get the latest news from our website, please
                                subscribe us here:
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name=""
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Subscribe Now"
                                    />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright">
                            Copyright 2022, ArefinDev. All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="right">
                            <ul>
                                <li><a href="terms.html">Terms of Use</a></li>
                                <li>
                                    <a href="privacy.html">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('front.layout.footer')


        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>



        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons" async="async"></script>
        <script src="{{asset('front/js/custom.js')}}"></script>
        @if($errors->any())
 @foreach($errors->all() as $error)

<script>
 iziToast.error({
    title: '',
    position:'topRight',
    message: '{{$error}}',
});
</script>
@endforeach
 @endif 



@if(Session()->get('error'))
<script>

 iziToast.error({
    title: '',
    position:'topRight',
    message: '{{session()->get('error')}}',
});
</script>
 @endif 

 @if(Session()->get('success'))
<script>

 iziToast.success({
    title: '',
    position:'topRight',
    message: '{{session()->get('success')}}',
});
</script>
 @endif 
    </body>
</html>
