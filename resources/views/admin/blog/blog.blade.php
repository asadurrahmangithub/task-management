@extends('admin.master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
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
                            <h2 class="mt-4">Blog Manage Table</h2>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control mt-4" name="search" id="searchBlog"
                                placeholder="Search Here........">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success mt-4 float-end" data-bs-toggle="modal"
                                data-bs-target="#addBlogModal">
                                Add New Blog
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th>SL No</th>
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Description</th>

                                <th>Image</th>
                                <th>Author</th>

                                <th>Publish Status</th>

                                @if ($username == 'admin' || $username == 'developer')
                                    <th>Status</th>
                                @endif
                                <th>Published At</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody id="tbody">


                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link btn btn-primary" id="prevPage"
                                    onclick="prevPage()">Previous</a></li>
                            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                            <li class="page-item active ms-3"><a class="page-link btn btn-primary" onclick="nextPage()"
                                    id="nextPage">Next</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




    <!-- Modal Add Blog Information-->
    <div class="modal fade " id="addBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="width: 100%">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="addBlogDataForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-5">Add New Blog</h2>



                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="blog_title" type="text"
                                                    value="{{ old('blog_title') }}" name="blog_title"
                                                    placeholder="Enter Your Blog Title Name">
                                                <span class="text-danger error1"></span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog
                                                Category</label>
                                            <div class="col-sm-10">
                                                <select id="category_id" name="category_id"
                                                    class="form-control text-center">
                                                    <option disabled selected>----- Select Option -----</option>
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
                                                <textarea id="elm1" class="form-control elm1" name="elm1" cols="30" rows="7">{{ old('elm1') }}</textarea>
                                                <span class="text-danger error3"></span>
                                            </div>

                                        </div>

                                        <!-- end row -->


                                        {{-- <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Date</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="date" id="date"
                                                    value="{{ old('date') }}" type="date">
                                                <span class="text-danger error4"></span>
                                            </div>
                                        </div> --}}


                                        <!-- end row -->
                                        <div class="row mb-3 mt-5">
                                            <label class="col-sm-2 col-form-label mt-5"
                                                for="basic-default-name">Image</label>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <img id="image" src="{{ url('upload/no_image.png') }}"
                                                        alt="" accept="image/jpeg, image/png"
                                                        style="height: 150px; width: 150px" />
                                                </div>
                                            </div>
                                            <div class="col-sm-7 mt-5">
                                                <div class="input-group">
                                                    <input type="file" name="image" class="form-control"
                                                        id="image_info"
                                                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                        accept="image/jpeg, image/png" />
                                                </div>
                                            </div>
                                        </div>

                                        {{-- @php
                                            dd($username);
                                        @endphp --}}


                                        <div class="row mb-3">
                                            <label for="author" class="col-sm-2 col-form-label">Author
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="author" id="author" type="text"
                                                    value="{{ $username }}" placeholder="Enter Your Blog Author Name" disabled>
                                                <span class="text-danger error1"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Edit Blog Information -->
    <div class="modal fade " id="updateBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="width: 100%">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="updateBlogDataForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-info text-center mb-5">Update Blog Information</h2>



                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="u_blog_title" name="blog_title"
                                                    type="text" value="{{ old('blog_title') }}"
                                                    placeholder="Enter Your Blog Title Name">
                                                <input type="hidden" id="u_id" name="u_id">
                                                <span class="text-danger error1"></span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog
                                                Category</label>
                                            <div class="col-sm-10">
                                                <select id="u_category_id" name="category_id"
                                                    class="form-control text-center">
                                                    <option disabled selected>----- Select Option -----</option>
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
                                                <textarea class="form-control" id="u_description" name="elm1" cols="30" rows="7"></textarea>
                                                <span class="text-danger error3"></span>
                                            </div>

                                        </div>

                                        <!-- end row -->

                                        {{-- <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Date</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="u_date" name="date"
                                                    type="date">
                                                <span class="text-danger error4"></span>
                                            </div>
                                        </div> --}}


                                        <!-- end row -->
                                        <div class="row mb-3 mt-5">
                                            <label class="col-sm-2 col-form-label mt-5"
                                                for="basic-default-name">Image</label>
                                            <div class="col-sm-3">
                                                <div class="input-group" id="showImage">

                                                </div>
                                            </div>
                                            <div class="col-sm-7 mt-5">
                                                <div class="input-group">
                                                    <input type="file" name="image" class="form-control"
                                                        id="u_image"
                                                        onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])"
                                                        accept="image/jpeg, image/png" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Author
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="author" id="u_author" type="text"
                                                value="{{ $username }}" placeholder="Enter Your Blog Author Name" disabled>
                                                <span class="text-danger error1"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Blog</button>
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
        // View Blog Data
        let url = window.location.origin;

        function allBlogData(data) {
            // console.log(data);
            var rows = '';
            var i = 0;

            $.each(data, function(key, value) {
                rows = rows + '<tr class="text-center">';
                rows = rows + '<td>' + ++i + '</td>';
                rows = rows + '<td>' + value.blog_title + '</td>';

                rows = rows + '<td>';
                if (value.category == null) {
                    rows = rows + 'No Category';
                } else {
                    rows = rows + value.category;
                }

                rows = rows + '</td>';

                rows = rows + '<td style="width: 40%;">' + value.elm1 + '</td>';

                rows = rows + '<td>' +
                    `<img src="{{ asset('` + value.image +`') }}"  style="height: 50px; width: 50px" />` + '</td>';
                rows = rows + '<td>' + value.author + '</td>';

                rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                if (value.process == 0) {
                    rows = rows + '<a class="text-danger" title="Publish" data-id="' + value
                        .id + '" >Draft</a> ';
                }

                // else if (value.process == 1) {
                //     rows = rows + '<a class="btn btn-info text-light process"  title="Completed" data-id="' + value
                //         .id + '" >Publish</a> ';
                // }
                else {
                    rows = rows + '<a class="text-success"  title="Start" data-id="' + value
                        .id + '" >Publish</a> ';
                }

                rows = rows + '</td>';

                @if ($username == 'admin' || $username == 'developer')
                    rows = rows + '<td data-id="' + value.id + '" class="text-center">';
                    if (value.publication_status == 1) {
                        rows = rows + '<a class="btn btn-success text-light status" title="Unpublish" data-id="' +
                            value
                            .id + '" >Publish</a> ';
                    } else {
                        rows = rows + '<a class="btn btn-warning text-light status"  title="Publish" data-id="' +
                            value
                            .id + '" >Unpublish</a> ';
                    }
                    rows = rows + '</td>';
                @endif


                rows = rows + '<td>' + value.date + '</td>';


                rows = rows + '<td data-id="' + value.id + '" class="text-center" style="width: 10%;">';
                @if ($username == 'admin')
                    rows = rows + '<a class="btn btn-info text-light" id="editBlogInfo" data-id="' + value.id +
                        '" data-bs-toggle="modal" data-bs-target="#updateBlogModal">Edit</a> ';
                    rows = rows + '<a class="btn btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                        '" >Delete</a> ';
                @elseif ($username == 'user')

                    if (value.process == 0) {
                        rows = rows + '<a class="btn btn-danger text-light process" title="Publish" data-id="' + value
                            .id + '" >Draft</a> ';
                    }

                    // else if (value.process == 1) {
                    //     rows = rows + '<a class="btn btn-info text-light process"  title="Completed" data-id="' + value
                    //         .id + '" >Publish</a> ';
                    // }
                    else {
                        rows = rows + '<a class="btn btn-success text-light process"  title="Start" data-id="' + value
                            .id + '" >Publish</a> ';
                    }

                    if (value.publication_status == 0) {
                        rows = rows + '<a class="btn btn-info text-light" id="editBlogInfo" data-id="' + value.id +
                            '" data-bs-toggle="modal" data-bs-target="#updateBlogModal">Edit</a> ';
                        rows = rows + '<a class="btn btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                            '" >Delete</a> ';
                    } else {
                        rows = rows + '<a class="badge bg-warning text-light">No Action</a> ';
                    }
                @endif

                rows = rows + '</td>';



                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
        }


        let currentPage = 1;
        const limit = 3;

        function getAllBlog(offset) {
            axios.get(`/admin/blog?limit=${limit}&offset=${offset}`)
                .then(function(response) {
                    allBlogData(response.data)

                    if (response.data.length != limit) {
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
            getAllBlog(offset);
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                const offset = (currentPage - 1) * limit;
                getAllBlog(offset);
            }
        }
        getAllBlog(0);

        /**************** Store Blog Page **********************/

        /*********************** Search Result Use Debounce ********************************/

        $('#searchBlog').on('keyup', _.debounce(function(e) {
            e.preventDefault();

            const keyword = document.getElementById('searchBlog').value;

            axios.get(`/admin/blog-search?keyword=${keyword}`)
                .then(function(res) {
                    // console.log(res.data);

                    if (res.data.status == 'no_data') {
                        $('#tbody').html('<h3 class="text-danger text-center align-center">' +
                            'Nothing Data Found' +
                            '</h3>')

                    } else {
                        allBlogData(res.data);
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

        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            /*************************** add new employee ajax request *********************************************/

            $('body').on('submit', '#addBlogDataForm', function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                // $("#profileSubmit").text('Profile Update...');
                $.ajax({
                    url: '{{ route('blog.store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        getAllBlog();
                        $('#addBlogModal').modal('toggle');
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Success',
                                text: 'Blog Data save Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    }
                });
            });

            /******************************** Update Blog Data ****************************/

            $('body').on('submit', '#updateBlogDataForm', function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                let id = $("#u_id").val();
                let path = url + '/admin/blog' + '/' + id
                // alert(path);
                $.ajax({
                    url: path,
                    method: 'post',
                    type: 'PUT',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        getAllBlog();
                        $('#updateBlogModal').modal('toggle');
                        if (response.status == 200) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Update!',
                                text: 'Blog Data Update Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            })

                        }

                    }
                });
            });



        });




        /******************************** Edit Blog Data ****************************/
        $('body').on('click', '#editBlogInfo', function() {
            let id = $(this).data('id');
            let edit = url + '/admin/blog' + '/' + id + '/edit'
            // console.log(url);
            axios.get(edit)
                .then(function(res) {
                    //    console.log(res);
                    $('#u_blog_title').val(res.data.blog_title)
                    $('#u_category_id').val(res.data.category_id)
                    $('#u_description').val(res.data.elm1)

                    // $('#u_date').val(res.data.date)

                    $('#u_author').val(res.data.author)
                    $('#u_id').val(res.data.id)
                    $("#showImage").html(
                        `<img src="{{ asset('${res.data.image}') }}" id="image1" accept="image/jpeg, image/png"
                         style="height: 150px; width: 150px" class="img-fluid img-thumbnail">`
                    );
                })
        })


        /******************************** Delete Blog Post ****************************/

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

                    axios.delete(`${url}/admin/blog/${id}`).then(function(r) {
                        getAllBlog();
                        if (r.status == 200) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your Blog Data has been deleted.',
                                'success'
                            )
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


        /******************************** Blog Post Publication Status ****************************/

        $('body').on('click', '.status', function() {
            let id = $(this).data('id');
            let status = `${url}/admin/blog-status/${id}`

            axios.get(status)

                .then(function(res) {
                    getAllBlog();
                    if (res.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Publication Status Update Successfully!',
                            showConfirmButton: false,
                            timer: 1500

                        })
                    }
                })


        })

        /******************************** Blog Post Process Status ****************************/

        $('body').on('click', '.process', function() {
            let id = $(this).data('id');
            let process = `${url}/admin/blog-process/${id}`

            axios.get(process)

                .then(function(res) {
                    getAllBlog();
                    if (res.status === 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success...',
                            text: 'Publication Status Update Successfully!',
                            showConfirmButton: false,
                            timer: 1500

                        })
                    }

                })

        })
    </script>
@endsection
