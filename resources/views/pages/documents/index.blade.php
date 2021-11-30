@extends('partials.main')

@section('title', 'DOCUMENT SKRIPSI')

@section('name', 'docuemnt')

@section('styles')
    <link href="{{{ URL::asset('assets/datatables/datatables.min.css')}}}" rel="stylesheet" media="all">
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endsection

@section('scripts')
    <script>
    const modal_content = document.getElementById('modal-content')

    const openModal = (e) => {
        let {value, target} = $(e).data()
        switch (target) {
            case 'detail':
            default:
                getDetail(value)
                break;

            case 'delete':
                confirmDelete(value)
                break;
            
            case 'update':
                updateForm(value)
                break;
        }
        $('#modal-box').modal('toggle')

    }
    
    const closeModal = () => {
        $('#modal-box').modal('toggle')
    }

    const updateForm = (value) => {
        let method = 'GET'
        let url = "{{route('document.show', 'thisID')}}".replace('thisID', value)
        ajax(
            method,
            url                    
        ).then((result) => {
            modal_content.innerHTML = `
            <div class="modal-header">
                <h5 class="modal-title" id=""><span id="title">Update Data</span></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" value="${result.creator}" name="creator">
                    </div>
                    <div class="col-12 form-group">
                        <label for="">Judul Skripsi</label>
                        <input type="text" class="form-control" value="${result.title}" name="title">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-dismiss="modal">Kembali</button>
                <button class="btn btn-primary" onclick="updateData(this)" data-value="${value}">Ubah Data</button>
            </div>
            `
        })
    }

    const openDocModal = (e) => {
        let {path, filename}  = $(e).data()
        console.log(path)
        modal_content.innerHTML = `
            <div class="modal-header">
                <h5 class="modal-title" id=""><span id="title">${filename}</span></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="${path}" frameborder="0" width="100%" height="400px" />
            </div>
            `
    }

    const updateData = (e) => {
        let {value} = $(e).data()
        let method  = 'PUT'
        let url     = "{{route('document.update', 'thisID')}}".replace('thisID', value)
        let creator = $('input[name=creator]').val()
        let title   = $('input[name=title]').val()

        if(creator === '' || title === ''){
            return toastr.warning("Nama Mahasiswa dan Judul Tidak Boleh Kosong!");
        }

        let data    = {
            creator: creator,
            title: title
        }
        ajax(
            method,
            url,
            data
        ).then((result) => {
            if(result.status === 'success') {
                listData.ajax.reload()
                closeModal()
                return toastr.success("Berhasil Memperbarui Data");
            } else {
                return toastr.warning("Gagal Memperbarui Data");
            }
        })
    }

    const getDetail = (value) => {
        let method = 'GET'
        let url = "{{route('document.show', 'thisID')}}".replace('thisID', value)
        ajax(
            method,
            url                    
        ).then((result) => {
            let i = 1;
            modal_content.innerHTML = `
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalTitle">${result.title}</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="responsive-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Daftar File Pada Dokumen
                                </th>
                            </tr>
                            <tr>
                                <th width="5">No</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody id="files"></tbody>
                    </table>
                </div>
            </div>
            `
            
            result.files.map((e) => {
                document.getElementById('files').innerHTML += `
                <tr>
                    <td>${i++}</td>
                    <td><a disabled href="#" data-path="${e.public_path}" data-filename="${e.file_name}" onclick="openDocModal(this)" >${e.file_name}</a></td>
                </tr>
                `
            })
        }).catch((err) => {
            
        });
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

    const deleteData = (e) => {
        let { value } = $(e).data()
        let method = 'DELETE'
        let url = "{{route('document.destroy', 'thisID')}}".replace('thisID', value)
        
        ajax(
            method,
            url,               
        ).then((result) => {
            window.location.reload()
        }).catch((err) => {
            
        });
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
            {data: 'creator', name: 'creator'},
            {data: 'modalShow', name: 'modalShow'},
            {data: 'createdAt', name: 'createdAt'},
            {data: 'action', name: 'action'},
        ]
    })
    </script>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Document Skripsi</h4>
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
                                Dokumen Skripsi
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
                <a href="{{route('document.create')}}" class="btn btn-primary ">
                    <i class="fa fa-plus"></i> Upload Dokumen
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
                                        <th>Pembuat</th>
                                        <th>Judul</th>
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

