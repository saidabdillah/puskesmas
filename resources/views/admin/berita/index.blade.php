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
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="paymentList">
                                        <thead>
                                            <tr>
                                                <th class="wd-30">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input" id="checkAllPayment">
                                                            <label class="custom-control-label" for="checkAllPayment"></label>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th class="text-end">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr class="single-item">
                                                    <td>
                                                        <div class="item-checkbox ms-1">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                                                                <label class="custom-control-label" for="checkBox_1"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ Str::limit($post->title, 50) }}</td>
                                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="{{ route('posts.index', $post->slug) }}" class="avatar-text avatar-md">
                                                                <i class="feather feather-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.post.edit', $post->slug) }}" class="avatar-text avatar-md">
                                                                <i class="feather feather-edit"></i>
                                                            </a>
                                                            <a href="invoice-view.html" class="avatar-text avatar-md">
                                                                <i class="feather feather-trash-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>

        @include('components.admin.footer')


    </main>

    @push('scripts')
    <script src="{{ asset('assets/vendor/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/dataTables.bs5.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/payment-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>

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
    @endpush
@endsection


