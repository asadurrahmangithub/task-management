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
                    <h2 class="mt-4">Role & Permission Manage Table</h4>
                        <button type="button" class="btn btn-sm btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#permissionModal">
                            Add Category
                        </button>
                </div>

                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th>SL No</th>
                                <th>Permission Name</th>
                                <th>Role Group</th>

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
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="addPermissionData">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-5">Role And Permission Section</h4>



                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-3 col-form-label">Permission
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Your Permission Name" id="name"
                                                        name="name">

                                                    <input type="hidden" id="u_id" name="u_id">
                                                    <span class="text-danger error"></span>

                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Group
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <select id="group_name" name="group_name"
                                                        class="form-control text-center">
                                                        <option disabled selected>---Select Option---</option>
                                                        <option value="dashboard">Dashboard</option>
                                                        <option value="category">Category</option>
                                                        <option value="project">Project</option>
                                                        <option value="task">Task</option>
                                                        <option value="blog">Blog</option>
                                                        <option value="role">Role</option>


                                                    </select>
                                                    <span class="text-danger error1"></span>

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
                        <button type="submit" class="btn btn-primary">Save Permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- <!-- Modal Edit Category-->
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
    </div> --}}
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

                rows = rows + '<tr class="text-center">';
                rows = rows + '<td>' + ++i + '</td>';
                rows = rows + '<td>' + value.name + '</td>';
                rows = rows + '<td>' + value.group_name + '</td>';

                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editPermission" data-id="' + value.id +
                    '" data-bs-toggle="modal" data-bs-target="#permissionModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                    '" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
        }

        function getAllData() {
            axios.get("{{ route('role.index') }}")
                .then(function(res) {
                    table_data_row(res.data)
                    // console.log(res.data);
                })
        }
        getAllData();








        //store
        $('body').on('submit', '#addPermissionData', function(e) {
            e.preventDefault();

            let id = $("#u_id").val()

            if (id) {

                let data = {
                    id: id,
                    name: $('#name').val(),
                    group_name: $('#group_name').val(),
                }
                let path = url + '/admin/role' + '/' + id
                axios.put(path, data)
                    .then(function(res) {
                        getAllData();
                        $('#permissionModal').modal('toggle')
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Data Update Successfully!',
                            showConfirmButton: false,
                            timer: 1500

                        })

                    })

            } else {
                axios.post("{{ route('role.store') }}", {
                        name: $('#name').val(),
                        group_name: $('#group_name').val(),
                    })
                    .then(function(response) {
                        getAllData();
                        $('#name').val('');
                        $('#group_name').val('');
                        $('#permissionModal').modal('toggle');
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
                            $('.error').text(error.response.data.errors.name = "Enter Your Permission Name");
                        }
                        if (error.response.data.errors.group_name) {
                            $('.error1').text(error.response.data.errors.group_name =
                                "Select Your Permission Group Name");
                        }
                    });
            }





        });


        // Edit Role And Permission
        $('body').on('click', '#editPermission', function() {
            let id = $(this).data('id');
            let edit = url + '/admin/role' + '/' + id + '/edit'
            // console.log(url);
            axios.get(edit)
                .then(function(res) {
                    //    console.log(res);
                    $('#name').val(res.data.name)
                    $('#group_name').val(res.data.group_name)
                    $('#u_id').val(res.data.id)
                })
        })




        // //Update Category

        // $('body').on('submit', '#updateCategoryDate', function(e) {
        //     e.preventDefault()
        //     let id = $('#e_id').val()
        //     let data = {
        //         id: id,
        //         name: $('#e_name').val(),
        //         description: $('#e_description').val(),
        //     }
        //     let path = url + '/admin/category' + '/' + id
        //     axios.put(path, data)
        //         .then(function(res) {
        //             getAllData();
        //             $('#editCategoryModal').modal('toggle')
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: 'Success...',
        //                 text: 'Data Update Successfully!',
        //                 showConfirmButton: false,
        //                 timer: 1500

        //             })

        //         })
        // })


        // //Delete Category

        // //delete currency
        // $('body').on('click', '#deleteRow', function(e) {
        //     e.preventDefault();
        //     let id = $(this).data('id')
        //     // let del = url + '/category/' + id
        //     // console.log(del)
        //     const swalWithBootstrapButtons = Swal.mixin({
        //         customClass: {
        //             confirmButton: 'btn btn-success mx-2',
        //             cancelButton: 'btn btn-danger'
        //         },
        //         buttonsStyling: false
        //     })
        //     swalWithBootstrapButtons.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it!',
        //         cancelButtonText: 'No, cancel!',
        //         reverseButtons: true
        //     }).then((result) => {
        //         if (result.isConfirmed) {

        //             axios.delete(`${url}/admin/category/${id}`).then(function(r) {
        //                 getAllData();
        //                 swalWithBootstrapButtons.fire(
        //                     'Deleted!',
        //                     'Your data has been deleted.',
        //                     'success'
        //                 )
        //             });
        //         } else if (
        //             /* Read more about handling dismissals below */
        //             result.dismiss === Swal.DismissReason.cancel
        //         ) {
        //             swalWithBootstrapButtons.fire(
        //                 'Cancelled',
        //                 'Your file is safe :)',
        //                 'error'
        //             )
        //         }
        //     })
        // });


        // // Publication Status

        // $('body').on('click', '.status', function() {
        //     let id = $(this).data('id');
        //     let status = `${url}/admin/category-status/${id}`
        //     // console.log(url);
        //     axios.get(status)

        //         .then(function(res) {
        //             getAllData();
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: 'Success...',
        //                 text: 'Data Update Successfully!',
        //                 showConfirmButton: false,
        //                 timer: 1500

        //             })
        //         })


        // })
    </script>
@endsection
