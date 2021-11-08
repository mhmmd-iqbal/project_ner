@extends('partials.main')

@section('title', 'DOCUMENT SKRIPSI')

@section('name', 'docuemnt')

@section('styles')
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
            }
            $('#modal-box').modal('toggle')

        }
        
        const closeModal = () => {
            $('#modal-box').modal('toggle')
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
                `
                
                result.files.map((e) => {
                    document.getElementById('files').innerHTML += `
                    <tr>
                        <td>${i++}</td>
                        <td><a disabled href="#">${e.file_name}</a></td>
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
                <a href="{{route('document.create')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Upload Dokumen
                </a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pembuat</th>
                                        <th>Judul</th>
                                        <th>Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$document->creator}}</td>
                                            <td>
                                                <a href="#" onclick="openModal(this)" data-target="detail" data-value="{{$document->id}}">
                                                    {{$document->title}}
                                                </a>
                                            </td>
                                            <td>{{date('d-m-Y H:i:s', strtotime($document->created_at))}}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm text-white " onclick="openModal(this)" data-target="delete" data-value="{{$document->id}}"><i class="fa fa-trash-o"></i> Delete</button>
                                                <button class="btn btn-success btn-sm text-white "><i class="fa fa-pencil"></i> Update</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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