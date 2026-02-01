<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa Password - Rock n' Roll Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,100;1,200&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets2/images/logo2.png') }}" type="">
    <style>
        @font-face {
            font-family: "Megadeth";
            src: url({{ asset('assets2/fonts/Megadeth.ttf') }});
        }
        @font-face {
            font-family: "Queen";
            src: url({{ asset('assets2/fonts/Queen.ttf') }});
        }
        .Megadeth { font-family: "Megadeth", sans-serif; }
        .Queen { font-family: "Queen", sans-serif; }
        .Poppins { font-family: "Poppins", sans-serif; }
        .gradient-custom { background: linear-gradient(to right, #0400ff, #3500f3, #6200ff, #00ccff); }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase Queen">Lupa Password?</h2>
                                <p class="text-white-50 mb-5 Poppins">
                                    Masukkan email Anda untuk menerima kode verifikasi
                                </p>

                                @if (session('status'))
                                    <div class="alert alert-success mb-4" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger mb-4" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        <label class="form-label" for="email">Alamat Email</label>
                                        @error('email')
                                            <span class="invalid-feedback d-block mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim Kode Verifikasi
                                    </button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0 Poppins">
                                    Ingat password Anda? 
                                    <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a>
                                </p>
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