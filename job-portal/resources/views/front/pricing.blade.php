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


        <!-- All Javascripts -->
        @include('front.layout.script')


        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
    @include('front.layout.nav')

    <div class="page-top" style="">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Packages</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content pricing">
    <div class="container">
        <div class="row pricing">
            @foreach($packages as $item)
            <div class="col-lg-4 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->package_name }}</h2>
                        <h3 class="card-price">${{ $item->package_price }}</h3>
                        <h4 class="card-day">({{ $item->package_display_time }})</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @php
                                    if($item->total_allowed_jobs == -1) {
                                        $text = "Unlimited";
                                        $icon_code = "fas fa-check";
                                    } elseif($item->total_allowed_jobs == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Job Post Allowed
                            </li>
                            <li>
                                @php
                                    if($item->total_allowed_featured_jobs == -1) {
                                        $text = "Unlimited";
                                        $icon_code = "fas fa-check";
                                    } elseif($item->total_allowed_featured_jobs == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_featured_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Featured Job
                            </li>
                            <li>
                                @php
                                    if($item->total_allowed_photos == -1) {
                                        $text = "Unlimited";
                                        $icon_code = "fas fa-check";
                                    } elseif($item->total_allowed_photos == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_photos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Company Photos
                            </li>
                            <li>
                                @php
                                    if($item->total_allowed_videos == -1) {
                                        $text = "Unlimited";
                                        $icon_code = "fas fa-check";
                                    } elseif($item->total_allowed_videos == 0) {
                                        $text = "No";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_videos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} Company Videos
                            </li>
                        </ul>
                        <div class="buy">
                            <a href="" class="btn btn-primary">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


    @include('front.layout.footer')


        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>



        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons" async="async"></script>
        <script src="{{asset('front/js/custom.js')}}"></script>
    </body>
</html>
