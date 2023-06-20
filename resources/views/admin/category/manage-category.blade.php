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
                                            <a href="{{route('category.create')}}" class="btn btn-success float-end text-center">Add Category</a>
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
                                                <th>Catagory Name</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>
                                                    @if($category->publication_status=='1')
                                                        <a href="{{route('category.status',['id'=>$category->id])}}" class="btn btn-success" title="UnPublich">Publich</a>
                                                    @else
                                                        <a href="{{route('category.status',['id'=>$category->id])}}" class="btn btn-warning" title="Publich">UnPublich</a>

                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-info">Edit</a>
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{url('admin/category/'.$category->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger float-left" onclick="return confirm('Are you sure to Delete this!!')">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>




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
@endsection
