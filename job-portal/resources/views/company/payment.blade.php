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
                        <h2>Payment</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content user-panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                      @include('company.sidebar')
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <h4>Current Plan</h4>
                        <div class="row box-items mb-4">
                            <div class="col-md-4">
                              
                                <div class="box1">
                                @if($current_plan ==null)
                                <span class="text-danger">No Plan Available</span>
                                @else
                                    <h4>$19</h4>
                                    <p>Basic</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h4>Choose A Plan And Make Payment</h4>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <form action="" method="post">
                            @csrf
                        <tr>
                            <td class="w-200">
                                <select name="package_id" class="form-control select2">
                                <option value="">Select a Plan</option>
                                    @foreach($packages as $item)
                                    <option value="{{ $item->id }}">{{ $item->package_name }} (${{ $item->package_price }})</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">
                                    Pay with PayPal
                                </button>
                            </td>
                        </tr>
                        </form>
                        <tr>
                            <form action="" method="post">
                            @csrf
                            <td>
                                <select name="package_id" class="form-control select2">
                                    <option value="">Select a Plan</option>
                                    @foreach($packages as $item)
                                    <option value="{{ $item->id }}">{{ $item->package_name }} (${{ $item->package_price }})</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">
                                    Pay with Stripe
                                </button>
                            </td>
                            </form>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <div class="mt-5">

       @include('front.layout.footer')
   </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <script src="js/custom.js"></script>
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
