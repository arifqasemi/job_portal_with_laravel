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


    <div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ asset('front/uploads/'.$single_post->photo) }}" alt="" />
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ $single_post->created_at->format('d') }}
                        {{ $single_post->created_at->format('F') }},
                        {{ $single_post->created_at->format('Y') }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $single_post->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $single_post->description !!}
                </div>
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
    </body>
</html>
