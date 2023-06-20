@extends('admin.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<form action="{{route('admin.dashboard')}}" method="GET">



<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                            <h2 class="mt-4 mx-auto">To Do List</h4>

                                            <!-- <div class="row">
                                                <div class="col-sm-3">
                                                    <select name="category" class="form-control text-center" id="">
                                                        <option selected disabled>---Select Category---</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <select name="date" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Date---</option>
                                                            @foreach($dates as $item)
                                                                <option value="{{$item->date}}">{{$item->date}}</option>
                                                            @endforeach


                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select name="process" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Process---</option>
                                                            <option value="0">Start</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Completed</option>
                                                            <option value="3">Due</option>

                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" value="Filter" class="btn btn-success">
                                                </div>
                                            </div> -->

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


                                            </tr>
                                            </thead>

                                            @php $i=1; @endphp
                                            @foreach($tasks1 as $task)
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
                                                        <a class="btn btn-danger" title="Pending">Starting</a>
                                                    @elseif($task->process=='1')
                                                        <a class="btn btn-info" title="Completed">Pending</a>
                                                    @else
                                                        <a class="btn btn-success">Completed</a>
                                                    @endif



                                                </td>
                                                <td>
                                                    @if($task->publication_status=='1')
                                                        <a class="btn btn-success" title="UnPublich">Publich</a>
                                                    @else
                                                        <a class="btn btn-warning" title="Publich">UnPublich</a>

                                                    @endif

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

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                            <h2 class="mt-4 mx-auto">Pending List</h4>

                                            <!-- <div class="row">
                                                <div class="col-sm-3">
                                                    <select name="category" class="form-control text-center" id="">
                                                        <option selected disabled>---Select Category---</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <select name="date" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Date---</option>
                                                            @foreach($dates as $item)
                                                                <option value="{{$item->date}}">{{$item->date}}</option>
                                                            @endforeach


                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select name="process" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Process---</option>
                                                            <option value="0">Start</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Completed</option>
                                                            <option value="3">Due</option>

                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" value="Filter" class="btn btn-success">
                                                </div>
                                            </div> -->

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


                                            </tr>
                                            </thead>

                                            @php $i=1; @endphp
                                            @foreach($tasks2 as $task)
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
                                                        <a class="btn btn-danger" title="Pending">Starting</a>
                                                    @elseif($task->process=='1')
                                                        <a class="btn btn-info" title="Completed">Pending</a>
                                                    @else
                                                        <a class="btn btn-success">Completed</a>
                                                    @endif



                                                </td>
                                                <td>
                                                    @if($task->publication_status=='1')
                                                        <a class="btn btn-success" title="UnPublich">Publich</a>
                                                    @else
                                                        <a class="btn btn-warning" title="Publich">UnPublich</a>

                                                    @endif

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

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                            <h2 class="mt-4 mx-auto">Completed List</h4>

                                            <!-- <div class="row">
                                                <div class="col-sm-3">
                                                    <select name="category" class="form-control text-center" id="">
                                                        <option selected disabled>---Select Category---</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <select name="date" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Date---</option>
                                                            @foreach($dates as $item)
                                                                <option value="{{$item->date}}">{{$item->date}}</option>
                                                            @endforeach


                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select name="process" class="form-control text-center" id="">
                                                            <option selected disabled>---Select Process---</option>
                                                            <option value="0">Start</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Completed</option>
                                                            <option value="3">Due</option>

                                                        </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" value="Filter" class="btn btn-success">
                                                </div>
                                            </div> -->

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


                                            </tr>
                                            </thead>

                                            @php $i=1; @endphp
                                            @foreach($tasks3 as $task)
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
</form>

@endsection
