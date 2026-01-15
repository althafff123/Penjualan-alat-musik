@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Profile'])
@section('content')
    <div class="container mb-5 mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="d-flex align-items-center justify-content-end">

                <div class="dropdown front text-white mr-2">
                    <i class="fa fa-cog text-dark" type="button" data-toggle="dropdown" aria-expanded="true"></i>
                    <div class="dropdown-menu px-2">
                        <a class="dropdown-item m-0" href="/alamat">Alamat</a>

                        <a class="dropdown-item m-0" href="/profile/setting">Setting</a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <img class="card-img-top rounded-circle"
                    src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}"
                    alt="avatar" style="aspect-ratio: 1/1; object-fit: cover; max-width: 240px">
            </div>
            <div class="card-body">
                <h2 class="text-center">
                    {{ auth()->user()->name }}
                </h2>

                <p>
                    <i class="fa fa-envelope text-dark"></i> {{ auth()->user()->email }}
                </p>
                @if (auth()->user()->no_hp)
                    <p> <i class="fa fa-phone text-dark"></i> {{ auth()->user()->no_hp }}</p>
                @endif


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-danger logout">Logout
                </button>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $('.logout').on('click', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apakah Anda yakin ingin Logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: "{{ url('/logout') }}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            Swal.showValidationMessage('Gagal Logout')
                            window.location.reload()
                        }
                    });
                }
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Berhasil Logout', '', 'success')
                    window.location.reload()
                }
            })
        });
    </script>
@endsection
