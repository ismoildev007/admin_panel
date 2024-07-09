{{--<x-layouts.admin>--}}
{{--    <div class="px-3">--}}
{{--        <!-- Start Content-->--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- start page title -->--}}
{{--            <div class="py-3 py-lg-4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <h4 class="page-title mb-0">Kompaniya tarixi tahrirlash</h4>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="d-none d-lg-block">--}}
{{--                            <ol class="breadcrumb m-0 float-end">--}}
{{--                                <button class="btn" onClick="changeLang('uz')" style="background: #0c4a4a">UZ</button>--}}
{{--                                <button class="btn" onClick="changeLang('ru')" style="background-color: #0c4a6e">RU</button>--}}
{{--                                <button class="btn" onClick="changeLang('en')" style="background-color: #0c4a8e">EN</button>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body py-md-30">--}}
{{--                <form action="{{ route('company_history.update', $company_history->id) }}" method="post" enctype="multipart/form-data" onsubmit="updateEditorContent()">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    --}}{{-- uz --}}

{{--                    <div class="col-md-3">--}}
{{--                        <input type="date" name="date" class="form-control mx-2 mb-3" value="{!! $company_history->date !!}">--}}
{{--                    </div>--}}
{{--                    --}}{{-- description_uz --}}
{{--                    <div class="container-fluid uz">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h4 class="header-title">text_uz</h4>--}}
{{--                                        <p class="sub-header">Snow is a clean, flat toolbar theme.</p>--}}
{{--                                        <div id="editor_uz" style="height: 300px;">--}}
{{--                                            {!! $company_history->text_uz !!}--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" name="text_uz" id="text_uz">--}}
{{--                                    </div> <!-- end card-body-->--}}
{{--                                </div> <!-- end card-->--}}
{{--                            </div><!-- end col -->--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    --}}{{-- description_ru --}}
{{--                    <div class="container-fluid ru">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h4 class="header-title">text_ru</h4>--}}
{{--                                        <p class="sub-header">Snow is a clean, flat toolbar theme.</p>--}}
{{--                                        <div id="editor_ru" style="height: 300px;">--}}
{{--                                            {!! $company_history->text_ru !!}--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" name="text_ru" id="text_ru">--}}
{{--                                    </div> <!-- end card-body-->--}}
{{--                                </div> <!-- end card-->--}}
{{--                            </div><!-- end col -->--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    --}}{{-- description_en --}}
{{--                    <div class="container-fluid en">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h4 class="header-title">text_en</h4>--}}
{{--                                        <p class="sub-header">Snow is a clean, flat toolbar theme.</p>--}}
{{--                                        <div id="editor_en" style="height: 300px;">--}}
{{--                                            {!! $company_history->text_en !!}--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" name="text_en" id="text_en">--}}
{{--                                    </div> <!-- end card-body-->--}}
{{--                                </div> <!-- end card-->--}}
{{--                            </div><!-- end col -->--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    --}}{{-- umumiy --}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="layout-button mt-0">--}}
{{--                                <a href="{{ route('company_history.index') }}" class="btn btn-default btn-squared btn-light px-20">Cancel</a>--}}
{{--                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Save</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Quill JS -->--}}
{{--    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}

{{--    <script>--}}
{{--        var editorUz = new Quill('#editor_uz', {--}}
{{--            theme: 'snow'--}}
{{--        });--}}
{{--        var editorRu = new Quill('#editor_ru', {--}}
{{--            theme: 'snow'--}}
{{--        });--}}
{{--        var editorEn = new Quill('#editor_en', {--}}
{{--            theme: 'snow'--}}
{{--        });--}}

{{--        function updateEditorContent() {--}}
{{--            document.getElementById('text_uz').value = editorUz.root.innerHTML;--}}
{{--            document.getElementById('text_ru').value = editorRu.root.innerHTML;--}}
{{--            document.getElementById('text_en').value = editorEn.root.innerHTML;--}}
{{--        }--}}
{{--    </script>--}}
{{--</x-layouts.admin>--}}

@extends('components.layouts.admin')
@section('content')
    <main class="nxl-container">

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kompaniya tarixi</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>

                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <button class="btn" onClick="changeLang('uz')" style="background: #0c4a4a">UZ</button>
                            <button class="btn" onClick="changeLang('ru')" style="background-color: #0c4a6e">RU</button>
                            <button class="btn" onClick="changeLang('en')" style="background-color: #0c4a8e">EN</button>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <form action="{{ route('company_history.update', $company_history->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row mb-4 align-items-center lang-section lang-uz">
                                    <div class="col-lg-2 text-center">
                                        <label for="descriptionInput" class="fw-semibold">Text Uz: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_uz">{{ $company_history->text_uz }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center lang-section lang-ru d-none">
                                    <div class="col-lg-2 text-center">
                                        <label for="descriptionInput" class="fw-semibold">Text Ru: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_ru">{{ $company_history->text_ru }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center lang-section lang-en d-none">
                                    <div class="col-lg-2 text-center">
                                        <label for="descriptionInput" class="fw-semibold">Text En: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_en">{{ $company_history->text_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-2 text-center">
                                        <label for="usernameInput" class="fw-semibold">Date: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-link-2"></i></div>
                                            <input type="text" class="form-control" id="usernameInput" placeholder="Date" name="date" value="{{ $company_history->date }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-2 text-center">
                                        <label for="usernameInput" class="fw-semibold">Image: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-link-2"></i></div>
                                            <input type="file" class="form-control" id="usernameInput" name="image">
                                        </div>
                                        @if ($company_history->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $company_history->image) }}" alt="Image" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row  mb-4 align-items-center">
                                    <div class="col-md-6 d-flex justify-content-end w-100">
                                        <a href="{{ route('company_history.index') }}" type="submit" class="btn btn-light btn-default btn-squared  w-25">
                                            <i class="fa fa-arrow-left"></i>
                                            Orqaga
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-default btn-squared  w-25">
                                            Saqlash
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
    </main>
    <script>
        function changeLang(lang) {
            document.querySelectorAll('.lang-section').forEach(function(section) {
                section.classList.add('d-none');
            });
            document.querySelectorAll('.lang-' + lang).forEach(function(section) {
                section.classList.remove('d-none');
            });
        }
    </script>

@endsection
