@extends('admin.master')

@section('content')
<!-- start page title -->
<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                            <h2 class="mt-4">Task Manage Table</h4>
                                            <a href="{{route('task.create')}}" class="btn btn-info float-end text-center">Add Task</a>
                                    </div>
                                    @if(session()->has('massage'))
                                        <div class="alert alert-primary text-success text-center">
                                            <h2 class="text-success">{{session()->get('massage')}}</h2>
                                        </div>
                                    @endif
                                    <div class="card-body">

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Task Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Process</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>

                                            @php $i=1; @endphp
                                            @foreach($tasks as $task)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$task->task_name}}</td>
                                                <td>{{$task->category['name']}}</td>
                                                <td>{{$task->task_description}}</td>
                                                <td>{{$task->date}}</td>
                                                <td>{{$task->start_time}}</td>
                                                <td>{{$task->end_time}}</td>
                                                <td>
                                                    @if($task->process=='0')
                                                        <a href="{{route('task.process',['id'=>$task->id])}}" class="btn btn-danger" title="Pending">Starting</a>
                                                    @elseif($task->process=='1')
                                                        <a href="{{route('task.process',['id'=>$task->id])}}" class="btn btn-info" title="Completed">Pending</a>
                                                    @else
                                                        <a href="{{route('task.process',['id'=>$task->id])}}" class="btn btn-success">Completed</a>
                                                    @endif



                                                </td>
                                                <td>
                                                    @if($task->publication_status=='1')
                                                        <a href="{{route('task.status',['id'=>$task->id])}}" class="btn btn-success" title="UnPublich">Publich</a>
                                                    @else
                                                        <a href="{{route('task.status',['id'=>$task->id])}}" class="btn btn-warning" title="Publich">UnPublich</a>

                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <a href="{{url('admin/task/'.$task->id.'/edit ')}}" class="btn btn-info">Edit</a>
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{url('admin/task/'.$task->id)}}" method="POST">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button class="btn btn-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>




                                                </td>

                                            </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                            <tbody>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
@endsection
