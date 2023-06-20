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

                                        <h2 class="text-info text-center mb-3">Update Task Project Information</h4>

                                        <form action="{{url('admin/task/'.$task->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Task Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="task_name" type="text" value="{{$task->task_name}}" placeholder="Enter Your Task Project Name" id="example-text-input">
                                                    @if ($errors->has('task_name'))
                                                        <span class="text-danger">{{ $errors->first('task_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Task Category</label>
                                                <div class="col-sm-10">
                                                    <select name="category_id" class="form-control text-center">
                                                        <option disabled>---Select Option---</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$category->id === $task->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('category_id'))
                                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="task_description" class="form-control" id="" cols="30" rows="7">{{$task->task_description}}</textarea>
                                                    @if ($errors->has('task_description'))
                                                        <span class="text-danger">{{ $errors->first('task_description') }}</span>
                                                    @endif
                                                </div>

                                            </div>

                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="date" value="{{$task->date}}" type="date">
                                                @if ($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                                </div>
                                            </div>

                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Start Time</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="start_time" value="{{$task->start_time}}" type="time">
                                                @if ($errors->has('start_time'))
                                                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                                @endif
                                                </div>
                                            </div>

                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">End Time</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" name="end_time" value="{{$task->end_time}}" type="time">
                                                @if ($errors->has('end_time'))
                                                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                                @endif
                                                </div>
                                            </div>

                                            <!-- end row -->

                                            <!-- end row -->
                                            <div class="row mb-3 mt-2">
                                                <label for="example-week-input" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-warning" type="submit" value="Update Task Project" id="example-week-input">
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
@endsection
