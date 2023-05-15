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

    <div class="page-top" style="background-image: url('{{ asset('front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Company List</h2>
            </div>
        </div>
    </div>
</div>

<div class="job-result">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="job-filter">
                    
                    <form action="{{route('filter_company')}}" method="get">
                    <div class="widget">
                        <h2>Company Name</h2>
                        <input type="text" name="name" class="form-control" placeholder="Company Name ..." value="{{ $form_name }}">
                    </div>

                
                    <div class="widget">
                    <h2>Company Industry</h2>
                    <select name="industry" class="form-control select2">
                    <option value="">Company Industry</option>
                            @foreach($company_industries as $item)
                            <option value="{{ $item->id }}" @if($form_industry == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="widget">
                        <h2>Company Location</h2>
                        <select name="location" class="form-control select2">
                            <option value="">Company Location</option>
                            @foreach($company_locations as $item)
                            <option value="{{ $item->id }}" @if($form_location == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                 
                    <div class="widget">
                        <h2>Founded On</h2>
                        <select name="founded" class="form-control select2">
                            <option value="">Founded On</option>
                            @for($i=1900;$i<=date('Y');$i++)
                                <option value="{{ $i }}" @if($form_founded == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="filter-button">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                    </div>

                    </form>

                   


                </div>
            </div>
            <div class="col-md-9">
                <div class="job">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-result-header">
                                    <i class="fas fa-search"></i> Search Result for {{$form_name}}
                                </div>
                            </div>

                            @if(!$companies->count())
                                <div class="text-danger">No Result Found</div>
                            @else
                            @foreach($companies as $item)
                            @php
                            $order_data = \App\Models\Order::where('company_id',$item->id)->where('currently_active',1)->first();
                            if(date('Y-m-d') > $order_data->expire_date) {
                                continue;
                            }
                            @endphp
                            <div class="col-md-12">
                                <div class="item d-flex justify-content-start">
                                    <div class="logo">
                                        <img src="{{ asset('front/uploads/'.$item->logo) }}" alt="">
                                    </div>
                                    <div class="text">
                                        <h3><a href="{{ route('single_company',$item->id) }}">{{ $item->company_name }}</a></h3>
                                        <div class="detail-1 d-flex justify-content-start">
                                            <div class="category">
                                                {{ $item->rCompanyIndustry->name }}
                                            </div>
                                            <div class="location">
                                                {{ $item->rCompanyLocation->name }}
                                            </div>
                                        </div>
                                        <div class="detail-2">
                                            @php
                                            $new_str = substr($item->description,0,220).' ...';
                                            @endphp
                                            {!! $new_str !!}
                                        </div>
                                        <div class="open-position">
                                            <span class="badge bg-primary">{{ $item->r_job_count }} Open Positions</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-12">
                                {{ $companies->appends($_GET)->links() }}
                            </div>
                            @endif


                        </div>
                    </div>
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
    position:'center',
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
