@extends('apps.partials.main')

@section('css')
<style>
    .content-search {

    }

    .content-search .text {
        font-size: small;
        text-align: left;
        padding: 1em
    }

    .content-search .text i {
        font-weight: bold
    }

    .content-search .result {
        /* height: 10em; */
        /* border: 1px solid black; */
        text-align: left;
        padding: 1em;
        border-radius: 10px
    }

    .content-search .result .description {
        text-align: justify;
        font-style: italic
    }
</style>
@endsection

@section('content')
<form action="">
    <div class="input-group rounded">
        <input type="search" class="form-control rounded" placeholder="Cari Judul..." aria-label="Search"
        aria-describedby="search-addon" />
        <button class="input-group-text btn-primary border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
<div class="content-search">
    <div class="row">
        <div class="col-12 text">
            12 artikel ditemukan dalam kata kunci <i>Berlebihan</i>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach ($documents as $document)
            <div class="result my-2">
                <h4>
                    <a href="{{route('show', $document->id)}}"> {{$document->title}} </a>
                </h4>
                <div>Oleh <span>{{$document->creator}}</span></div>
                <div class="description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero dicta quis pariatur doloremque accusamus in doloribus sed laboriosam nam. Excepturi ipsam, reprehenderit iste cumque accusamus natus dolorem quod eius autem.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero dicta quis pariatur doloremque accusamus in doloribus sed laboriosam nam. Excepturi ipsam, reprehenderit iste cumque accusamus natus dolorem quod eius autem.
                </div>
            </div>
            <div class="result my-2">
                <h4>
                    <a href="{{route('show', $document->id)}}"> {{$document->title}} </a>
                </h4>
                <div>Oleh <span>{{$document->creator}}</span></div>
                <div class="description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero dicta quis pariatur doloremque accusamus in doloribus sed laboriosam nam. Excepturi ipsam, reprehenderit iste cumque accusamus natus dolorem quod eius autem.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero dicta quis pariatur doloremque accusamus in doloribus sed laboriosam nam. Excepturi ipsam, reprehenderit iste cumque accusamus natus dolorem quod eius autem.
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection