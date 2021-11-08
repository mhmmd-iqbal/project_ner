@extends('partials.main')

@section('title', 'DATA USER')
@section('styles')
<style>
    .profile {
        position: relative;
        width: 50%;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        cursor: pointer;
    }

    .profile:hover .image {
        opacity: 0.3;
    }

    .profile:hover .middle {
        opacity: 1;
    }

    .text {
        background-color: #00BEE3;
        color: white;
        font-size: 12px;
        padding: 10px 10px;
        border-radius: 8px;
    }

    .text2 {
        background-color: #3cc58c;
        color: white;
        font-size: 12px;
        padding: 10px 10px;
        border-radius: 8px;
    }

    .pick-image{
        cursor: pointer;
    }

    .show-password {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #00BEE3;
        border: none;
        border-radius: 15px;
    }

    .show-password:active {
        background-color: #00BEE3;
        color: white;
    }
</style>
@endsection

@section('scripts')
    <script>
    $(document).on('click', '.pick-image', function(){
        const image = $(this).attr('picture');
        document.getElementById('profile-picture').value = image
        changeImage(image)
    });

    function changeImage(a) {
        document.getElementById("image").src = a
    }

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
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
             <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
                    <div class="profile" style="width:200px; height:200px;">
                        <img src="{{url('assets/icon/male.png')}}" alt="Avatar" class="image" id="image" style="width:100%; border-radius: 50%;">
                        <div class="middle">
                            <div class="text font-weight-bold" data-toggle="modal" data-target="#imageModal">Change Image</div>
                        </div>
                    </div>
                </div>
            <div class="col-8">
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
                            {{-- <div class="col-12 form-group">
                                <label for="">Hak Akses</label>
                                <select name="role" id="" class="form-control">
                                    <option value="" disabled selected>-- Pilih Hak Akses --</option>
                                    <option value="admin">ADMIN</option>
                                    <option value="user">USER</option>
                                </select>
                            </div> --}}

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

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="imageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-between">
                    <div class="pl-3 pt-3 h6">Pilih Foto</div>
                    <button type="button" class="close text-right pt-2 pr-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                            <div class="profile pick-image" picture="{{url('assets/icon/male.png')}}" style="width:100%; height:100%;" data-dismiss="modal">
                                <img src="{{url('assets/icon/male.png')}}" alt="Avatar" class="image data-image" style="width:100%; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                            <div class="profile pick-image" picture="{{url('assets/icon/female.png')}}" style="width:100%; height:100%;" data-dismiss="modal">
                                <img src="{{url('assets/icon/female.png')}}" alt="Avatar" class="image data-image" style="width: 100%; border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
