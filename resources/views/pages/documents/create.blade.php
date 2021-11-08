@extends('partials.main')

@section('title', 'DOCUMENT SKRIPSI')

@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/dropzone/dist/dropzone.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('assets/dropzone/dist/dropzone.js') !!}"></script>
<script>
    const files = []

    Dropzone.options.dropzone =
        {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+'-'+file.name;
        },
        acceptedFiles: ".doc,.docx,.pdf",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            console.table(file, name);
            let method  = 'POST'
            let url     = '{{ route("delete.file") }}'
            let data    = {filename: name}

            ajax(
                method,
                url,
                data
            ).then((result) => {
                const index = files.indexOf(data);
                if (index !== -1) files.splice(index, 1);
                console.log("File has been successfully removed!!", data);
            }).catch((err) => {
                
            });

            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;

            // $.ajax({
            //     headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //             },
            //     type: 'POST',
            //     url: '{{ route("delete.file") }}',
            //     data: {filename: name},
            //     success: function (data){
            //         const index = files.indexOf(data);
            //         if (index !== -1) files.splice(index, 1);
            //         console.log("File has been successfully removed!!", data);
            //     },
            //     error: function(e) {
            //         console.log(e);
            //     }});
            //     var fileRef;
            //     return (fileRef = file.previewElement) != null ? 
            //     fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response) 
        {
            if(response.status === 'success')
                files.push(response.file)

            console.log(files);
        },
        error: function(file, response)
        {
            return false;
        }
    };

    const createData = () => {
        let method = 'POST'
        let url = "{{route('document.store')}}"
        let data = {
            'creator'   : $('input[name=creator]').val(),
            'title'     : $('input[name=title]').val(),
            'files'     : files
        }

        ajax(
            method,
            url,
            data
        ).then((result) => {
            return window.location.href = "{{route('document.index')}}"
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('document.store')}}" method="POST" id="dropzone" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="creator">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Judul Skripsi</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Upload Document Skripsi</label>
                            </div>
                        </form>
                        <div class="row mt-2">
                            <div class="col-12 text-right">
                                <button class="btn btn-success btn-block" onclick="createData()">Upload Skripsi</button>
                            </div>
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