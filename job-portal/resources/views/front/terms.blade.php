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

        <link rel="icon" type="image/png" href="uploads/favicon.png" />

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
        <div
            class="page-top"
            style="background-image: url({{asset('front/uploads/banner.jpg')}})"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Terms and Conditions</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Hic iure delectus, aperiam eius sed suscipit
                            corporis quas, nisi dicta harum excepturi quis est
                            id deserunt a, ipsa autem in distinctio. Lorem ipsum
                            dolor sit amet consectetur adipisicing elit. Hic
                            iure delectus, aperiam eius sed suscipit corporis
                            quas, nisi dicta harum excepturi quis est id
                            deserunt a, ipsa autem in distinctio.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Hic iure delectus, aperiam eius sed suscipit
                            corporis quas, nisi dicta harum excepturi quis est
                            id deserunt a, ipsa autem in distinctio. Lorem ipsum
                            dolor sit amet consectetur adipisicing elit. Hic
                            iure delectus, aperiam eius sed suscipit corporis
                            quas, nisi dicta harum excepturi quis est id
                            deserunt a, ipsa autem in distinctio.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Hic iure delectus, aperiam eius sed suscipit
                            corporis quas, nisi dicta harum excepturi quis est
                            id deserunt a, ipsa autem in distinctio. Lorem ipsum
                            dolor sit amet consectetur adipisicing elit. Hic
                            iure delectus, aperiam eius sed suscipit corporis
                            quas, nisi dicta harum excepturi quis est id
                            deserunt a, ipsa autem in distinctio.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Hic iure delectus, aperiam eius sed suscipit
                            corporis quas, nisi dicta harum excepturi quis est
                            id deserunt a, ipsa autem in distinctio. Lorem ipsum
                            dolor sit amet consectetur adipisicing elit. Hic
                            iure delectus, aperiam eius sed suscipit corporis
                            quas, nisi dicta harum excepturi quis est id
                            deserunt a, ipsa autem in distinctio.
                        </p>
                    </div>
                </div>
            </div>
        </div>

       
     @include('front.layout.footer')

        <script src="js/custom.js"></script>
    </body>
</html>
