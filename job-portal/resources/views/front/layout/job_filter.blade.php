<div class="job-filter">
<form action="{{ route('job_search') }}" method="get">
                    <div class="widget">
                        <h2>Job Title</h2>
                        <input type="text" name="title" class="form-control" placeholder="Search Titles ..." value="{{ $form_title }}">
                    </div>

                    <div class="widget">
                        <h2>Job Category</h2>
                        <select name="category" class="form-control select2">
                            <option value="">Job Category</option>
                            @foreach($job_categories as $item)
                            <option value="{{ $item->id }}" @if($form_category == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Job Location</h2>
                        <select name="location" class="form-control select2">
                            <option value="">Job Location</option>
                            @foreach($job_locations as $item)
                            <option value="{{ $item->id }}" @if($form_location == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Job Type</h2>
                        <select name="type" class="form-control select2">
                            <option value="">Job Type</option>
                            @foreach($job_types as $item)
                            <option value="{{ $item->id }}" @if($form_types == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="widget">
                    <h2>Job Experience</h2>
                    <select name="experience" class="form-control select2">
                        <option value="">Job Experience</option>
                        @foreach($job_experiences as $item)
                            <option value="{{ $item->id }}" @if($form_experience == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  

                   

                 

                    <div class="filter-button">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                    </div>

                    </form>
                    </div>
