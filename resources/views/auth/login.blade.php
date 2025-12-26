<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Admin - Login</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/assets/vendors') }}/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('public/assets/vendors') }}/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('public/assets/vendors') }}/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/style.css" />

</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('public/assets/vendors') }}/images/deskapp-logo.svg" alt="" />
                </a>
            </div>
        </div>
    </div>
    <div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('public/assets/vendors') }}/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="bg-white login-box box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Admin Login </h2>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="input-group custom">
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Email" />

                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            id="remember_me" />
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-0 input-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('public/assets/vendors') }}/scripts/core.js"></script>
    <script src="{{ asset('public/assets/vendors') }}/scripts/script.min.js"></script>
    <script src="{{ asset('public/assets/vendors') }}/scripts/process.js"></script>
    <script src="{{ asset('public/assets/vendors') }}/scripts/layout-settings.js"></script>
</body>

</html>
