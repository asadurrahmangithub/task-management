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
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Category
                        </button>
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
                                <th>Catagory Name</th>
                                <th>Note</th>
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


    <!-- Modal Add Category-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="addNewDataForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-5">Category Section</h4>



                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-4 col-form-label">Category Name</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Your Category Name" id="name">
                                                    <span id="error" class="text-danger"></span>

                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="description" class="col-sm-4 col-form-label">Note</label>
                                                <div class="col-sm-8">

                                                    <textarea id="description" class="form-control" cols="30" rows="4"></textarea>
                                                    <span id="error" class="text-danger"></span>

                                                </div>
                                            </div>

                                            <!-- end row -->

                                            <!-- end row -->




                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Edit Category-->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="updateCategoryDate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-5">Update Category Section</h4>



                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-4 col-form-label">Category Name</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Your Category Name" id="e_name">
                                                    <input type="hidden" id="e_id">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="description" class="col-sm-4 col-form-label">Note</label>
                                                <div class="col-sm-8">
                                                    <textarea id="e_description" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>

                                            <!-- end row -->

                                            <!-- end row -->




                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <!-- SweetAlert js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let url = window.location.origin

        function table_data_row(data) {
            var rows = '';
            var i = 0;
            $.each(data, function(key, value) {

                rows = rows + '<tr>';
                rows = rows + '<td>' + ++i + '</td>';
                rows = rows + '<td>' + value.name + '</td>';
                rows = rows + '<td>' + value.description + '</td>';

                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                if (value.publication_status == 1) {
                    rows = rows + '<a class="btn btn-success text-light status" title="UnPublich" data-id="' + value
                        .id + '" >Publich</a> ';
                } else {
                    rows = rows + '<a class="btn btn-warning text-light status"  title="Publich" data-id="' + value
                        .id + '" >UnPublich</a> ';
                }
                rows = rows + '</td>';


                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                rows = rows + '<a class="btn btn-info text-light" id="editCategory" data-id="' + value.id +
                    '" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</a> ';
                rows = rows + '<a class="btn btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                    '" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
        }

        function getAllData() {
            axios.get("{{ route('category.data') }}")
                .then(function(res) {
                    table_data_row(res.data)
                    // console.log(res.data);
                })
        }
        getAllData();








        //store
        $('body').on('submit', '#addNewDataForm', function(e) {
            e.preventDefault();



            axios.post("{{ route('category.store') }}", {
                    name: $('#name').val(),
                    description: $('#description').val(),
                })
                .then(function(response) {
                    getAllData();
                    $('#name').val('');
                    $('#description').val('');
                    $('#error').text('');
                    $('#exampleModal').modal('toggle');
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
                    if (error.response.data.errors.name) {
                        $('#error').text(error.response.data.errors.name[0]);
                    }
                    if (error.response.data.errors.description) {
                        $('#error').text(error.response.data.errors.description[1]);
                    }
                });

        });


        // Edit Category
        $('body').on('click', '#editCategory', function() {
            let id = $(this).data('id');
            let edit = url + '/admin/category' + '/' + id + '/edit'
            // console.log(url);
            axios.get(edit)
                .then(function(res) {
                    //    console.log(res);
                    $('#e_name').val(res.data.name)
                    $('#e_description').val(res.data.description)
                    $('#e_id').val(res.data.id)
                })
        })




        //Update Category

        $('body').on('submit', '#updateCategoryDate', function(e) {
            e.preventDefault()
            let id = $('#e_id').val()
            let data = {
                id: id,
                name: $('#e_name').val(),
                description: $('#e_description').val(),
            }
            let path = url + '/admin/category' + '/' + id
            axios.put(path, data)
                .then(function(res) {
                    getAllData();
                    $('#editCategoryModal').modal('toggle')
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


        //Delete Category

        //delete currency
        $('body').on('click', '#deleteRow', function(e) {
            e.preventDefault();
            let id = $(this).data('id')
            // let del = url + '/category/' + id
            // console.log(del)
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

                    axios.delete(`${url}/admin/category/${id}`).then(function(r) {
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

        $('body').on('click', '.status', function() {
            let id = $(this).data('id');
            let status = `${url}/admin/category-status/${id}`
            // console.log(url);
            axios.get(status)

                .then(function(res) {
                    getAllData();
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
    </script>
@endsection
