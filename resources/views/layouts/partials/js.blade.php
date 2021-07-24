
<!-- latest jquery-->
<script src="{{ asset('/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('/assets/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap/bootstrap.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('/assets/js/config.js') }}"></script>


<script src="{{ asset("/assets/js/sweet-alert/sweetalert.min.js") }}"></script>
<script src="{{ asset("/assets/js/sweet-alert/app.js") }}"></script>
<script src="{{ asset("/assets/js/tooltip-init.js") }}"></script>
<script src="{{ asset("/assets/js/script.js") }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

<script type="text/javascript">

    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).style('display', 'none');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>