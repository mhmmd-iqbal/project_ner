@extends('apps.partials.main')

@section('title', 'ABOUT')

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
        padding-top: .5em;
        text-align: justify;
        font-style: italic
    }

    .card {
        /* border: 1px solid black; */
        border-radius: 10px
    }

    .card-header {
        height: 5em;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }
    
</style>
@endsection

@section('content')
<div class="content-search">
    <div class="row">
        <div class="col-12 text">
            <div class="card">
                <div class="card-header">
                    <h4>Tentang Aplikasi</h4>
                </div>
                <div class="card-body">
                    {{$about->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection