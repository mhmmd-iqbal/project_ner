@extends('apps.partials.main')

@section('css')
<style>
    .scroll {
        max-height: 50vmin;
        overflow-y: auto;
    }
    
    #load-content {
        text-align: justify
    }

    .card {
        border: 1px solid black;
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
<div class="row">
    <div class="col-12">
        <h3 class="text-uppercase"> {{$document->title}} </h3>
        <h5 class="text-uppercase"> <i> {{$document->creator}} </i>  </h5>
    </div>
    <div class="col-12">
        <div class="card ">
            <div class="card-header"><h4>Hasil Ekstraksi Data</h4></div>
            <div class="card-body">
                <div id="load-content" class="scroll">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>Daftar Kutipan</h4> </div>
            <div class="card-body">
                <div class="row scroll" id="list-data"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        let id  = {!! $document->id !!}
        let url = `{!!route('document.show', $document->id) !!}`
        ajaxRequest('GET', url)
        .then(data => {
            data.files.map((e) => {
                id = e.id
                url = "{{route('convertion.file', 'dataID')}}".replace('dataID', id)
                ajaxRequest('GET', url)
                .then(dataFile => {
                    if(dataFile.status === 'success'){
                        document.getElementById('load-content').innerHTML += `
                        <div class="p-2 mt-1">${dataFile.data}
                        </div>`

                        var matchesAPPAStyle = dataFile.data.match(/\((.*?)\)/g);
                        var matchesIAAStyle = dataFile.data.match(/\([.*?]\)/g)
                        if(matchesAPPAStyle){
                            matchesAPPAStyle.map((list) => {
                                string = (list)
                                .replace(/ /g,'')
                                .split(":").pop()
                                
                                // console.log(string)
                                if(string.indexOf(',') != -1 ) {
                                    // console.log(string.match(/\d+/))
                                    if(string.match(/\d+/) !== null  && (string.match(/\d+/)[0])
                                    .match(/^[0-9]{4}$/)) {
                                        console.log(list)
                                        document.getElementById('list-data').innerHTML += `<div class="col-2">${list}</div>`
                                    }

                                }

                                // if(('aku adalah 1990').match(/^(19[5-9]{1}[0-9]{1}|20(0[0-9]{1}|10))$/)) {
                                //     console.log(list)
                                // }
                                // document.getElementById('list-data').innerHTML += `<div class="col-2">${list}</div>`
                            })
                        }
                        
                        if(matchesIAAStyle){
                            matchesIAAStyle.map((list) => {
                                document.getElementById('list-data').innerHTML += `<div class="col-2">${list}</div>`
                            })
                        }
                    }
                })
                .catch()
            })
        })
        
    });
</script>
@endsection