@extends('components.layouts.admin')
@section('content')
    <main class="nxl-container">

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">About</h5>
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
                            <form action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4 align-items-center lang-section lang-uz">
                                    <div class="col-lg-2 text-center">
                                        <label for="addressInput" class="fw-semibold">Title UZ: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" cols="20" rows="2" placeholder="Title UZ" name="title_uz">{{ $about->title_uz }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center lang-section lang-ru d-none">
                                    <div class="col-lg-2 text-center">
                                        <label for="addressInput" class="fw-semibold">Title RU: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" cols="20" rows="2" placeholder="Title RU" name="title_ru">{{ $about->title_ru }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center lang-section lang-en d-none">
                                    <div class="col-lg-2 text-center">
                                        <label for="addressInput" class="fw-semibold">Title EN: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" cols="20" rows="2" placeholder="Title EN" name="title_en">{{ $about->title_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center lang-section lang-uz">
                                    <div class="col-lg-2 text-center">
                                        <label for="descriptionInput" class="fw-semibold">Text Uz: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-type"></i></div>
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_uz">{{ $about->description_uz }}</textarea>
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
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_ru">{{ $about->description_ru }}</textarea>
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
                                            <textarea class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Description" name="text_en">{{ $about->description_en }}</textarea>
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
                                        @if ($about->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $about->image) }}" alt="Image" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row  mb-4 align-items-center">
                                    <div class="col-md-6 d-flex justify-content-end w-100">
                                        <a href="{{ route('information.index') }}" type="submit" class="btn btn-light btn-default btn-squared  w-25">
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
