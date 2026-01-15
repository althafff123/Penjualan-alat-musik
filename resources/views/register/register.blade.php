<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Register - Rock n' Roll Store </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets2/images/logo2.png') }}" type="">
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

        .Queen {
            font-family: "Queen", sans-serif;
        }


        .Poppins {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <form action="/register" method="POST" autocomplete="off">
                                        @csrf

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 Queen">Daftar Akun
                                        </p>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="name" name="name"
                                                    class="form-control" />
                                                <label class="form-label" for="name">Masukan Nama</label>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="no_hp" name="no_hp"
                                                    class="form-control" />
                                                <label class="form-label" for="no_hp">Nomor Telepon <span
                                                        class="text-optional text-danger">(Optional)</span></label>
                                                @error('no_hp')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email"
                                                    class="form-control" />
                                                <label class="form-label" for="email">Masukan Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa solid fa-key me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" />
                                                <label class="form-label" for="password">Masukan
                                                    Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control" />
                                                <label class="form-label" for="password_confirmation">Konfirmasi
                                                    Password</label>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="d-flex justify-content-center  mb-lg-3">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>

                                        </div>
                                    </form>
                                    <p class=" d-flex justify-content-center small Poppins">
                                        Sudah punya akun?<a href="login" class="link-danger ms-1 Poppins">Login</a>
                                    </p>



                                </div>
                                <div
                                    class="align-items-center col-lg-6 col-md-10 col-xl-7 d-flex justify-content-center order-1 order-lg-2">

                                    <img src="{{ asset('storage/' . $settings->logo_register) }}" class="img-fluid"
                                        width="800" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>


</html>
