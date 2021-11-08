@extends('apps.partials.main')

@section('title', 'DASHBOARD')    

@section('content')
<div class="title m-b-md">
    <div class="text-uppercase">
        named entity recognition untuk ekstraksi informasi pada kutipan penulisan tugas akhir menggunakan pendekatan rule based
    </div>
</div>
<form action="{{route('search')}}" method="POST">
    @csrf
    <div class="input-group rounded">
        <input type="search" class="form-control rounded" name="keyword" placeholder="Cari Judul..." aria-label="Search"
        aria-describedby="search-addon" />
        <button class="input-group-text btn-primary border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>    
@endsection
