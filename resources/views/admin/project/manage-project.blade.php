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
                    <div class="row">
                        <div class="col-md-7">
                            <h2 class="mt-4">All Project Manage Table</h2>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control mt-4" name="search" id="searchProject"
                                placeholder="Search Here........">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-sm btn-success mt-4 float-end" data-bs-toggle="modal"
                                data-bs-target="#addProjectModal">
                                Add Project
                            </button>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <table class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link btn btn-sm btn-primary" id="prevPage"
                                    onclick="prevPage()">Previous</a></li>
                            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                            <li class="page-item active ms-3"><a class="page-link btn btn-sm btn-primary" onclick="nextPage()"
                                    id="nextPage">Next</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



    <!-- Modal Add Project-->
    <div class="modal fade " id="addProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="width: 100%">
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
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Your Project Name" id="project_name">
                                                    <span class="text-danger error1"></span>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project
                                                    Category</label>
                                                <div class="col-sm-10">
                                                    <select id="category_id" class="form-control text-center">
                                                        <option disabled selected>---Select Option---</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                    <span class="text-danger error2"></span>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-datetime-local-input"
                                                    class="col-sm-2 col-form-label">Description</label>
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
    <div class="modal fade " id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="width: 100%">
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
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Your Project Name" id="e_project_name">
                                                    <input type="hidden" id="e_id">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Project
                                                    Category</label>
                                                <div class="col-sm-10">
                                                    <select id="e_category_id" class="form-control text-center">
                                                        <option disabled selected>---Select Option---</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-datetime-local-input"
                                                    class="col-sm-2 col-form-label">Description</label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>

    <script>
        // View Project

        let url = window.location.origin

        /*********************** Project All Data Show Start ********************************/
        function table_data_row(data) {
            var rows = '';
            var i = 0;
            // console.log(data);
            $.each(data, function(key, value) {

                rows = rows + '<tr>';
                rows = rows + '<td>' + ++i + '</td>';
                rows = rows + '<td>' + value.project_name + '</td>';

                rows = rows + '<td>';
                if (value.category == null) {
                    rows = rows + 'No Category';
                } else {
                    rows = rows + value.category.name;
                }

                rows = rows + '</td>';


                rows = rows + '<td>' + value.project_description + '</td>';
                rows = rows + '<td>' + value.start_date + '</td>';
                rows = rows + '<td>' + value.submit_date + '</td>';


                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                if (value.process == 0) {
                    rows = rows + '<a class="btn btn-sm btn-danger text-light process" title="Pending" data-id="' + value
                        .id + '" >Start</a> ';
                } else if (value.process == 1) {
                    rows = rows + '<a class="btn btn-sm btn-info text-light process"  title="Completed" data-id="' + value
                        .id + '" >Pending</a> ';
                } else {
                    rows = rows + '<a class="btn btn-sm btn-success text-light process"  title="Start" data-id="' + value
                        .id + '" >Completed</a> ';
                }
                rows = rows + '</td>';


                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                if (value.publication_status == 1) {
                    rows = rows + '<a class="btn btn-sm btn-success text-light status" title="UnPublish" data-id="' + value
                        .id + '" >Publish</a> ';
                } else {
                    rows = rows + '<a class="btn btn-sm btn-warning text-light status"  title="Publish" data-id="' + value
                        .id + '" >UnPublish</a> ';
                }
                rows = rows + '</td>';


                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editProject" data-id="' + value.id +
                    '" data-bs-toggle="modal" data-bs-target="#editProjectModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                    '" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
        }
        /*********************** Project Pagination Function End ********************************/

        /*********************** Project Pagination Start ********************************/


        let currentPage = 1;
        const limit = 2;

        function getAllData(offset) {
            axios.get(`/admin/project-data?limit=${limit}&offset=${offset}`)
                .then(function(res) {
                    table_data_row(res.data)
                    if (res.data.length != limit) {

                        document.getElementById("nextPage").style.display = "none";
                    } else {
                        document.getElementById("nextPage").style = "display";
                    }

                })
        }

        function nextPage() {
            const offset = currentPage * limit;
            currentPage++;
            getAllData(offset);
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                const offset = (currentPage - 1) * limit;
                getAllData(offset);
            }
        }
        getAllData(0);
        /*********************** Project Pagination Function End ********************************/

        /*********************** Search Result Use Debounce ********************************/

        $('#searchProject').on('keyup', _.debounce(function(e) {
            e.preventDefault();

            const keyword = document.getElementById('searchProject').value;

            axios.get(`/admin/project-search?keyword=${keyword}`)
                .then(function(res) {


                    if (res.data.status == 'no_data') {
                        $('#tbody').html('<h3 class="text-danger text-center align-center">' +
                            'Nothing Data Found' +
                            '</h3>')

                    } else {
                        table_data_row(res.data);
                    }
                    let nextPage = document.getElementById("nextPage");
                    let prevPage = document.getElementById("prevPage");
                    if (res.data.length == null) {
                        //
                        nextPage.style.display = "none";
                        prevPage.style.display = "none";
                    } else if (res.data.length != limit) {
                        nextPage.style.display = "none";
                    } else {
                        nextPage.style = "display";
                        prevPage.style = "display";
                    }
                })


        }, 2000));

        /*********************** Search Result Debounce End ********************************/

        /*********************** Store Project Data Start Function ********************************/
        $('body').on('submit', '#addProjectDataForm', function(e) {
            e.preventDefault();



            axios.post("{{ route('project.store') }}", {
                    project_name: $('#project_name').val(),
                    category_id: $('#category_id').val(),
                    project_description: $('#project_description').val(),
                    start_date: $('#start_date').val(),
                    submit_date: $('#submit_date').val(),
                })
                .then(function(response) {
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
                .catch(function(error) {
                    if (error.response.data.errors.project_name) {
                        $('.error1').text('Please Enter Your Project Name');
                    }
                    if (error.response.data.errors.category_id) {
                        $('.error2').text('Please Seleced Your Project Category');
                    }

                    if (error.response.data.errors.project_description) {
                        $('.error3').text('Please Enter Your Project Description');
                    }

                    if (error.response.data.errors.start_date) {
                        $('.error4').text('Please Enter Your Project Start Date');
                    }

                    if (error.response.data.errors.submit_date) {
                        $('.error5').text('Please Enter Your Project Submit Date');
                    }
                });

        });
        /*********************** Project Store Function End ********************************/


        /*********************** Project Edit Function Start ********************************/
        $('body').on('click', '#editProject', function() {
            let id = $(this).data('id');
            let edit = url + '/admin/project' + '/' + id + '/edit'
            // console.log(url);
            axios.get(edit)
                .then(function(res) {
                    //    console.log(res);
                    $('#e_project_name').val(res.data.project_name)
                    $('#e_category_id').val(res.data.category_id)
                    $('#e_project_description').val(res.data.project_description)
                    $('#e_start_date').val(res.data.start_date)
                    $('#e_submit_date').val(res.data.submit_date)
                    $('#e_id').val(res.data.id)
                })
        })

        /*********************** Project Edit Function End ********************************/

        /*********************** Project Updata Function Start ********************************/

        $('body').on('submit', '#updateProjectDataForm', function(e) {
            e.preventDefault()
            let id = $('#e_id').val()
            let data = {
                id: id,
                project_name: $('#e_project_name').val(),
                category_id: $('#e_category_id').val(),
                project_description: $('#e_project_description').val(),
                start_date: $('#e_start_date').val(),
                submit_date: $('#e_submit_date').val(),
            }
            let path = url + '/admin/project' + '/' + id
            axios.put(path, data)
                .then(function(res) {
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

        /*********************** Project Update Function End ********************************/

        /*********************** Project Delete Function Start ********************************/
        $('body').on('click', '#deleteRow', function(e) {
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

                    axios.delete(`${url}/admin/project/${id}`).then(function(r) {
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

        /*********************** Project Delete Function End ********************************/


        /*********************** Project Publication Status Function Start ********************************/

        $('body').on('click', '.status', function() {
            let id = $(this).data('id');
            let status = `${url}/admin/project-status/${id}`
            // console.log(url);
            axios.get(status)

                .then(function(res) {
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

        /*********************** Project Publication Status Function End ********************************/


        /*********************** Project Process Status Function Start ********************************/

        $('body').on('click', '.process', function() {
            let id = $(this).data('id');
            let process = `${url}/admin/project-process/${id}`
            // console.log(url);
            axios.get(process)

                .then(function(res) {
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
        /*********************** Project Process Status Function End ********************************/
    </script>
@endsection
