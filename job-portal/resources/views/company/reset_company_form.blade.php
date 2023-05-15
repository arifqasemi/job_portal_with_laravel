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

    <div id="app">
    <div class="main-wrapper mt-4 mb-4">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                                <h4 class="text-center">Reset Password</h4>
                            <div class="card-body card-body-auth">
                           
                                <form method="POST" action="{{route('renew_company_password')}}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password " value="" autofocus>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="password" class="form-control" name="retype_password" placeholder="Confirm Password " value="" autofocus>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary  btn-block">
                                            Reset Password
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
