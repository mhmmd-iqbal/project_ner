@extends('partials.main')

@section('title', 'DATA USER')

@section('scripts')
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif
    const modal_content = document.getElementById('modal-content')
    const openModal = (e) => {
        let {value, target} = $(e).data()
        switch (target) {
            case 'delete':
                confirmDelete(value)
                break;
        }
        $('#modal-box').modal('toggle')

    }
    const closeModal = () => {
        $('#modal-box').modal('toggle')
        
    }

    const confirmDelete = (value) => {
        modal_content.innerHTML = `
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle"><span id="title">Delete Data</span></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah Anda Yakin Akan Menghapus Data ini ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-dismiss="modal">Kembali</button>
                <button class="btn btn-primary" onclick="deleteData(this)" data-value="${value}">Hapus Data</button>
            </div>
        `
    }

    

    const listData = $('#list-datatables').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        fixedColumns:   {
            heightMatch: 'none'
        },
        ajax: {
            url: '',
            data: (req) => {
               
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'createdAt', name: 'createdAt'},
            {data: 'action', name: 'action'},
        ]
    })

    const deleteData = (e) => {
        let { value } = $(e).data()
        let method = 'DELETE'
        let url = "{{route('user.destroy', 'thisID')}}".replace('thisID', value)
        
        ajax(
            method,
            url,               
        ).then((result) => {
            listData.ajax.reload()
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("Success Deleted Data");
            $('#modal-box').modal('toggle')
        }).catch((err) => {
            
        });
    }
</script>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Data Admin</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                Admin
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12 mb-2">
                <a href="{{route('user.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Admin
                </a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive-table">
                            <table class="table" id="list-datatables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
@endsection


@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="modal-box" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-content"></div>
        </div>
    </div>    
@endsection