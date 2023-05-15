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

    <div class="page-top page-top-job-single" style="background-image: url('{{ asset('front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$job_single->rCompany->logo) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $job_single->title }}, {{ $job_single->rCompany->company_name }}</h3>
                        <div class="detail-1 d-flex justify-content-start">
                            <div class="category">
                                {{ $job_single->rJobCategory->name }}
                            </div>
                            <div class="location">
                                {{ $job_single->rJobLocation->name }}
                            </div>
                        </div>
                        <div class="detail-2 d-flex justify-content-start">
                            <div class="date">
                                {{ $job_single->created_at->diffForHumans() }}
                            </div>
                            <div class="budget">
                              $2000
                            </div>
                            @if(date('Y-m-d') > $job_single->deadline)
                            <div class="expired">
                                Expired
                            </div>
                            @endif
                        </div>
                        <div class="special d-flex justify-content-start">
                            @if($job_single->is_featured == 1)
                            <div class="featured">
                                Featured
                            </div>
                            @endif
                            <div class="type">
                                {{ $job_single->rJobType->name }}
                            </div>
                            @if($job_single->is_urgent == 1)
                            <div class="urgent">
                                Urgent
                            </div>
                            @endif
                        </div>
                        
                        @if(!Auth::guard('company')->check())
                        <div class="apply">
                            @if(date('Y-m-d') <= $job_single->deadline)
                            <a href="{{route('apply',$job_single->id)}}" class="btn btn-primary">Apply Now</a>
                            <a href="{{route('add_bookmark',$job_single->id)}}" class="btn btn-primary save-job">Bookmark</a>
                            @endif
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="job-result pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Description</h2>
                    <p>{!! $job_single->description !!}</p>
                </div>
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Job Responsibilities</h2>
                    {!! $job_single->responsibility !!}
                </div>
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Skills and Abilities</h2>
                    {!! $job_single->skill !!}
                </div>

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Educational Qualification</h2>
                    {!! $job_single->education !!}
                </div>

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Benefits</h2>
                    {!! $job_single->benefit !!}
                </div>

                @if(date('Y-m-d') <= $job_single->deadline)
                <div class="left-item">
                    <div class="apply">
                        <a href="{{route('apply',$job_single->id)}}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
                @endif

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i> Related Jobs</h2>
                    <div class="job related-job pt-0 pb-0">
                        <div class="container">
                            <div class="row">

                                @php $i=0; @endphp
                                @foreach($jobs as $item)
                                @if($item->id == $job_single->id)
                                    @continue
                                @endif
                                @php $i++; @endphp
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt="">
                                        </div>
                                        <div class="text">
                                            <h3><a href="">{{ $item->title }}, {{ $item->rCompany->company_name }}</a></h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    {{ $item->rJobCategory->name }}
                                                </div>
                                                <div class="location">
                                                    {{ $item->rJobLocation->name }}
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </div>
                                                <div class="budget">
                                                    $22000-3000
                                                </div>
                                                @if(date('Y-m-d') > $item->deadline)
                                                <div class="expired">
                                                    Expired
                                                </div>
                                                @endif
                                            </div>
                                            <div class="special d-flex justify-content-start">
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
                                @if($i==0)
                                <div class="text-danger">No Result Found</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Job Summary
                    </h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Published On:</b></td>
                                    <td>{{ $job_single->created_at->format('d F, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Deadline:</b></td>
                                    <td>
                                        @php
                                        $dt = DateTime::createFromFormat('Y-m-d', $job_single->deadline);
                                        @endphp
                                        {{ $dt->format('d F, Y'); }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Vacancy:</b></td>
                                    <td>{{ $job_single->vacancy }}</td>
                                </tr>
                                <tr>
                                    <td><b>Category:</b></td>
                                    <td>{{ $job_single->rJobCategory->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>{{ $job_single->rJobLocation->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Type:</b></td>
                                    <td>{{ $job_single->rJobType->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Experience:</b></td>
                                    <td>{{ $job_single->rJobExperience->name }}</td>
                                </tr>
                            
                                <tr>
                                    <td><b>Salary Range:</b></td>
                                    <td>2222</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i> Enquery Form</h2>
                    <div class="enquery-form">
                        <form action="{{route('job_enquery')}}" method="post">
                            @csrf
                            <input type="hidden" name="receive_email" value="{{ $job_single->rCompany->email }}">
                            <input type="hidden" name="job_title" value="{{ $job_single->title }}">
                            <div class="mb-3">
                                <input type="text" name="visitor_name" class="form-control" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="visitor_email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="visitor_phone" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="mb-3">
                                <textarea name="visitor_message" class="form-control h-150" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if($job_single->map_code != null)
                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i> Location Map</h2>
                    <div class="location-map">
                        {!! $job_single->map_code !!}
                    </div>
                </div>
                @endif


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
