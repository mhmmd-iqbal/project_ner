@extends('partials.main')

@section('title', 'PROFILE')    

@section('scripts')
<script>

    const changeImage = (a) => {
        document.getElementById("image").src = a
        $('input[name=image]').val(a)
    }

    const showPassword = (e) => {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    const openModal = () => {
        $('#imageModal').modal('toggle')
    }

    const pickImage = (e) => {
        let {image} = $(e).data()
        $('#imageModal').modal('toggle')
        changeImage(image)
    }

    @if($errors->any())
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        @foreach ($errors->all() as $error)
            toastr.warning("{{ $error }}");
        @endforeach
    @endif

    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

</script>  
@endsection

@section('styles')
<style>
    .content{
        border: 1px solid rgb(191, 187, 187);
        border-radius: 20px;
    }

    .nav-tabs .nav-link {
        margin-bottom: -1px;
        /* border: 1px solid #e2a408; */
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        /* background: #ffe028; */
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #FFF;
        background-color: #e2a408;
        border-color: #dee2e6 #dee2e6 #fff;
    }

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

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Profile</h4>
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
                                Profile
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="home" aria-selected="true">Tentang Aplikasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile Saya</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="row mt-4">
                    <div class="col-12 card">
                        <div class="card-body">
                            <form action="{{route('about.update')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Tentang Aplikasi</label>
                                            <textarea class="form-control" name="description" id="" rows="17" value="" >{{$about->description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 form-group mt-2">
                                    <button class="btn btn-primary btn-block" type="submit" onclick="">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row mt-4">
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
                                <div class="profile" style="width:200px; height:200px;">
                                    <img src="{{$user->image}}" alt="Avatar" class="image" id="image" style="width:100%; border-radius: 50%;">
                                    <div class="middle">
                                        <div class="text font-weight-bold" onclick="openModal(this)">Change Image</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('profile.update', $user->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-12 form-group">
                                                <label for="">Nama User</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="">Username</label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" readonly value="{{ $user->username }}">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label class="form-control-label">Password</label>
                                                <div class="input-group rounded">
                                                    <input type="password" id="password" class="form-control" name="password">
                                                    <button class="input-group-text btn-warning border-0"  onclick="showPassword(this); return false" id="search-addon">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <div class="alert alert-warning border-0">
                                                    <span>Kosongkan password jika tidak ingin merubah password</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="image" class="form-control" value="{{$user->image}}">

                                            <div class="col-12 form-group mt-2">
                                                <button class="btn btn-primary btn-block" onclick="createData()">Simpan Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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


@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="imageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class=" modal-header d-flex justify-content-between">
                    <div class="pl-3 pt-3 h6">Pilih Foto</div>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                            <div class="profile" onclick="pickImage(this)" data-image="{{url('assets/icon/male.png')}}" style="width:100%; height:100%;">
                                <img src="{{url('assets/icon/male.png')}}" alt="Avatar" class="image data-image" style="width:100%; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                            <div class="profile" onclick="pickImage(this)" data-image="{{url('assets/icon/female.png')}}" style="width:100%; height:100%;">
                                <img src="{{url('assets/icon/female.png')}}" alt="Avatar" class="image data-image" style="width: 100%; border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection