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
<div class="section-header">
<h1>Edit Home Content</h1>
</div>
<div class="section-body">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
@csrf
<div class="row">
<!-- tab starts -->
<!-- <div class="row"> -->
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Search section</button>
      <button class="nav-link mt-2" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Category section</button>

    </div>
  </div>
  <div class="col-lg-9 col-md-12">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <!-- search section starts -->

        <form action="{{route('setting_page_update')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
        <label class="form-label">Title *</label>
        <input type="text" name="heading" class="form-control"  value="{{$home_content->heading}}">
        </div>
        <div class="mb-4">
        <label class="form-label">Text *</label>
        <textarea name="text" id="" cols="30" rows="10"  class="form-control h_100">{{$home_content->text}}</textarea>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
            <label class="form-label">Job Title *</label>
        <input type="text" class="form-control" name="job_title" value="{{$home_content->job_title}}">
            </div>
            <div class="col-lg-6 col-md-6">
            <div class="mb-4">
                <label class="form-label">Job Category *</label>
                <input type="text" class="form-control" name="job_category" value="{{$home_content->job_category}}">
            </div>
        </div>
        

        </div>
        <div class="row">
        <div class="col-lg-6 col-md-6">
            <label class="form-label">Job Location *</label>
        <input type="text" class="form-control" name="job_location" value="{{$home_content->job_location}}">
            </div>
            <div class="col-lg-6 col-md-6">
            <label class="form-label">Job Search *</label>
        <input type="text" class="form-control" name="search" value="{{$home_content->search}}">
            </div>
        </div>
        <div class="mb-4 mt-2">
        <label class="form-label">Existing background *</label>
        <div>
        <img src="{{asset('front/uploads/'.$home_content->background_image)}}" alt="" class="w_300">
        </div>
        </div>
        <div class="mb-4">
        <label class="form-label">Change background *</label>
        <div>
        <input type="file" class="form-control mt_10" name="background_image">
        </div>
        </div> 
        <div class="mb-4">
        <label class="form-label"></label>
        <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>

        <!-- search section ends -->

      </div>

      
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <!-- categry section starts -->
        gg
        <!-- categry section ends -->
      </div>
    </div>
  </div>
<!-- </div> -->
<!-- tab ends -->

</div>
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