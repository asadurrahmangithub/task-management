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
                                            <h2 class="mt-4">Category Manage Table</h4>
                                            <a href="{{route('project.create')}}" class="btn btn-info float-end text-center">Add Project</a>
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
                                                <th>Project Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Starting Date</th>
                                                <th>Submit Date</th>
                                                <th>Process</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            @php $i=1; @endphp
                                            @foreach($projects as $project)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$project->project_name}}</td>
                                                <td>{{$project->category['name']}}</td>
                                                <td>{{$project->project_description}}</td>
                                                <td>{{$project->start_date}}</td>
                                                <td>{{$project->submit_date}}</td>
                                                <td>
                                                    @if($project->process=='0')
                                                        <a href="{{route('project.process',['id'=>$project->id])}}" class="btn btn-danger" title="Pending">Starting</a>
                                                    @elseif($project->process=='1')
                                                        <a href="{{route('project.process',['id'=>$project->id])}}" class="btn btn-info" title="Completed">Pending</a>
                                                    @else
                                                        <a href="{{route('project.process',['id'=>$project->id])}}" class="btn btn-success">Completed</a>
                                                    @endif



                                                </td>
                                                <td>
                                                    @if($project->publication_status=='1')
                                                        <a href="{{route('project.status',['id'=>$project->id])}}" class="btn btn-success" title="UnPublich">Publich</a>
                                                    @else
                                                        <a href="{{route('project.status',['id'=>$project->id])}}" class="btn btn-warning" title="Publich">UnPublich</a>

                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <a href="{{url('admin/project/'.$project->id.'/edit')}}" class="btn btn-info">Edit</a>
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{url('admin/project/'.$project->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>

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
