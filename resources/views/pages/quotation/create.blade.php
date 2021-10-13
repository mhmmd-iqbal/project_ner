@extends('partials.main')

@section('title', 'DATA USER')

@section('scripts')
    <script>
        // $(document).ready(function () {
        // });

        const formatted         = document.getElementById('formatted')
        const sentences         = document.getElementById('sentences')
        const modalSentences    = document.getElementById('modal-sentences')
        const modalDescriptions = document.getElementById('modal-descriptions')
        const descriptions      = document.getElementById('descriptions')
        const formSubmit        = document.getElementById('form-submit')
        const fixedStringValue  = document.getElementById('fixed-string-value')
        const nameValue         = document.getElementById('name-value')
        const punctuationvalue  = document.getElementById('punctuation-value')
        
        function check_formatted_first_value () {
            if (formatted.value) { 
                return ' + '
            } else {
                return ''
            }
        }

        const open_modal_sentences = () => {
            $(modalSentences).modal('toggle');
        }
        
        const open_modal_descriptions = () => {
            $(modalDescriptions).modal('toggle')

        }

        const add_sentences     = () => {
            formatted.innerHTML += `${check_formatted_first_value()} ${sentences.value} `
            $(modalSentences).modal('toggle');
            fixedStringValue.value = sentences.value
        }

        const add_descriptions  = () => {
            formatted.innerHTML += `${check_formatted_first_value()}  (${descriptions.value}) `
            $(modalDescriptions).modal('toggle');
            nameValue.value     = '1'
        }

        const add_punctuations  = () => {
            formatted.innerHTML     += `${check_formatted_first_value()}  (!,.?) `
            punctuationvalue.value  = '1'
        }

        const add_additional_sentences  = () => {
            formatted.innerHTML += `${check_formatted_first_value()}  ..... `
        }

        const reset_formatted   = () => {
            $(formSubmit).trigger('reset')
        } 

        const add_format_name_on_description = () => {
            descriptions.innerHTML += ' nama '
        }

        const add_format_numeric_on_describtion = () => {
            descriptions.innerHTML += ' angka '
        }

        const add_format_year_on_description = () => {
            descriptions.innerHTML += ' tahun '
        }

        const add_format_colon_on_description = () => {
            descriptions.innerHTML += ' : '
        }   

        const add_format_colom_on_description = () => {
            descriptions.innerHTML += ' , '
        }     

        const reset_descriptions    = () => {
            descriptions.innerHTML  = ''
        }

        const store_formatted = () => {
            $(formSubmit).trigger('submit')
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
                <h4 class="page-title">Data Format Kutipan</h4>
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
                                Quotation
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
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="d-flex justify-content-right">
                                <button class="btn btn-primary btn-sm mx-2" onclick="open_modal_sentences() ">
                                    Tambah Kalimat
                                </button>
                                <button class="btn btn-primary btn-sm mx-2" onclick="open_modal_descriptions() ">
                                    Tambah Keterangan
                                </button>
                                <button class="btn btn-primary btn-sm mx-2" onclick="add_additional_sentences() ">
                                    Tambah Kalimat Diambil
                                </button>
                                <button class="btn btn-primary btn-sm mx-2" onclick="add_punctuations() ">
                                    Tambah Tanda Baca
                                </button>
                            </div>
                        </div>

                        <div class="col-12 mx-2 pt-3">
                            <form action="{{route('quotation.store')}}" id="form-submit" method="POST">
                                @csrf
                                <textarea name="formatted" class="form-control" id="formatted" cols="30" rows="10" readonly style="resize: none"></textarea>
                                <input type="hidden" name="fixed_string" id="fixed-string-value" />
                                <input type="hidden" name="name" id="name-value" value="0" />
                                <input type="hidden" name="punctuation" id="punctuation-value" value="0" />
                            </form>
                        </div>
                        <div class="col-12 mx-2 pt-3">
                            <button
                                type="button"
                                class="
                                btn btn-danger btn-sm
                                text-white
                                waves-effect
                                text-start
                                "
                                onclick="reset_formatted()"
                            >
                                Reset Format Kutipan
                            </button>
                            <button
                                type="button"
                                class="
                                btn btn-success btn-sm
                                text-white
                                waves-effect
                                text-start
                                "
                                onclick="store_formatted()"
                            >
                            Simpan Kutipan
                            </button>
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
@endsection

@section('modal')
    {{-- Modal For Adding Sentences  --}}
    <div
        class="modal fade"
        id="modal-sentences"
        tabindex="-1"
        aria-labelledby="scroll-long-inner-modal"
        aria-hidden="true"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
    >
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">Data Format Kalimat</h4>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row border mt-3">
                            <div class="col-12">
                                <textarea placeholder="ex: Seperti yg diungkapkan oleh" name="" id="sentences" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        {{-- <div class="row border mt-3">
                            <div class="col-md-4 border-end bg-light py-3">.col-md-4</div>
                            <div class="col-md-4 ms-auto bg-light py-3">.col-md-4 .ms-auto</div>
                        </div>
                        <div class="row border mt-3">
                            <div class="col-md-3 ms-auto bg-light border-end py-3">
                                .col-md-3 .ms-auto
                            </div>
                            <div class="col-md-2 ms-auto bg-light py-3">.col-md-2 .ms-auto</div>
                        </div>
                        <div class="row border mt-3">
                            <div class="col-md-6 ms-auto bg-light py-3">.col-md-6 .ms-auto</div>
                        </div>
                        <div class="row border mt-3">
                            <div class="col-sm-9 border-end bg-light">
                                <div class="py-3">Level 1: .col-sm-9</div>
                                <div class="row border-top">
                                    <div class="col-8 col-sm-6 py-3 border-end">
                                        Level 2: .col-8 .col-sm-6
                                    </div>
                                    <div class="col-4 col-sm-6 py-3">Level 2: .col-4 .col-sm-6</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="
                        btn btn-danger
                        text-white
                        font-medium
                        waves-effect
                        text-start
                        "
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>
                    <button
                    class="btn btn-primary
                    font-medium
                    wave-effect
                    text-start
                    "
                    onclick="add_sentences() "
                    >
                        Masukkan Format
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal For Adding Descriptions  --}}
    <div
        class="modal fade"
        id="modal-descriptions"
        tabindex="-1"
        aria-labelledby="scroll-long-inner-modal"
        aria-hidden="true"
        ddata-bs-backdrop="static"
        data-bs-keyboard="false"
    >
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">Data Format Keterangan</h4>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col-12 my-2">
                                <div class="d-flex justify-content-right">
                                    <button class="btn btn-primary mx-1" onclick="add_format_name_on_description()">
                                        Format Nama
                                    </button>
                                    <button class="btn btn-primary mx-1" onclick="add_format_numeric_on_describtion()">
                                        Format Angka
                                    </button>
                                    <button class="btn btn-primary mx-1" onclick="add_format_year_on_description()">
                                        Format Tahun
                                    </button>
                                    <button class="btn btn-primary mx-1" onclick="add_format_colon_on_description()">
                                        Format :
                                    </button>
                                    <button class="btn btn-primary mx-1" onclick="add_format_colom_on_description()">
                                        Format ,
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea placeholder="ex. nama : angka" readonly name="" id="descriptions" cols="30" rows="10" class="form-control" style="resize: none"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="
                        btn btn-danger
                        text-white
                        font-medium
                        waves-effect
                        text-start
                        "
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>
                    <button
                        class="btn 
                        btn-secondary 
                        font-medium 
                        waves-effect 
                        text-start"
                        onclick="reset_descriptions()"
                    >
                        Reset Format
                    </button>
                    <button
                    class="btn btn-primary
                    font-medium
                    wave-effect
                    text-start
                    "
                    onclick="add_descriptions() "
                    >
                        Masukkan Format
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection