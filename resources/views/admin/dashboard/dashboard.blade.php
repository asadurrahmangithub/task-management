@php

    if ($tasks != null) {
        foreach ($tasks as $key => $task) {
            if ($task->process == '0') {
                $tasks1[] = $task;
                // dd($tasks1);
            }
            if ($task->process == '1') {
                $tasks2[] = $task;
            }
            if ($task->process == '2') {
                $tasks3[] = $task;
            }
        }
    }
@endphp


@extends('admin.master')





@section('content')

    @if ($username == 'admin' || $username == 'developer')
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




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mt-4 mx-auto">To Do List</h4>



                    </div>
                    @if (session()->has('massage'))
                        <div class="alert alert-primary text-success text-center">
                            <h2 class="text-success">{{ session()->get('massage') }}</h2>
                        </div>
                    @endif
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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


                            <tbody>

                                @php $i=1; @endphp
                                @foreach ($tasks1 as $task)
                                    {{-- @php dd($tasks1); @endphp --}}

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $task->task_name }}</td>

                                        <td>
                                            @if ($task->category == null)
                                                No Category
                                            @else
                                                {{ $task->category['name'] }}
                                            @endif

                                        </td>

                                        <td>{{ $task->task_description }}</td>
                                        <td>{{ $task->date }}</td>
                                        <td>{{ $task->start_time }}</td>
                                        <td>{{ $task->end_time }}</td>

                                        <td>
                                            @if ($task->process == '0')
                                                <a class="btn btn-danger" title="Pending">Starting</a>
                                            @elseif($task->process == '1')
                                                <a class="btn btn-info" title="Completed">Pending</a>
                                            @else
                                                <a class="btn btn-success">Completed</a>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($task->publication_status == '1')
                                                <a class="btn btn-success" title="UnPublich">Publich</a>
                                            @else
                                                <a class="btn btn-warning" title="Publich">UnPublich</a>
                                            @endif

                                        </td>

                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
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



                    </div>
                    @if (session()->has('massage'))
                        <div class="alert alert-primary text-success text-center">
                            <h2 class="text-success">{{ session()->get('massage') }}</h2>
                        </div>
                    @endif
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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


                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($tasks2 as $task)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $task->task_name }}</td>

                                        <td>
                                            @if ($task->category == null)
                                                No Category
                                            @else
                                                {{ $task->category['name'] }}
                                            @endif

                                        </td>

                                        <td>{{ $task->task_description }}</td>
                                        <td>{{ $task->date }}</td>
                                        <td>{{ $task->start_time }}</td>
                                        <td>{{ $task->end_time }}</td>
                                        <td>
                                            @if ($task->process == '0')
                                                <a class="btn btn-danger" title="Pending">Starting</a>
                                            @elseif($task->process == '1')
                                                <a class="btn btn-info" title="Completed">Pending</a>
                                            @else
                                                <a class="btn btn-success">Completed</a>
                                            @endif



                                        </td>
                                        <td>
                                            @if ($task->publication_status == '1')
                                                <a class="btn btn-success" title="UnPublich">Publich</a>
                                            @else
                                                <a class="btn btn-warning" title="Publich">UnPublich</a>
                                            @endif

                                        </td>

                                    </tr>
                                    @php $i++; @endphp
                                @endforeach

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



                    </div>
                    @if (session()->has('massage'))
                        <div class="alert alert-primary text-success text-center">
                            <h2 class="text-success">{{ session()->get('massage') }}</h2>
                        </div>
                    @endif
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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


                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($tasks3 as $task)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $task->task_name }}</td>

                                        <td>
                                            @if ($task->category == null)
                                                No Category
                                            @else
                                                {{ $task->category['name'] }}
                                            @endif

                                        </td>

                                        <td>{{ $task->task_description }}</td>
                                        <td>{{ $task->date }}</td>
                                        <td>{{ $task->start_time }}</td>
                                        <td>{{ $task->end_time }}</td>
                                        <td>
                                            @if ($task->process == '0')
                                                <a href="{{ route('task.process', ['id' => $task->id]) }}"
                                                    class="btn btn-danger" title="Pending">Starting</a>
                                            @elseif($task->process == '1')
                                                <a href="{{ route('task.process', ['id' => $task->id]) }}"
                                                    class="btn btn-info" title="Completed">Pending</a>
                                            @else
                                                <a href="{{ route('task.process', ['id' => $task->id]) }}"
                                                    class="btn btn-success">Completed</a>
                                            @endif



                                        </td>
                                        <td>
                                            @if ($task->publication_status == '1')
                                                <a href="{{ route('task.status', ['id' => $task->id]) }}"
                                                    class="btn btn-success" title="UnPublich">Publich</a>
                                            @else
                                                <a href="{{ route('task.status', ['id' => $task->id]) }}"
                                                    class="btn btn-warning" title="Publich">UnPublich</a>
                                            @endif

                                        </td>

                                    </tr>
                                    @php $i++; @endphp
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @else
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
            <div class="col-12">
                <h1 class="text-center text-success pt-5 mt-5">Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    @endif
@endsection
