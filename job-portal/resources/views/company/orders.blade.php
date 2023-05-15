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

    <div class="page-top" style="background-image: url({{ asset('front/uploads/banner3.jpg') }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Orders</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Order No</th>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Expire Date</th>
                                <th>Payment Method</th>
                            </tr>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order_no }}</td>
                                <td>
                                    {{ $item->rPackage->package_name }}<br>
                                    @if($item->currently_active == 1)
                                    <span class="badge bg-success"
                                        >Active</span
                                    >
                                    @endif
                                </td>
                                <td>${{ $item->paid_amount }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->expire_date }}</td>
                                <td>{{ $item->payment_method }}</td>
                            </tr>
                            @endforeach
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

        <script src="js/custom.js"></script>
    </body>
</html>
