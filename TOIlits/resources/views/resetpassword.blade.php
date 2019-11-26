<!--

    =========================================================
    * Argon Dashboard - v1.1.0
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/argon-dashboard
    * Copyright 2019 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)
    
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Reset Password - Ini Lho ITS! 2020
        </title>
        <!-- Favicon -->
        <link href="images/logokecil.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="auth/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
        <link href="auth/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="auth/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    </head>
    
    <body class="bg-default">
        <div class="main-content">
            <!-- Header -->
            <div class="header bg-gradient-primary py-7 py-lg-8">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-6">
                                <h1 class="text-white">Reset Password</h1>
                                <p class="text-lead text-white">Masukkan password baru anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                    @if($message=Session::get('pesan'))
                                    <div class="alert alert-{{ Session::get('tipe') }}" role="alert">
                                        {{ $message }}
                                    </div>
                                    @endif
                                <form action="/proses_reset_password" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="kode" value="{{ $kode }}">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Password Baru" type="password" required pattern=".{6,12}"  title="8-12 karakter">
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            <footer class="py-5">
                <div class="container">
                    <div class="row align-items-center justify-content-xl-between">
                        <div class="col-xl-6">
                            <div class="copyright text-center text-xl-left text-muted">
                                Template by <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                    target="_blank">Creative Tim</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--   Core   -->
        <script src="auth/js/plugins/jquery/dist/jquery.min.js"></script>
        <script src="auth/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
    
    </html>