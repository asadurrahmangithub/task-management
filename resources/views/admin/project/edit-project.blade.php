@extends('admin.master')

@section('content')
<!-- start page title -->
<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Forms Elements</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Forms Elements</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-7 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-3">Update Project Information</h4>

                                        <form action="{{url('admin/project/'.$project->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="project_name" value="{{$project->project_name}}" type="text" placeholder="Enter Your Project Name" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Category</label>
                                                <div class="col-sm-10">
                                                    <select name="category_id" class="form-control text-center">
                                                        <option disabled selected>---Select Option---</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$category->id==$project->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="project_description" class="form-control" id="" cols="30" rows="7">{{$project->project_description}}</textarea>
                                                </div>
                                            </div>

                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Starting Date</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="start_date" value="{{$project->start_date}}" type="date">
                                                </div>
                                            </div>

                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Submit Date</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="submit_date" value="{{$project->submit_date}}" type="date">
                                                </div>
                                            </div>

                                            <!-- end row -->

                                            <!-- end row -->
                                            <div class="row mb-3 mt-2">
                                                <label for="example-week-input" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-warning" type="submit" value="Update Project Info" id="example-week-input">
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
@endsection
