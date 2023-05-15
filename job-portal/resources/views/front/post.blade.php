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


        <div class="page-top"
            style="background-image: url({{asset('front/uploads/banner.jpg')}})">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2> All Posts</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog">
    <div class="container">
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

            <div class="col-md-12">
                {{ $posts->links() }}
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
