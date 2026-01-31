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
                                <div class="card-header-action">
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="editor">
                                    <p>Hello from CKEditor 5 with jQuery!</p>
                                </div>
                            </div>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/47.4.0/ckeditor5.umd.js"></script>
    <script>
		$( document ).ready( () => {
			const {
				ClassicEditor,
				Essentials,
				Bold,
				Italic,
				Font,
				Paragraph
			} = CKEDITOR;

			ClassicEditor
				.create( $( '#editor' )[ 0 ], {
					licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODI3Nzc1OTksImp0aSI6ImNhMTQxMjJkLWMzMmEtNDAwNC04YzBjLTExMTUzYjI2NTQxZCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyJdLCJ2YyI6ImE5YTVmMzNkIn0.T3ozQ5aspPNJQOscp9aIo8Q_-c7tsAaVm5M-kbFsGNDSs-jh_Fre0FUREspSeSyzGc8h9OOByJf5Cw2I8U-jWw',
					plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
					toolbar: [
						'undo', 'redo', '|', 'bold', 'italic', '|',
						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
					]
				} )
				.then( editor => {
					// Editor initialized successfully.
					console.log( 'CKEditor 5 initialized with jQuery!' );
				} )
				.catch( error => {
					console.error( 'Error initializing CKEditor 5:', error );
				} );
		} );
	</script>
@endsection
