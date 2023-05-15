<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <meta name="description" content="" />
        <title>Job Hunt |Home</title>

        <link rel="icon" type="image/png" href="{{asset('front/uploads/favicon.png')}}" />

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
        
  <!-- hero section starts -->
 <div class="slider" style="background-image: url({{asset('front/uploads/'.$home_page_content->background_image) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <div class="text">
                        <h2>{{ $home_page_content->heading }}</h2>
                        <p>
                            {!! $home_page_content->text !!}
                        </p>
                    </div>
                    <div class="search-section">
                        <form action="{{ route('job_search') }}" method="get">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="{{ $home_page_content->job_title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <select name="category" class="form-control select2">
                                        <option value="">Job Category</option>
                                        @foreach($job_categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <select
                                                        name="location"
                                                        class="form-select select2"
                                                    >
                                                    @foreach($job_locations as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="hidden" name="type" value="">
                                        <input type="hidden" name="experience" value="">
                                        <input type="hidden" name="gender" value="">
                                        <input type="hidden" name="salary_range" value="">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            {{ $home_page_content->search }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     <!-- hero section ends -->


   <!-- job category starts -->
   <div class="job-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Job Categories</h2>
                    <p>
                    Get the list of all the popular job categories
                                here                 
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($job_categories as $item)
            <div class="col-md-4">
                <div class="item">
                    <div class="icon">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <h3>{{ $item->name }}</h3>
                    <p>{{$item->r_job_count}} Open Positions</p>
                    <a href="{{ route('job_search', ['category' => $item->id]) }}"></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="all">
                    <a href="{{ route('all_categories') }}" class="btn btn-primary"
                        >See All Categories</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- job category ends -->

    <!-- why choose us starts -->
        <div class="why-choose"
            style="background-image: url({{asset('front/uploads/banner3.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Why Choose Us</h2>
                            <p>
                                Our Methods to help you build your career in
                                future
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="text">
                                <h2>Quick Apply</h2>
                                <p>
                                    You can just create your account in our
                                    website and apply for desired job very
                                    quickly.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="text">
                                <h2>Search Tool</h2>
                                <p>
                                    We provide a perfect and advanced search
                                    tool for job seekers, employers or
                                    companies.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            <div class="text">
                                <h2>Best Companies</h2>
                                <p>
                                    The best and reputed worldwide companies
                                    registered here and so you will get the
                                    quality jobs.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- why choose us ends -->


    <!-- job section starts -->
        <div class="job">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Featured Jobs</h2>
                            <p>Find the awesome jobs that matches your skill</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($featured_jobs as $item)
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                                <img src="{{asset('front/uploads/logo1.png')}}" alt="" />
                            </div>
                            <div class="text">
                                <h3>
                                    <a href="{{route('job_details',$item->id)}}"
                                        >{{$item->title}}, {{$item->rCompany->company_name}}</a
                                    >
                                </h3>
                                <div
                                    class="detail-1 d-flex justify-content-start"
                                >
                                    <div class="category">Web Development</div>
                                    <div class="location">United States</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start"
                                >
                                    <div class="date">3 days ago</div>
                                    <div class="budget">$300-$600</div>
                                    <div class="expired">Expired</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Full Time</div>
                                    <div class="urgent">Urgent</div>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="all">
                            <a href="{{route('job_search')}}" class="btn btn-primary"
                                >See All Jobs</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- job section ends -->
       <!-- testimonial section starts -->
        <div class="testimonial"
            style="background-image: url({{asset('front/uploads/banner11.jpg')}})">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Our Happy Clients</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">
                    
                            @foreach($testimonials as $item)
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('front/uploads/'.$item->photo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h4>{{ $item->name }}</h4>
                            <p>{{ $item->designation }}</p>
                        </div>
                        <div class="description">
                            <p>
                                {!! nl2br($item->comment) !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- testimonial section ends -->
    <!-- blog section starts -->
        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Latest News</h2>
                            <p>
                                Check our latest news from the following section
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                @foreach($posts as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('front/uploads/'.$item->photo) }}" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('post',$item->slug) }}"
                                >{{ $item->heading }}</a
                            >
                        </h2>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        <div class="button">
                            <a href="{{ route('single_post',$item->slug) }}" class="btn btn-primary"
                                >Read More</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                </div>
            </div>
        </div>
    <!-- blog section ends -->
  <!-- footer section starts -->
  @include('front.layout.footer')
  <!-- footer section ends -->

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

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
