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
            <div class="card-header"><h4>List Ditemukan</h4> </div>
            <div class="card-body">
                <div class="row" id="list-data"></div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>Data Kutipan</h4></div>
            <div class="card-body">
                <div id="list-kutipan"></div>
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
            let documentText = ''
            data.files.map((e) => {
                id = e.id
                url = "{{route('convertion.file', 'dataID')}}".replace('dataID', id)

                documentText = e.converted_text

                let matchesAPPAStyle = e.converted_text.match(/\((.*?)\)/g);  // dari text menghasilkan array
                let matchesIAAStyle = e.converted_text.match(/\([.*?]\)/g)
                // console.table(matchesAPPAStyle);
                
                if(matchesAPPAStyle){
                    matchesAPPAStyle.map((list) => {
                        // menghapus semua spasi
                        string = (list)
                            .replace(/ /g,'')
                            .split(":")
                            .pop()


                        // cek apakah ada tanda comma
                        if(string.indexOf(',') != -1 ) {
                            // cek apakah hasil tidak null dan di dalam string ada 4 integer berurutan
                            if(string.match(/\d+/) !== null  && (string.match(/\d+/)[0])
                            .match(/^[0-9]{4}$/)) {
                                let find = list;
                                let replace = new RegExp(find, 'g');
                                documentText = documentText.replace(replace, `<span style="font-weight: bold">${list.replace(/[()]/g,'')}</span>`)
                                document.getElementById('list-data').innerHTML += `<div class="col-2">${list}</div>`
                                document.getElementById('list-kutipan').innerHTML += 
                                    `
                                    <div class="row">
                                        <div class="col-3 text-left" style="border: 1px solid black;">
                                            ${list}
                                        </div>
                                        <div class="col-9 text-left" style="border: 1px solid black;">
                                            lorem ipsum
                                        </div>
                                    </div>
                                    `
                            }
                        }
                    })
                }

                document.getElementById('load-content').innerHTML += 
                    `<div class="p-2 mt-1">${documentText}</div>`
            })
        })
        
    });
</script>
@endsection