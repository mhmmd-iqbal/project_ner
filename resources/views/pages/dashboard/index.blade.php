@extends('partials.main')

@section('title', 'DASHBOARD')    

@section('scripts')
    <script>
        const redirect = (e) => {
            window.location.href = e
        }
    </script>    
@endsection

@section('styles')
<style>
    .content{
        border: 1px solid rgb(191, 187, 187);
        border-radius: 20px;
    }
    .text-link {
        cursor: pointer;
        text-align: right; 
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
                <h3>Selamat Datang, {{Auth::user()->name}}</h3>
            </div>
            <div class="col-12">
                <div class="card p-5">
                    <div class="d-flex justify content-start">
                        <div class="card text-white bg-success mb-3" style="width: 18rem; margin-right: 2%">
                            {{-- <div class="card-header">Header</div> --}}
                            <div class="card-body">
                                <h5 class="card-title pb-2" style="border-bottom: 1px solid white">
                                    <i class="fa fa-book"></i> {{$countDocument}} Total Judul Skripsi</h5>
                                <p class="card-text pt-3 text-link" style="" onclick="redirect('{{route('document.index')}}')">
                                    lihat selengkapnya <i class="fa fa-chevron-right"></i></p>
                            </div>
                        </div>
                        <div class="card text-white bg-warning mb-3" style="width: 18rem; margin-right: 2%">
                            {{-- <div class="card-header">Header</div> --}}
                            <div class="card-body">
                                <h5 class="card-title pb-2" style="border-bottom: 1px solid white">
                                    <i class="fa fa-user"></i> {{$countUsers}} Total Admin</h5>
                                <p class="card-text pt-3 text-link" style="" onclick="redirect('{{route('user.index')}}')">
                                    lihat selengkapnya <i class="fa fa-chevron-right"></i></p>
                            </div>
                        </div>
                        <div class="card text-white bg-primary mb-3" style="width: 18rem; margin-right: 2%">
                            {{-- <div class="card-header">Header</div> --}}
                            <div class="card-body">
                                <h5 class="card-title pb-2" style="border-bottom: 1px solid white">
                                    <i class="fa fa-settings"></i> Update Profil Aplikasi</h5>
                                    <p class="card-text pt-3 text-link" style="" onclick="redirect('{{route('profile.index')}}')">
                                    lihat selengkapnya <i class="fa fa-chevron-right"></i></p>
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
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection