<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login - Rock n' Roll Store </title>
    <link href="{{ asset('assets2/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets2/css/mdb.min.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets2/images/logo2.png') }}" type="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet">
    <style>
        @font-face {
            font-family: "Megadeth";
            src: url(assets2/fonts/Megadeth.ttf);
        }

        @font-face {
            font-family: "Queen";
            src: url(assets2/fonts/Queen.ttf);
        }

        .Megadeth {
            font-family: "Megadeth", sans-serif;
        }

        .Poppins {
            font-family: "Poppins", sans-serif;
        }

        .Queen {
            font-family: "Queen", sans-serif;
        }
    </style>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <style>
            .gradient-custom-2 {
                /* fallback for old browsers */
                background: #fccb90;
                padding: ;

                /* Chrome 10-25, Safari 5.1-6 */

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, #0400ff, #3500f3, #6200ff, #00ccff);
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }
        </style>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    @if (session('berhasil'))
                        <div class="alert alert-success">
                            <h6>Akun berhasil didaftarkan.</h6>
                            <h6>{{ session('berhasil') }}</h6>
                        </div>
                    @endif
                    @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="text-center">
                                            <img src="assets2/images/Logo1.png" style="width: 300px;" alt="logo">
                                        </div>

                                        <form>
                                            <p class="Poppins fs-5 mt-3 ">Login ke akun anda!!</p>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    required autocomplete="off" />
                                                <label class="form-label" for="email">Alamat Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" />
                                                <label class="form-label" for="password">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="text-center pt-1 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    type="submit">Masuk</button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2 Poppins">Tidak punya akun?</p>
                                                <a href="register" class="link-danger Poppins">Daftar</a></p>

                                            </div>

                                        </form>

                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 fs-3 Megadeth">Website dan Barang berkualitas</h4>
                                    <p class="small mb-0 Poppins">Bergabunglah menjadi anggota kami dan nikmati fitur
                                        fitur yang tersedia di website kami harga terjangkau aman di kantong
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>
