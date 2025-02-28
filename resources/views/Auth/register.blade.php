<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ !empty($meta_title) ? $meta_title : '' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @if(!empty($meta_keywords))
    <meta content="{{ $meta_keywords }}" name="keywords" />
    @endif
    @if(!empty($meta_description))
      
    <meta content="{{ $meta_description }}" name="description" />
    @endif

    <!-- Favicons -->
    <link href="{{ url('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('public/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ url('') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ url('public/assets/img/logo.png') }}" alt="">
                                    <span class="d-none d-lg-block">Blog</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" id="yourName" required>
                                            <div style="color: red">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" id="yourEmail" required>
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>


                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div style="color: red">{{ $errors->first('password') }}</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ url('login') }}">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('public/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('public/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('public/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ url('public/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('public/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('public/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('public/assets/js/main.js') }}"></script>

</body>

</html>
