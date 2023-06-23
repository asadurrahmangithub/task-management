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
                                            <h2 class="mt-4">All Project Manage Table</h4>
                                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                                                    Add Product
                                                  </button>
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

                                            <tbody id="tbody">


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                        <!-- Modal Add Project-->
                        <div class="modal fade " id="addProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form id="addProjectDataForm">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 mx-auto">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <h2 class="text-info text-center mb-5">Add Project</h4>



                                                            <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Name</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text" placeholder="Enter Your Project Name" id="project_name">
                                                                    <span  class="text-danger error1"></span>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Category</label>
                                                                <div class="col-sm-10">
                                                                    <select id="category_id" class="form-control text-center">
                                                                        <option disabled selected>---Select Option---</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                                                        @endforeach


                                                                    </select>
                                                                    <span class="text-danger error2"></span>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea id="project_description" class="form-control" id="" cols="30" rows="7"></textarea>
                                                                    <span class="text-danger error3"></span>
                                                                </div>
                                                            </div>

                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label">Starting Date</label>
                                                                <div class="col-sm-10">
                                                                <input class="form-control" id="start_date" type="date">
                                                                <span class="text-danger error4"></span>
                                                                </div>
                                                            </div>

                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label">Submit Date</label>
                                                                <div class="col-sm-10">
                                                                <input class="form-control" id="submit_date" type="date">
                                                                <span class="text-danger error5"></span>
                                                                </div>
                                                            </div>

                                                            <!-- end row -->




                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Project</button>
                                    </div>
                            </form>
                            </div>
                            </div>
                        </div>




                        <!-- Modal Add Project-->
                        <div class="modal fade " id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form id="updateProjectDataForm">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 mx-auto">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <h2 class="text-info text-center mb-5">Update Project Data</h4>



                                                            <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Name</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text" placeholder="Enter Your Project Name" id="e_project_name">
                                                                    <input type="hidden" id="e_id">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Category</label>
                                                                <div class="col-sm-10">
                                                                    <select id="e_category_id" class="form-control text-center">
                                                                        <option disabled selected>---Select Option---</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea id="e_project_description" class="form-control" id="" cols="30" rows="7"></textarea>

                                                                </div>
                                                            </div>

                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label">Starting Date</label>
                                                                <div class="col-sm-10">
                                                                <input class="form-control" id="e_start_date" type="date">

                                                                </div>
                                                            </div>

                                                            <!-- end row -->
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label">Submit Date</label>
                                                                <div class="col-sm-10">
                                                                <input class="form-control" id="e_submit_date" type="date">

                                                                </div>
                                                            </div>

                                                            <!-- end row -->




                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Project</button>
                                    </div>
                            </form>
                            </div>
                            </div>
                        </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

// View Project

let url = window.location.origin
        function table_data_row(data) {
                var	rows = '';
                var i = 0;
                console.log(data);
                $.each( data, function( key, value ) {

                    rows = rows + '<tr>';
                    rows = rows + '<td>'+ ++i +'</td>';
                    rows = rows + '<td>'+value.project_name+'</td>';
                    rows = rows + '<td>'+value.category.name+'</td>';
                    rows = rows + '<td>'+value.project_description+'</td>';
                    rows = rows + '<td>'+value.start_date+'</td>';
                    rows = rows + '<td>'+value.submit_date+'</td>';


                    rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                    if(value.process == 0){
                        rows = rows + '<a class="btn btn-danger text-light process" title="Pending" data-id="'+value.id+'" >Start</a> ';
                    }else if(value.process==1){
                        rows = rows + '<a class="btn btn-info text-light process"  title="Completed" data-id="'+value.id+'" >Pending</a> ';
                    }else{
                        rows = rows + '<a class="btn btn-success text-light process"  title="Start" data-id="'+value.id+'" >Completed</a> ';
                    }
                    rows = rows + '</td>';


                    rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                    if(value.publication_status == 1){
                        rows = rows + '<a class="btn btn-success text-light status" title="UnPublich" data-id="'+value.id+'" >Publich</a> ';
                    }else{
                        rows = rows + '<a class="btn btn-warning text-light status"  title="Publich" data-id="'+value.id+'" >UnPublich</a> ';
                    }
                    rows = rows + '</td>';


                    rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                    rows = rows + '<a class="btn btn-info text-light" id="editProject" data-id="'+value.id+'" data-bs-toggle="modal" data-bs-target="#editProjectModal">Edit</a> ';
                    rows = rows + '<a class="btn btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                    rows = rows + '</td>';
                    rows = rows + '</tr>';
                });
                $("#tbody").html(rows);
        }

        function getAllData(){
            axios.get("{{ route('project.data') }}")
            .then(function(res){
                table_data_row(res.data)
            // console.log(res.data);
            })
        }
        getAllData();

