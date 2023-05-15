@extends('front.layout.app')

@section('main_section')

<div class="slider" style="background-image: url({{asset('front/uploads/'.$home_page_content->background_image)}}">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="text">
                                <h2>{{$home_page_content->heading}}</h2>
                                <p>
                                {{$home_page_content->text}}
                                </p>
                            </div>
                            <div class="search-section">
                                <form action="jobs.html" method="post">
                                    <div class="inner">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name=""
                                                        class="form-control"
                                                        placeholder="Job Title"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <select
                                                        name=""
                                                        class="form-select select2"
                                                    >
                                                    @foreach($job_locations as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <select
                                                        name=""
                                                        class="form-select select2"
                                                    >
                                                    <option value="">Job Category</option>
                                                    @foreach($job_categories as $item)
                                                        <option value="">
                                                            {{$item->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    <i
                                                        class="fas fa-search"
                                                    ></i>
                                                    Search
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
                                <i class="{{$item->icon}}"></i>
                            </div>
                            <h3>{{$item->name}}</h3>
                            <p>(5 Open Positions)</p>
                            <a href=""></a>
                        </div>
                    </div>
                 @endforeach()
             
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="all">
                            <a href="{{route('all_categories')}}" class="btn btn-primary"
                                >See All Categories</a
                            >
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div
            class="why-choose"
            style="background-image: url({{asset('front/uploads/banner3.jpg')}}"
        >
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
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo.png")}}" alt="" />
                            </div>
                            <div class="text">
                                <h3>
                                    
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
                                <div class="bookmark">
                                    <a href=""
                                        ><i class="fas fa-bookmark active"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo2.png")}}" alt="" />
                            </div>
                            <div class="text">
                             
                                <div
                                    class="detail-1 d-flex justify-content-start"
                                >
                                    <div class="category">Web Development</div>
                                    <div class="location">United States</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start"
                                >
                                    <div class="date">1 day ago</div>
                                    <div class="budget">$1000</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Part Time</div>
                                </div>
                                <div class="bookmark">
                                    <a href=""
                                        ><i class="fas fa-bookmark"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo3.png")}}" alt="" />
                            </div>
                            <div class="text">
                             
                                <div
                                    class="detail-1 d-flex justify-content-start"
                                >
                                    <div class="category">Web Development</div>
                                    <div class="location">Canada</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start"
                                >
                                    <div class="date">2 days ago</div>
                                    <div class="budget">$1000-$3000</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Full Time</div>
                                    <div class="urgent">Urgent</div>
                                </div>
                                <div class="bookmark">
                                    <a href=""
                                        ><i class="fas fa-bookmark"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo4.png")}}" alt="" />
                            </div>
                            <div class="text">
                              
                                <div
                                    class="detail-1 d-flex justify-content-start"
                                >
                                    <div class="category">Web Development</div>
                                    <div class="location">Australia</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start"
                                >
                                    <div class="date">7 hours ago</div>
                                    <div class="budget">$1800</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Full Time</div>
                                    <div class="urgent">Urgent</div>
                                </div>
                                <div class="bookmark">
                                    <a href=""><i class="fas fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo5.png")}}" alt="" />
                            </div>
                            <div class="text">
                             
                                <div
                                    class="detail-1 d-flex justify-content-start">
                                    <div class="category">Marketing</div>
                                    <div class="location">Canada</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start">
                                    <div class="date">2 hours ago</div>
                                    <div class="budget">$400</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Part Time</div>
                                    <div class="urgent">Urgent</div>
                                </div>
                                <div class="bookmark">
                                    <a href=""
                                        ><i class="fas fa-bookmark"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                            <img src="{{asset("front\\uploads\\logo6.png")}}" alt="" />
                            </div>
                            <div class="text">
                            
                                <div
                                    class="detail-1 d-flex justify-content-start"
                                >
                                    <div class="category">Marketing</div>
                                    <div class="location">Canada</div>
                                </div>
                                <div
                                    class="detail-2 d-flex justify-content-start"
                                >
                                    <div class="date">9 hours ago</div>
                                    <div class="budget">$600-$800</div>
                                </div>
                                <div
                                    class="special d-flex justify-content-start"
                                >
                                    <div class="featured">Featured</div>
                                    <div class="type">Full Time</div>
                                    <div class="urgent">Urgent</div>
                                </div>
                                <div class="bookmark">
                                    <a href=""
                                        ><i class="fas fa-bookmark"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="all">
                            <a href="jobs.html" class="btn btn-primary"
                                >See All Jobs</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="testimonial"
            style="background-image: url({{asset('front/uploads/banner11.jpg')}}">
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
                                    <img src="{{asset("front\\uploads\\".$item->photo)}}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>{{$item->name}}</h4>
                                    <p>{{$item->designation}}</p>
                                </div>
                                <div class="description">
                                    <p>
                                    {{$item->comment}}.
                                    </p>
                                </div>
                            </div>
                      @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- <div class="blog">
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
                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('front/uploads/'.$post->photo) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="post.html"
                                        >{{$post->heading}}</a
                                    >
                                </h2>
                                <div class="short-des">
                                    <p>
                                    {{$post->description}}.
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="post.html" class="btn btn-primary"
                                        >{{$post->heading}}</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
              @endforeach
                </div>
            </div>
        </div> -->

        
@endsection