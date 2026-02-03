@extends('layouts.admin')
@section('content')
<main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Berita</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Lihat Berita</a></li>
                        <li class="breadcrumb-item">Bertia</li>
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
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">

                    <!--! BEGIN: [Team Progress] !-->
                    <div class="col-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Berita</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-header-action">
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="card-body custom-card-action">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="title">
                                </div>

                                <img id="img-preview"
                                    class="img-fluid rounded d-none"
                                    style="max-height: 200px;">

                                <div class="mb-3">
                                    <label class="form-label">Upload Gambar</label>
                                    <input type="file"
                                        name="image"
                                        class="form-control"
                                        accept="image/*"
                                        onchange="previewImage(this)">
                                </div>
                                <label for="x" class="form-label">body</label>
                                <input id="x" type="hidden" name="body">
                                <trix-editor input="x"></trix-editor>
                                <button type="submit" class="btn btn-primary mt-3">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--! END: [Team Progress] !-->
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
            <p><span>By: <a target="_blank" href="https://wrapbootstrap.com/user/theme_ocean" target="_blank">theme_ocean</a></span> • <span>Distributed by: <a target="_blank" href="https://themewagon.com" target="_blank">ThemeWagon</a></span></p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->


    </main>

    <script>
        document.addEventListener("trix-file-accept", function (event) {
            event.preventDefault();
        });

        function previewImage(input) {
            const preview = document.getElementById('img-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        // document.addEventListener("trix-attachment-add", function (event) {
        //     const attachment = event.attachment;

        //     if (attachment.file) {
        //         uploadTrixImage(attachment);
        //     }
        // });

        // function uploadTrixImage(attachment) {
        //     const formData = new FormData();
        //     formData.append("file", attachment.file);

        //     const xhr = new XMLHttpRequest();
        //     xhr.open("POST", "/upload-trix-image.php", true);

        //     xhr.upload.onprogress = function (e) {
        //         const progress = e.loaded / e.total * 100;
        //         attachment.setUploadProgress(progress);
        //     };

        //     xhr.onload = function () {
        //         if (xhr.status === 200) {
        //             const response = JSON.parse(xhr.responseText);
        //             attachment.setAttributes({
        //                 url: response.url
        //             });
        //         }
        //     };

        //     xhr.send(formData);
        // }
    </script>
@endsection


