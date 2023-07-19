<!-- JAVASCRIPT -->
<script src="{{ asset('admin') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/node-waves/waves.min.js"></script>



<!-- apexcharts -->
<script src="{{ asset('admin') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('admin') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
</script>



<!-- Required datatable js -->
<script src="{{ asset('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="{{ asset('admin') }}/assets/js/pages/dashboard.init.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin') }}/assets/js/pages/datatables.init.js"></script>

<!--Form Editor Start-->
<script src="{{ asset('admin') }}/assets/libs/tinymce/tinymce.min.js"></script>

<script src="{{ asset('admin') }}/assets/js/pages/form-editor.init.js"></script>

<!--Form Editor End-->

<!-- App js -->
<script src="{{ asset('admin') }}/assets/js/app.js"></script>zz


@yield('js')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<script>
    function dashboardButton(){
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/dashboard",
            type: 'get',
            data:{
                CSRF_TOKEN
            },
            success: function(data){
                // console.log(data);

               $('#pageLoadData').html(data);

            }
        })
    }
</script> --}}
