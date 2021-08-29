@extends('partials.main')

@section('title', 'BLANK PAGE')    

@section('scripts')
    <script>
        const chooseTitle = (e) => {
            const id = $(e).val()
            var result = getDocument(id)
            result
                .then(data => {
                    console.log('Data:', data);
                    document.getElementById('name').innerHTML = data.creator
                    document.getElementById('loadContent').innerHTML = ''
                    document.getElementById('listData').innerHTML = ''
                    data.files.map((e) => {
                        let idFile = e.id

                        getConvertionFile(idFile)
                        .then(dataFile => {
                            if(dataFile.status === 'success'){
                                document.getElementById('loadContent').innerHTML += `
                                <div class="content p-2 mt-1">${dataFile.data}
                                </div>`
    
                                var matchesAPPAStyle = dataFile.data.match(/\((.*?)\)/g);
                                if(matchesAPPAStyle){
                                    // console.log(matchesAPPAStyle)
                                    matchesAPPAStyle.map((list) => {
                                        document.getElementById('listData').innerHTML += `<div class="col-2">${list}</div>`
                                    })
                                }
                            }
                        })
                        .catch()

                    })
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        }

        const getDocument = (id) => {
            return $.ajax({
                type: "GET",
                url: "{{route('document.show', 'dataID')}}".replace('dataID', id),
                dataType: "JSON",
            });
        }
        
        const getConvertionFile = (id) => {
            return $.ajax({
                type: "GET",
                url: "{{route('convertion.file', 'dataID')}}".replace('dataID', id),
                dataType: "JSON",
            });
        }



    </script>    
@endsection

@section('styles')
<style>
    .content{
        border: 1px solid rgb(191, 187, 187);
        border-radius: 20px;
    }
</style>    
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Dashboard</h4>
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
                                Dashboard
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
                <div class="card p-5">
                    <div class="card-body">
                        <h4 class="text-uppercase text-center">
                            Name Entity Recognition <br> Untuk Ekstraksi Infomarsi Pada Kutipan Penulisan Tugas Akhir <br> Menggunakan Pendekatan Rule-Based
                        </h4>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Cari Judul</label>
                                    <select name="" id="title" onchange="chooseTitle(this)" class="form-control">
                                        <option value="" disabled selected>-- Pilih Judul --</option>
                                        @foreach ($documents as $document)
                                            <option value="{{$document->id}}">{{$document->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" disabled id="name" placeholder="">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">LIST DATA KUTIPAN</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="row" id="listData"></div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">HASIL EKSTRAKSI DATA</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="">
                            Penulis : <span id="name">Agus</span>
                        </div>
                        <div id="loadContent">
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
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection