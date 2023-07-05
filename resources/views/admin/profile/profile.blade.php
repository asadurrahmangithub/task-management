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
    <div class="col-7 mx-auto">
        <div class="card">
            <div class="card-body">

                <h2 class="text-info text-center mb-5">Upload Profile Information</h4>



                    <form action="#" method="POST" enctype="multipart/form-data" id="profileUpload">
                        @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{ $profile->name }}"  type="text" placeholder="Enter Your Full Name" id="name">
                                <span  class="text-danger error1"></span>
                            </div>
                        </div>


                        <!-- end row -->
                        <div class="row mb-3 mt-5">
                            <label class="col-sm-2 col-form-label mt-5" for="basic-default-name">Image</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <img id="image" src="{{ asset($profile->image) }}" alt="" accept="image/jpeg, image/png" style="height: 150px; width: 150px">
                                </div>
                            </div>
                            <div class="col-sm-7 mt-5">
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" accept="image/jpeg, image/png" />
                                </div>
                            </div>
                        </div>

                        <!-- end row -->
                        <div class="row mb-3 mt-5">
                            <label class="col-sm-2 col-form-label">Submit</label>
                            <div class="col-sm-10">
                                <button class="btn btn-success" type="submit" id="profileSubmit">Submit</button>
                                {{-- <input class="btn btn-success" type="submit" value="Submit" id="submit_button"> --}}
                            </div>
                        </div>
                    </div>






            </div>
        </div>
    </div> <!-- end col -->
</div>





@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
 $(function(){
    // add new employee ajax request
    $("#profileUpload").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#profileSubmit").text('Profile Update...');
        $.ajax({
          url: '{{ route('profile.store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Update!',
                'Profile Added Successfully!',
                'success'
              )
            }

          }
        });
      });
 });

</script>


@endsection

