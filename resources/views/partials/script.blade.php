<script src="/assets/plugins/jquery/jquery.min.js"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/assets/dist/js/adminlte.js"></script>
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    $(document).ready(function() {
        @if (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}'
            })
        @endif
        @if (session()->has('error'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get('error') }}'
            })
        @endif

        @if (session()->has('message'))
            Toast.fire({
                icon: 'info',
                title: '{{ session()->get('message') }}'
            })
        @endif
    });
</script>

@yield('script')
