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
                ajaxRequest('GET', url)
                .then(dataFile => {
                    if(dataFile.status === 'success'){
                        document.getElementById('load-content').innerHTML += `
                        <div class="p-2 mt-1">${dataFile.data}
                        </div>`

                        documentText += dataFile.data

                        var matchesAPPAStyle = dataFile.data.match(/\((.*?)\)/g);
                        var matchesIAAStyle = dataFile.data.match(/\([.*?]\)/g)
                        if(matchesAPPAStyle){
                            matchesAPPAStyle.map((list) => {
                                string = (list)
                                .replace(/ /g,'')
                                .split(":")
                                .pop()
                                
                                if(string.indexOf(',') != -1 ) {
                                    console.log(string.match(/\d+/))
                                    if(string.match(/\d+/) !== null  && (string.match(/\d+/)[0])
                                    .match(/^[0-9]{4}$/)) {
                                        console.log(list)
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

                                // document.getElementById('list-kutipan').innerHTML += 
                                //     `<div class="col-2 text-left">
                                //         ${list}
                                //     </div>
                                //     <div class="col-10 text-left">
                                //         lorem ipsum
                                //     </div>
                                //     `
                            })
                        }
                        
                        // if(matchesIAAStyle){
                        //     matchesIAAStyle.map((list) => {
                        //         document.getElementById('list-data').innerHTML += `<div class="col-2">${list}</div>`
                        //     })
                        // }
                    }
                    // document.getElementById('load-content').innerHTML = `
                    //     <div class="p-2 mt-1">${dataFile.data}
                    //     </div>`
                })
                .catch()
            })
        })
        
    });
</script>
@endsection