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
                            <div class="col-6 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-3">Edit Category</h4>

                                        <form action="{{ url('admin/category/'.$category->id)}}" method="post">

                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="name" value="{{$category->name}}" type="text" placeholder="Enter Your Category Name" id="example-text-input">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Note</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" id="" cols="30" rows="7">{{$category->description}}</textarea>
                                                </div>
                                            </div>

                                            <!-- end row -->

                                            <!-- end row -->
                                            <div class="row mb-3 mt-2">
                                                <label for="example-week-input" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-warning" type="submit" value="Update Category" id="example-week-input">
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
@endsection
