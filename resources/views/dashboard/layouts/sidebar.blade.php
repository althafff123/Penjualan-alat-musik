<div id="kt_aside" class="aside aside-primary aside-dark aside-hoverable bg-primary" data-kt-drawer="true"
    data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <img src="{{ asset('assets2/images/logo1.png') }}" width="150px" alt="" srcset="">
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-dark aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
        </div>
    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item">
                    <a class="menu-link {{ Request::Is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <span class="menu-bullet">
                            <i class="fas fa-home text-light"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-white  text-uppercase fs-8 ls-1">Menu</span>
                    </div>
                </div>


                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/pesanan/1') || Request::is('dashboard/pesanan/2') || Request::is('dashboard/pesanan/3') || Request::is('dashboard/pesanan/4') || Request::is('dashboard/pesanan/5') || Request::is('dashboard/pesanan/6') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-money-check-alt text-light"></i>
                        </span>
                        <span class="menu-title">Pesanan</span>
                        <span class="badge badge-danger">{{ $semuaPesanan }}</span>

                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/1') ? 'active' : '' }}"
                                href="/dashboard/pesanan/1">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Menunggu pembayaran</span>
                                <span class="badge badge-danger">{{ $barangPembayaran }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/2') ? 'active' : '' }}"
                                href="/dashboard/pesanan/2">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Menunggu Konfirmasi</span>
                                <span class="badge badge-danger">{{ $barangKonfirmasi }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/3') ? 'active' : '' }}"
                                href="/dashboard/pesanan/3">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sedang Diproses</span>
                                <span class="badge badge-danger">{{ $barangDiproses }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/4') ? 'active' : '' }}"
                                href="/dashboard/pesanan/4">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dikirim</span>
                                <span class="badge badge-danger">{{ $barangDikirim }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/5') ? 'active' : '' }}"
                                href="/dashboard/pesanan/5">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Selesai</span>
                                <span class="badge badge-danger">{{ $barangSelesai }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan/6') ? 'active' : '' }}"
                                href="/dashboard/pesanan/6">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Gagal</span>
                                <span class="badge badge-danger">{{ $barangGagal }}</span>

                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/pesanan_pembelajaran/1') || Request::is('dashboard/pesanan_pembelajaran/2') || Request::is('dashboard/pesanan_pembelajaran/3') || Request::is('dashboard/pesanan_pembelajaran/4') || Request::is('dashboard/pesanan_pembelajaran/5') || Request::is('dashboard/pesanan_pembelajaran/6') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-tv text-light"></i>
                        </span>
                        <span class="menu-title">Pembelajaran</span>
                        <span class="badge badge-danger">{{ $semuaPembelajaran }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/1') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/1">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Menunggu pembayaran</span>
                                <span class="badge badge-danger">{{ $pembelajaranPembayaran }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/2') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/2">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Menunggu Konfirmasi</span>
                                <span class="badge badge-danger">{{ $pembelajaranKonfirmasi }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/3') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/3">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Perjalanan</span>
                                <span class="badge badge-danger">{{ $pembelajaranPerjalanan }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/4') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/4">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pembelajaran</span>
                                <span class="badge badge-danger">{{ $pembelajaranPembelajaran }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/5') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/5">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Selesai</span>
                                <span class="badge badge-danger">{{ $pembelajaranSelesai }}</span>

                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pesanan_pembelajaran/6') ? 'active' : '' }}"
                                href="/dashboard/pesanan_pembelajaran/6">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Gagal</span>
                                <span class="badge badge-danger">{{ $pembelajaranGagal }}</span>

                            </a>
                        </div>
                    </div>
                </div>


                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/kecamatan') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-map-marked text-light"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Wilayah</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/kecamatan') ? 'active' : '' }}"
                                href="/dashboard/kecamatan">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">kecamatan</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/kategori') || Request::is('dashboard/kategori/create') || Request::is('dashboard/barang') || Request::is('dashboard/barang/create') || Request::is('dashboard/pelatih') || Request::is('dashboard/pelatih/create') || Request::is('dashboard/pembelajaran') || Request::is('dashboard/pembelajaran/create') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-database text-light"></i>
                        </span>
                        <span class="menu-title">Master</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/kategori') ? 'active' : '' }}"
                                href="/dashboard/kategori">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/barang') ? 'active' : '' }}"
                                href="/dashboard/barang">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Barang</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pelatih') ? 'active' : '' }}"
                                href="/dashboard/pelatih">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pelatih</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/pembelajaran') ? 'active' : '' }}"
                                href="/dashboard/pembelajaran">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">pembelajaran</span>
                            </a>
                        </div>


                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/komentar') || Request::is('dashboard/komentar/edit') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-comments text-light"></i>
                        </span>
                        <span class="menu-title">Komentar</span>
                        <span class="badge badge-danger">{{ $komentar }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/komentar') ? 'active' : '' }}"
                                href="/dashboard/komentar">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Komentar</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Request::is('dashboard/rating') || Request::is('dashboard/rating/edit') || Request::is('dashboard/rating_pembelajaran') || Request::is('dashboard/rating_pembelajaran/edit') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-star text-light"></i>
                        </span>
                        <span class="menu-title">Rating</span>
                        <span class="badge badge-danger">{{ $totalRating }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/rating') ? 'active' : '' }}"
                                href="/dashboard/rating">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Rating Barang</span>
                                <span class="badge badge-danger">{{ $rating }}</span>

                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('dashboard/rating_pembelajaran') ? 'active' : '' }}"
                                href="/dashboard/rating_pembelajaran">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Rating Pembelajaran</span>
                                <span class="badge badge-danger">{{ $ratingPembelajaran }}</span>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('dashboard/setting') ? 'active' : '' }}"
                        href="/dashboard/setting">
                        <span class="menu-icon">
                            <i class="fas fa-cog text-light"></i>
                        </span>
                        <span class="menu-title">Setting</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
