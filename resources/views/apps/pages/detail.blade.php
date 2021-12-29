@extends('apps.partials.main')

@section('title', 'DETAIL')    

@section('css')
<style>
    .scroll {
        max-height: 90vmin;
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
    {{-- <div class="col-12">
        <div class="card ">
            <div class="card-header"><h4>Hasil Ekstraksi Data</h4></div>
            <div class="card-body">
                <div id="load-content" class="scroll">
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>List Ditemukan</h4> </div>
            <div class="card-body scroll">
                <div class="row">
                    <div class="col-12 mb-5" id="count-kutipan" style="font-weight: bold">
                        0 Kutipan Ditemukan
                    </div>
                </div>
                <div class="row" id="list-data"></div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>Data Kutipan</h4></div>
            <div class="card-body scroll">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kutipan</th>
                            <th>Kalimat Kutipan</th>
                        </tr>
                    </thead>
                    <tbody id="list-kutipan"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>Data Error</h4></div>
            <div class="card-body scroll">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kutipan</th>
                            <th>Kalimat Kutipan</th>
                        </tr>
                    </thead>
                    <tbody id="list-kutipan-error"></tbody>
                </table>
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
            let countKutipan = 0;
            let countErrorKutipan = 0;
            data.files.map((e) => {
                id = e.id
                url = "{{route('convertion.file', 'dataID')}}".replace('dataID', id)

                documentText = e.text_format

                let documents = documentText.split('.')

                $.each(documents, function (index, docs) { 
                    let matchesAPPAStyle = docs.match(/\((.*?)\)/g);  // dari text menghasilkan array  
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
                                    let getStringOnly = documents[index].replace(/\s/g,'').replace(string.replace(/\s/g,''), '')
                                    let sentences = getStringOnly.length < 5 ? documents[index-1] : documents[index]

                                    countKutipan++
                                    // documentText = documentText.replace(replace, `<span class="text-uppercase" style="font-weight: bold">${list.replace(/[()]/g,'')}</span>`)
                                    document.getElementById('list-data').innerHTML += 
                                    `
                                        <div class="col-2">${list}</div>
                                    `
                                    document.getElementById('list-kutipan').innerHTML += 
                                        `
                                        <tr>
                                            <td>${countKutipan}</td>
                                            <td style="width: 200px">${list}</td>
                                            <td style="text-align: left">${sentences}</td>
                                        </tr>
                                        `
                                }
                            } else { 
                                let find = list;
                                let getStringOnly = documents[index].replace(/\s/g,'').replace(string.replace(/\s/g,''), '')
                                let sentences = getStringOnly.length < 5 ? documents[index-1] : documents[index]


                                countErrorKutipan++

                               
                                document.getElementById('list-kutipan-error').innerHTML += 
                                    `
                                    <tr>
                                        <td>${countErrorKutipan}</td>
                                        <td style="width: 200px">${list}</td>
                                        <td style="text-align: left">${sentences}</td>
                                    </tr>
                                    `
                            }
                        })
                    }
                }); 
                $.each(documents, function (index, docs) { 
                    let matchesIEEEStyle = docs.match(/\[(.*?)\]/g);  // dari text menghasilkan array   
                    if(matchesIEEEStyle){
                        matchesIEEEStyle.map((list) => {
                            // menghapus semua spasi dan bracket
                            string = (list)
                            .replace(/ /g,'')
                            .split(":")
                            .pop()
                            .replace(/[\[\]']+/g,'')

                            console.log(/[^$,\.\d]/.test(string), string, string.includes(','), list)

                            // force to parse integer
                            stringParse = parseInt(string)
                            
                            if(!/[^$,\.\d]/.test(string) &&  !string.includes(',')) {
                                // check string apakah valid numeric
                                if(typeof stringParse === 'number') {
                                    let find = list;
                                    let replace = new RegExp(find, 'g');
                                    let sentences = docs
                                    if(!isNaN(stringParse)) {
                                        sentences = documents[index]   
                                        if(sentences.length < 20) {
                                            let i = index;
                                            sentences = documents[i].concat(documents[i + 1])
                                        }
                                        countKutipan++

                                        // documentText = documentText.replace(replace, `<span class="text-uppercase" style="font-weight: bold">${list.replace(/[()]/g,'')}</span>`)
                                        document.getElementById('list-data').innerHTML += 
                                        `
                                            <div class="col-2">${list}</div>
                                        `
                                        document.getElementById('list-kutipan').innerHTML += 
                                            `
                                            <tr>
                                                <td>${countKutipan}</td>
                                                <td style="width: 200px">${String(list)}</td>
                                                <td style="text-align: left">${sentences}</td>
                                            </tr>
                                            `
                                    } 
                                } 
                            } else {
                                sentences = documents[index]   
                                if(sentences.length < 20) {
                                    let i = index;
                                    sentences = documents[i].concat(documents[i + 1])
                                }

                                countErrorKutipan++

                            
                                document.getElementById('list-kutipan-error').innerHTML += 
                                    `
                                    <tr>
                                        <td>${countErrorKutipan}</td>
                                        <td style="width: 200px">${list}</td>
                                        <td style="text-align: left">${sentences}</td>
                                    </tr>
                                    `
                            }
                        })
                    }
                    
                })

            })

            // // console.log(countKutipan)
            $('#count-kutipan').html(`${countKutipan} Kutipan Ditemukan`)
        })
        
    });
</script>
@endsection