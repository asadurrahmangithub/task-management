@if ($username == 'admin' || $username == 'developer')



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
                                <h2 class="mt-4">All Task Project Manage Table</h2>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control mt-4" name="search" id="searchTaskProject"
                                    placeholder="Search Here........">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-success mt-4 float-end" data-bs-toggle="modal"
                                    data-bs-target="#addTaskModal">
                                    Add Task Product
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




        <!-- Modal Add Task Project-->
        <div class="modal fade " id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="width: 100%">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="addTaskDataForm">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body">

                                            <h2 class="text-info text-center mb-5">Add Task Project</h4>



                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Task
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="task_name" type="text"
                                                            value="{{ old('task_name') }}"
                                                            placeholder="Enter Your Task Project Name"
                                                            id="example-text-input">
                                                        <span class="text-danger error1"></span>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Task
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
                                                        <textarea id="task_description" class="form-control" id="" cols="30" rows="7">{{ old('task_description') }}</textarea>
                                                        <span class="text-danger error3"></span>
                                                    </div>

                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="date"
                                                            value="{{ old('date') }}" type="date">
                                                        <span class="text-danger error4"></span>
                                                    </div>
                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Start Time</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="start_time"
                                                            value="{{ old('start_time') }}" type="time">
                                                        <span class="text-danger error5"></span>
                                                    </div>
                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">End Time</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="end_time"
                                                            value="{{ old('end_time') }}" type="time">
                                                        <span class="text-danger error6"></span>
                                                    </div>
                                                </div>




                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- Modal Edit Task Project-->
        <div class="modal fade " id="updateTaskProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="width: 100%">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="editTaskProjectDataForm">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body">

                                            <h2 class="text-info text-center mb-5">Update Task Project</h4>



                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Task
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="e_task_name" type="text"
                                                            value="{{ old('task_name') }}"
                                                            placeholder="Enter Your Task Project Name"
                                                            id="example-text-input">
                                                        <input type="hidden" id="e_id">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Task
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
                                                        <textarea id="e_task_description" class="form-control" id="" cols="30" rows="7">{{ old('task_description') }}</textarea>

                                                    </div>

                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="e_date"
                                                            value="{{ old('date') }}" type="date">

                                                    </div>
                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Start Time</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="e_start_time"
                                                            value="{{ old('start_time') }}" type="time">

                                                    </div>
                                                </div>

                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">End Time</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="e_end_time"
                                                            value="{{ old('end_time') }}" type="time">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Task</button>
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

            /*********************** Task Project All Data Show Function Start ********************************/

            function table_data_row(data) {
                var rows = '';
                var i = 0;
                // console.log(data);
                $.each(data, function(key, value) {

                    rows = rows + '<tr>';
                    rows = rows + '<td>' + ++i + '</td>';
                    rows = rows + '<td>' + value.task_name + '</td>';

                    rows = rows + '<td>';
                    if (value.category == null) {
                        rows = rows + 'No Category';
                    } else {
                        rows = rows + value.category.name;
                    }

                    rows = rows + '</td>';

                    rows = rows + '<td>' + value.task_description + '</td>';
                    rows = rows + '<td>' + value.date + '</td>';
                    rows = rows + '<td>' + value.start_time + '</td>';
                    rows = rows + '<td>' + value.end_time + '</td>';


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
                    rows = rows + '<a class="btn btn-sm btn-info text-light" id="editTaskProject" data-id="' + value.id +
                        '" data-bs-toggle="modal" data-bs-target="#updateTaskProjectModal">Edit</a> ';
                    rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                        '" >Delete</a> ';
                    rows = rows + '</td>';

                    rows = rows + '</tr>';
                });
                $("#tbody").html(rows);
            }

            /*********************** Task Project Show Function End ********************************/

            /*********************** Task Project Pagination Function Start ********************************/
            let currentPage = 1;
            const limit = 3;

            function getAllData(offset) {
                axios.get(`/admin/task-data?limit=${limit}&offset=${offset}`)
                    .then(function(res) {
                        // console.log(res.data);
                        table_data_row(res.data)

                        if (res.data.length != limit) {
                            //
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

            /*********************** Task Project Pagination Function End ********************************/

            /*********************** Search Result Use Debounce ********************************/

            $('#searchTaskProject').on('keyup', _.debounce(function(e) {
                e.preventDefault();

                const keyword = document.getElementById('searchTaskProject').value;

                axios.get(`/admin/task-search?keyword=${keyword}`)
                    .then(function(res) {
                        // console.log(res.data);

                        if (res.data.status == 'no_data') {
                            $('#tbody').html('<h3 class="text-danger text-center">' + 'Nothing Data Found' +
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


            /*********************** Task Project Store Function Start ********************************/
            $('body').on('submit', '#addTaskDataForm', function(e) {
                e.preventDefault();



                axios.post("{{ route('task.store') }}", {
                        task_name: $('#task_name').val(),
                        category_id: $('#category_id').val(),
                        task_description: $('#task_description').val(),
                        date: $('#date').val(),
                        start_time: $('#start_time').val(),
                        end_time: $('#end_time').val(),
                    })
                    .then(function(response) {
                        getAllData();
                        $('#task_name').val('');
                        $('#category_id').val('');
                        $('#task_description').val('');
                        $('#date').val('');
                        $('#start_time').val('');
                        $('#end_time').val('');
                        $('.error').text('');

                        $('#addTaskModal').modal('toggle');
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
                        if (error.response.data.errors.task_name) {
                            $('.error1').text('Please Enter Your Task Project Name');
                        }
                        if (error.response.data.errors.category_id) {
                            $('.error2').text('Please Seleced Your Task Project Category');
                        }

                        if (error.response.data.errors.task_description) {
                            $('.error3').text('Please Enter Your Task Project Description');
                        }

                        if (error.response.data.errors.date) {
                            $('.error4').text('Please Enter Your Task Project Start Date');
                        }

                        if (error.response.data.errors.start_time) {
                            $('.error5').text('Please Enter Your Task Project Start Time');
                        }
                        if (error.response.data.errors.end_time) {
                            $('.error6').text('Please Enter Your Task Project End Time');
                        }
                    });

            });

            /*********************** Task Project Store Function End ********************************/

            /*********************** Task Project Edit Function Start ********************************/
            $('body').on('click', '#editTaskProject', function() {
                let id = $(this).data('id');
                let edit = url + '/admin/task' + '/' + id + '/edit'
                // console.log(url);
                axios.get(edit)
                    .then(function(res) {
                        //    console.log(res);
                        $('#e_task_name').val(res.data.task_name)
                        $('#e_category_id').val(res.data.category_id)
                        $('#e_task_description').val(res.data.task_description)
                        $('#e_date').val(res.data.date)
                        $('#e_start_time').val(res.data.start_time)
                        $('#e_end_time').val(res.data.end_time)
                        $('#e_id').val(res.data.id)
                    })
            })
            /*********************** Task Project Edit Function End ********************************/

            /*********************** Task Project Update Function Start ********************************/
            $('body').on('submit', '#editTaskProjectDataForm', function(e) {
                e.preventDefault()
                let id = $('#e_id').val()
                let data = {
                    id: id,
                    task_name: $('#e_task_name').val(),
                    category_id: $('#e_category_id').val(),
                    task_description: $('#e_task_description').val(),
                    date: $('#e_date').val(),
                    start_time: $('#e_start_time').val(),
                    end_time: $('#e_end_time').val(),
                }
                let path = url + '/admin/task' + '/' + id
                axios.put(path, data)
                    .then(function(res) {
                        getAllData();
                        $('#updateTaskProjectModal').modal('toggle')
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
            /*********************** Task Project Upadate Function End ********************************/

            /*********************** Task Project Delete Function Start ********************************/
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

                        axios.delete(`${url}/admin/task/${id}`).then(function(r) {
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
            /*********************** Task Project Delete Function End ********************************/

            /*********************** Task Project Process Status Function Status ********************************/
            $('body').on('click', '.process', function() {
                let id = $(this).data('id');
                let process = `${url}/admin/task-process/${id}`

                axios.get(process)

                    .then(function(res) {
                        getAllData();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Task Project Process Status Update Successfully!',
                            showConfirmButton: false,
                            timer: 1500

                        })
                    })


            })
            /*********************** Task Project Process Status Function End ********************************/


            /*********************** Task Project Publication Status Function Start ********************************/
            $('body').on('click', '.status', function() {
                let id = $(this).data('id');
                let status = `${url}/admin/task-status/${id}`

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
            /*********************** Task Project Publication Status Function End ********************************/
        </script>
    @endsection

@endif
