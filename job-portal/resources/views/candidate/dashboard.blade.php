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
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content user-panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        @include('candidate.sidebar')
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <h3>Hello, {{Auth::guard('candidate')->user()->name}}</h3>
                        <p>See all the statistics at a glance:</p>

                        <div class="row box-items">
                            <div class="col-md-4">
                                <div class="box1">
                                    <h4>{{$total_applied_jobs}}</h4>
                                    <p>Applied Jobs</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box2">
                                    <h4>{{$total_rejected_jobs}}</h4>
                                    <p>Rejected Jobs</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box3">
                                    <h4>{{$total_approved_jobs}}</h4>
                                    <p>Approved Jobs</p>
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-5">Recently Applied</h3>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th class="w-100">Detail</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Senior Laravel Developer</td>
                                        <td>ABC Multimedia</td>
                                        <td>
                                            <div class="badge bg-primary">
                                                Applied
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="job.html"
                                                class="btn btn-primary btn-sm text-white"
                                                ><i class="fas fa-eye"></i
                                            ></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Expert Laravel Developer</td>
                                        <td>Big Axis Limited</td>
                                        <td>
                                            <div class="badge bg-danger">
                                                Rejected
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="job.html"
                                                class="btn btn-primary btn-sm text-white"
                                                ><i class="fas fa-eye"></i
                                            ></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>MySQL Database Expert</td>
                                        <td>Kite IT Solution</td>
                                        <td>
                                            <div class="badge bg-success">
                                                Approved
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="job.html"
                                                class="btn btn-primary btn-sm text-white"
                                                ><i class="fas fa-eye"></i
                                            ></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    position:'toRight',
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
