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

<div class="page-top" style="background-image: url('{{ asset('front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Job</h2>
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
               
                <form action="{{ route('update_job',$jobs_single->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $jobs_single->title }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description *</label>
                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $jobs_single->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Responsibilities</label>
                            <textarea name="responsibility" class="form-control editor" cols="30" rows="10">{{ $jobs_single->responsibility }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Skills and Abilities</label>
                            <textarea name="skill" class="form-control editor" cols="30" rows="10">{{ $jobs_single->skill }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Educational Qualification</label>
                            <textarea name="education" class="form-control editor" cols="30" rows="10">{{ $jobs_single->education }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Benifits</label>
                            <textarea name="benefit" class="form-control editor" cols="30" rows="10">{{ $jobs_single->benefit }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Deadline *</label>
                            <input type="text" name="deadline" class="form-control datepicker" value="{{ $jobs_single->deadline }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Vacancy *</label>
                            <input type="number" class="form-control" name="vacancy" min="1" value="{{ $jobs_single->vacancy }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Category *</label>
                            <select name="job_category_id" class="form-control select2">
                                @foreach($job_categories as $item)
                                <option value="{{ $item->id }}" @if($item->id == $jobs_single->job_category_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Location *</label>
                            <select name="job_location_id" class="form-control select2">
                                @foreach($job_locations as $item)
                                <option value="{{ $item->id }}" @if($item->id == $jobs_single->job_location_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Type *</label>
                            <select name="job_type_id" class="form-control select2">
                                @foreach($job_types as $item)
                                <option value="{{ $item->id }}" @if($item->id == $jobs_single->job_type_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Experience *</label>
                            <select name="job_experience_id" class="form-control select2">
                                @foreach($job_experiences as $item)
                                <option value="{{ $item->id }}" @if($item->id == $jobs_single->job_experience_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">

                    
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Location Map</label>
                            <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ $jobs_single->map_code }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Is Featured?</label>
                            <select name="is_featured" class="form-control select2">
                                <option value="0" @if($jobs_single->is_featured == 0) selected @endif>No</option>
                                <option value="1" @if($jobs_single->is_featured == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Is Urgent?</label>
                            <select name="is_urgent" class="form-control select2">
                                <option value="0" @if($jobs_single->is_urgent == 0) selected @endif>No</option>
                                <option value="1" @if($jobs_single->is_urgent == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
                
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
