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

{{-- JAVASCRIPT UPDATE --}}
<script src={{{ URL::asset("assets/sweetalert2/dist/sweetalert2.min.js")}}}></script>
<script src={{{ URL::asset("assets/datatables/datatables.min.js")}}}></script>

<script>
const notification = (icon= 'success', title= null, text= null, footer= null) =>{
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        footer: footer
    })
} 

const loading = (title, text) => {
    Swal.fire({
        title: title,
        html: text,
        didOpen: () => {
            Swal.showLoading()
        }
    })
}

const logout = () => {
    Swal.fire({
        title: 'Apakah anda yakin akan logout ?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batalkan',
        confirmButtonText: 'Lanjutkan !'
    }).then((result) => {
        if (result.isConfirmed) {
            loading('Sedang Diproses...', '')
            window.location.href = `{{route('logout')}}`
        }
    })
}

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