@extends('components.layouts.admin')
@section('content')
<main class="nxl-container">

    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Yangiliklar</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Create</li>
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
                        <form action="{{ route('system_team.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-2 text-center">
                                    <label for="usernameInput" class="fw-semibold">Full Name: </label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-link-2"></i></div>
                                        <input type="text" class="form-control" id="usernameInput" placeholder="Full Name" name="full_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center lang-section lang-uz">
                                <div class="col-lg-2 text-center">
                                    <label for="descriptionInput" class="fw-semibold">Position Uz: </label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-type"></i></div>
                                        <input class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Position" name="position_uz"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center lang-section lang-ru d-none">
                                <div class="col-lg-2 text-center">
                                    <label for="descriptionInput" class="fw-semibold">Position Ru: </label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-type"></i></div>
                                        <input class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Position" name="position_ru"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center lang-section lang-en d-none">
                                <div class="col-lg-2 text-center">
                                    <label for="descriptionInput" class="fw-semibold">Position En: </label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-type"></i></div>
                                        <input class="form-control" id="myeditorinstance" cols="30" rows="5" placeholder="Position" name="position_en"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-2 text-center">
                                    <label for="usernameInput" class="fw-semibold">Email: </label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-link-2"></i></div>
                                        <input type="email" class="form-control" id="usernameInput" placeholder="Email" name="email">
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
                                        <input type="file" class="form-control" id="usernameInput" placeholder="Date" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-4 align-items-center">
                                <div class="col-md-6 d-flex justify-content-end w-100">
                                    <a href="{{ route('system_team.index') }}" type="submit" class="btn btn-light btn-default btn-squared  w-25">
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