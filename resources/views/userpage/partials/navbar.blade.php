 <header class="header_section" style="background: #0c0c0c">
     <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container"style="margin-top: -10px">
             <a class="navbar-brand mt-4" href="/">
                 <img src="{{ asset('storage/' . $settings->logo_navbar) }}" width="250">
             </a>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class=""> </span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav  mx-auto px-0">
                     <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                         <a class="nav-link fs-3" href="/">home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
                         <a class="nav-link fs-3" href="/produk">produk</a>
                     </li>
                     <li class="nav-item {{ Request::is('pembelajaran') ? 'active' : '' }}">
                         <a class="nav-link fs-3" href="/pembelajaran">pembelajaran</a>
                     </li>
                     <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                         <a class="nav-link fs-3" href="/about">tentang</a>
                     </li>
                     @auth
                         @if (auth()->user()->is_admin == 1)
                             <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                 <a class="nav-link fs-3" href="/dashboard">dashboard</a>

                             </li>
                         @endif
                     @endauth

                 </ul>
                 <div class="user_option">
                     <div class="dropdown front mr-2">
                         @auth
                             <img class="card-img-top rounded-circle"
                                 src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}"
                                 alt="avatar" type="button" data-toggle="dropdown" aria-expanded="false"
                                 style="aspect-ratio: 1/1; object-fit: cover; max-width: 30px">
                         @endauth
                         @guest
                             <i class="fa fa-user mt-1 {{ Request::is('login') || Request::is('alamat') || Request::is('profile') ? 'text-primary' : 'text-white' }}"
                                 type="button"data-toggle="dropdown" aria-expanded="false"></i>
                         @endguest
                         <div class="dropdown-menu px-2">
                             @guest <a class="dropdown-item m-0" href="login">login</a> @endguest
                             @auth
                                 <div class="m-0 text-center"> {{ auth()->user()->name }}</div>
                                 <hr>
                                 <a class="dropdown-item m-0" href="/profile">profile</a>
                                 <a class="dropdown-item m-0" href="/pesanan">Pesanan Saya</a>
                                 <a class="dropdown-item m-0" href="/pesanan_pembelajaran">Pembelajaran Saya</a>
                                  <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="border-0 d-block nav-link text-left w-100">Logout
                        </button>
                    </form>

                             @endauth
                         </div>

                     </div>

                     @auth
                         <a class="cart_link position-relative" href="/keranjang">
                             <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"
                                 style="top: -2px">
                                 {{ \App\Models\Keranjang::where('user_id', auth()->user()->id)->count() }}
                             </span>
                             <i style="font-size: 1.2em"
                                 class="fa fa-shopping-cart {{ Request::is('keranjang') ? 'text-primary' : 'text-white' }}"
                                 type="button"></i>
                         </a>
                     @endauth
                 </div>
             </div>
         </nav>
     </div>
 </header>
