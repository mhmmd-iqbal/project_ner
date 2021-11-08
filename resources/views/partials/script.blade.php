<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{{URL::asset('template/assets/libs/jquery/dist/jquery.min.js') }}}"></script>
<script>
</script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{{URL::asset('template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}}"></script>
<script src="{{{URL::asset('template/dist/js/app-style-switcher.js') }}}"></script>
<!--Wave Effects -->
<script src="{{{URL::asset('template/dist/js/waves.js') }}}"></script>
<!--Menu sidebar -->
<script src="{{{URL::asset('template/dist/js/sidebarmenu.js') }}}"></script>
<!--Custom JavaScript -->
<script src="{{{URL::asset('template/dist/js/custom.js') }}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
const ajax = (method, url, data = {} ) => {
    return $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: method,
        url: url,
        data: data,
        dataType: "JSON"
    });
} 
</script>
@yield('scripts')