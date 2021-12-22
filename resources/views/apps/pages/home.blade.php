@extends('apps.partials.main')

@section('title', 'DASHBOARD')    

@section('content')
<div class="title m-b-md">
    <div class="text-uppercase">
        named entity recognition untuk ekstraksi informasi pada kutipan penulisan tugas akhir menggunakan pendekatan rule based
    </div>
</div>
<div class="input-group rounded">
    <input type="search" class="form-control rounded" name="keyword" id="keyword"  placeholder="Cari Judul..." aria-label="Search"
    aria-describedby="search-addon" />
    <button class="input-group-text btn-warning border-0" id="search-addon" onclick="search()">
        <i class="fas fa-search"></i>
    </button>
</div>
@endsection

@section('js')
    <script>

        $('#keyword').keypress((e) => {
            if (e.keyCode == 13)
                search()
        })

        const search = () => {
            let keyword = $('input[name=keyword]').val()
            window.location.href = `{{route('search')}}?keyword=${keyword}`
        }
    </script>
@endsection