//Store Project
$('body').on('submit','#addProjectDataForm',function(e){
        e.preventDefault();



        axios.post("{{ route('project.store') }}", {
            project_name: $('#project_name').val(),
            category_id: $('#category_id').val(),
            project_description: $('#project_description').val(),
            start_date: $('#start_date').val(),
            submit_date: $('#submit_date').val(),
        })
        .then(function (response) {
            getAllData();
            $('#project_name').val('');
            $('#category_id').val('');
            $('#project_description').val('');
            $('#start_date').val('');
            $('#submit_date').val('');
            $('.error').text('');

            $('#addProjectModal').modal('toggle');
           Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success...',
                text: 'Data save Successfully!',
                showConfirmButton: false,
                timer: 1500
            })

        })
        .catch(function (error) {
            if(error.response.data.errors.project_name){
                $('.error1').text('Please Enter Your Project Name');
            }
            if(error.response.data.errors.category_id){
                $('.error2').text('Please Seleced Your Project Category');
            }

            if(error.response.data.errors.project_description){
                $('.error3').text('Please Enter Your Project Description');
            }

            if(error.response.data.errors.start_date){
                $('.error4').text('Please Enter Your Project Start Date');
            }

            if(error.response.data.errors.submit_date){
                $('.error5').text('Please Enter Your Project Submit Date');
            }
        });

    });


    // Edit Category
    $('body').on('click','#editProject',function(){
    let id = $(this).data('id');
     let edit = url + '/admin/project' + '/'  + id + '/edit'
       // console.log(url);
        axios.get(edit)
            .then(function(res){
            //    console.log(res);
                $('#e_project_name').val(res.data.project_name)
                $('#e_category_id').val(res.data.category_id)
                $('#e_project_description').val(res.data.project_description)
                $('#e_start_date').val(res.data.start_date)
                $('#e_submit_date').val(res.data.submit_date)
                $('#e_id').val(res.data.id)
            })
    })

    //Update Category

    $('body').on('submit','#updateProjectDataForm',function(e){
        e.preventDefault()
        let id = $('#e_id').val()
        let data = {
            id : id,
            project_name : $('#e_project_name').val(),
            category_id : $('#e_category_id').val(),
            project_description : $('#e_project_description').val(),
            start_date : $('#e_start_date').val(),
            submit_date : $('#e_submit_date').val(),
        }
        let path = url + '/admin/project' + '/'  + id
        axios.put(path,data)
        .then(function(res){
            getAllData();
            $('#editProjectModal').modal('toggle')
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success...',
                text: 'Data Update Successfully!',
                showConfirmButton: false,
                timer: 1500

                })

        })
    })

    //Delete Project
    $('body').on('click','#deleteRow',function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

              axios.delete(`${url}/admin/project/${id}`).then(function(r){
                getAllData();
                 swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
            });
            } else if (
                    /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        })
    });


    // Publication Status

    $('body').on('click','.status',function(){
            let id = $(this).data('id');
            let status = `${url}/admin/project-status/${id}`
            // console.log(url);
            axios.get(status)

            .then(function(res){
                getAllData();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success...',
                    text: 'Publication Status Update Successfully!',
                    showConfirmButton: false,
                    timer: 1500

                    })
            })


    })


    // Process Status

    $('body').on('click','.process',function(){
            let id = $(this).data('id');
            let process = `${url}/admin/project-process/${id}`
            // console.log(url);
            axios.get(process)

            .then(function(res){
                getAllData();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success...',
                    text: 'Project Process Status Update Successfully!',
                    showConfirmButton: false,
                    timer: 1500

                    })
            })


    })
</script>

@endsection
