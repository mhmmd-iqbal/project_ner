@extends('partials.main')

@section('title', 'DATA USER')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Data User</h4>
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
                                User
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
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="col-12 form-group">
                                <label for="">Nama User</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Hak Akses</label>
                                <select name="role" id="" class="form-control">
                                    <option value="" disabled selected>-- Pilih Hak Akses --</option>
                                    <option value="admin">ADMIN</option>
                                    <option value="user">USER</option>
                                </select>
                            </div>
                            <div class="col-12 form-group mt-2">
                                <button class="btn btn-success btn-block" onclick="createData()">Simpan Data</button>
                            </div>
                        </form>
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