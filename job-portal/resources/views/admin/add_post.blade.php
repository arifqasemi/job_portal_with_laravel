<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

<link rel="icon" type="image/png" href="uploads/favicon.png">

<title>Admin Panel</title>

<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

@include('admin.layout.style')
@include('admin.layout.script')
</head>

<body>
<div id="app">
<div class="main-wrapper">

<div class="navbar-bg"></div>
@include('admin.layout.nav')

@include('admin.layout.sidebar')




<div class="main-content">
<section class="section">
<div class="section-header justify-content-between">
<h1>Add Testimonials</h1>
<div>
    <a href="{{route('add_testimonial')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>
</div>
<div class="section-body">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- Categories starts -->
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store_post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug *</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Description *</label>
                            <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>

                        <h4 class="seo_section">SEO Section</h5>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ old('meta_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories ends -->

<!-- </div> -->
</div>
</div>
</div>
</div>
</div>
</section>
</div>

</div>
</div>


<script src="{{asset('dist/js/scripts.js')}}"></script>
<script src="{{asset('dist/js/custom.js')}}"></script>


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