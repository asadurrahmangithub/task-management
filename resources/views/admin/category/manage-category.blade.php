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
                            <h2 class="mt-4">Category Manage Table</h2>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control mt-4" name="search" id="searchCategory"
                                placeholder="Search Here........">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mt-4 float-end" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Category
                            </button>
                        </div>
                    </div>


                </div>
                <div class="card-body table-data">

                    <table class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>SL No</th>
                                <th>Catagory Name</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody id="tbody" class="text-center">

                            {{-- @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>

                                        @if ($category->publication_status == 1)
                                            <a class="btn btn-success text-light status" data-id="{{ $category->id }}"
                                                title="UnPublich">Publich</a>
                                        @else
                                            <a class="btn btn-warning text-light status" data-id="{{ $category->id }}"
                                                title="Publich">UnPublich</a>
                                        @endif

                                    </td>
                                    <td>

                                        <a class="btn btn-info text-light" id="editCategory" data-id="{{ $category->id }}"
                                            data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</a>
                                        <a class="btn btn-danger text-light" id="deleteRow"
                                            data-id="{{ $category->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach --}}



                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" id="prevPage"
                                    onclick="prevPage()">Previous</a></li>
                            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                            <li class="page-item active ms-3"><a class="page-link" onclick="nextPage()"
                                    id="nextPage">Next</a></li>
                        </ul>
                    </nav>

                    {{-- <
                         --}}

                    {{-- {!! $categories->links() !!} --}}

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
                                                <label for="name" class="col-sm-4 col-form-label">Category
                                                    Name</label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <script>
        let url = window.location.origin

        // $(document).on('click', '.pagination a', function(e) {
        //     e.preventDefault();
        //     let page = $(this).attr('href').split('page=')[1]
        //     record(page)
        // })

        // function record(page) {
        //     $.ajax({
        //         url: "/admin/category/pagination?page=" + page,
        //         success: function(res) {
        //             $('.table-data').html(res);
        //         }
        //     })
        // }

        /*********************** Category Data Show Function Start ********************************/

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
        /*********************** Category Data Show Function End ********************************/


        /*********************** Category Data Pagination Function Start ********************************/

        let currentPage = 1;
        const limit = 3;


        function getAllData(offset) {
            axios.get(`/admin/category-data?limit=${limit}&offset=${offset}`)
                .then(function(res) {
                    table_data_row(res.data)


                    if (res.data.length != limit) {
                        //
                        document.getElementById("nextPage").style.display = "none";
                    } else {
                        document.getElementById("nextPage").style = "display";
                    }
                    //     console.log(res.data.length);
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

        /*********************** Category Data Pagination Function End ********************************/




        /*********************** Category  Data Store Function Start ********************************/
        $('body').on('submit', '#addNewDataForm', function(e) {
            e.preventDefault();



            axios.post("{{ route('category.store') }}", {
                    name: $('#name').val(),
                    description: $('#description').val(),
                })
                .then(function(response) {
                    // getAllData();
                    $('#name').val('');
                    $('#description').val('');
                    $('#error').text('');
                    $('#exampleModal').modal('toggle');

                    if (response.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Data save Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('.table').load(location.href + ' .table')
                    }


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
        /*********************** Category Data Store Function End ********************************/


        /*********************** Category Data Edit Start ********************************/
        $('body').on('click', '#editCategory', function() {

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
                confirmButtonText: 'Yes, Edit Info!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

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
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    ),
                    $('#editCategoryModal').modal('toggle')
                }
            })
        })
        /*********************** Category Data Edit End ********************************/




        /*********************** Category Data Update Start ********************************/

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
                    // getAllData();
                    $('#editCategoryModal').modal('toggle')
                    if (res.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Data Update Successfully!',
                            showConfirmButton: false,
                            timer: 1500

                        })
                        getAllData(0);
                    }


                })
        })

        /*********************** Category Data Update End ********************************/


        /*********************** Category Data Delete Function Start ********************************/

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
                        // getAllData();
                        if (r.status == 200) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                            $('.table').load(location.href + ' .table')
                        }

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

        /*********************** Category Data Delete Function End ********************************/


        /*********************** Publication Status Start ********************************/

        $('body').on('click', '.status', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
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
                confirmButtonText: 'Yes, Status Update!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    let status = `${url}/admin/category-status/${id}`
                    // console.log(url);
                    axios.get(status)
                        .then(function(res) {

                            if (res.status === 200) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Success...',
                                    text: 'Data Status Update Successfully!',
                                    showConfirmButton: false,
                                    timer: 1500

                                })
                                getAllData(0);
                            }

                        })
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

        })

        /*********************** Publication Status End ********************************/


        /*********************** Search Result Use Debounce ********************************/

        $('#searchCategory').on('keyup', _.debounce(function(e) {
            e.preventDefault();

            const keyword = document.getElementById('searchCategory').value;

            axios.get(`/admin/category-search?keyword=${keyword}`)
                .then(function(res) {
                    // console.log(res.data);

                    if (res.data.status == 'no_data') {
                        $('#tbody').html('<h3 class="text-danger text-center align-center">' + 'Nothing Data Found' +
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

            /*********************** Search Result To Many Time ********************************/

            // $.ajax({
            //     url: ,
            //     method: "GET",
            //     data: {
            //         search_string: $('#searchCategory').val()
            //     },
            //     success: function(res) {
            //         table_data_row(res.data)

            //         if (res.status == 'no_data') {
            //             $('.table-data').html('<h1 class="text-danger text-center">' +
            //                 'Nothing Data Found' + '</h1>')
            //         } else {
            //             $('.table-data').html(res);
            //         }

            //     }
            // })
            /*********************** Search Result To Many Time End ********************************/

        }, 2000));

        /*********************** Search Result Debounce End ********************************/
    </script>
@endsection
