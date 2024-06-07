<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('images/Logo.png') }}" type = "image/x-icon">
    <Title>Baggora: Tempat Thrifting Sekitaran Kampus</Title>

    <!-- Material -->
    <link rel="stylesheet" href="{{ asset('css/detailbarang-style.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
</head>

<body>
    
    <!-- Page Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Search model -->
    <div class="search-model font-monospace">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <div class="container-fluid px-0 bg-body-tertiary">

    <!-- Header -->
    <header class="shadow fixed-top d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 bg-body-secondary">
        <div class="col-md-3 mb-md-0">
            <a href="/home" class="d-inline-flex link-body-emphasis text-decoration-none"> 
                <img src="{{ asset('images/Logo-WithName.png') }}" class="logo" alt="" width="75%">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a class="nav-link px-4 text-black fs-5 fw-semibold font-monospace" href="/home">Home</a></li>
            <li><a class="nav-link px-4 text-secondary fs-5 fw-semibold font-monospace" href="/barang-1">Barang</a></li>
            <li><a class="nav-link px-4 text-black fs-5 fw-semibold font-monospace" href="/tentang">Tentang</a></li>
            <li><a class="nav-link px-4 text-black fs-5 fw-semibold font-monospace" href="/kontak">Kontak</a></li>
        </ul>

        <div class="col-md-auto"></div>

        <div class="header-right col-md-1 text-end d-flex align-items-center">
            <img src="{{ asset('images/icons/search.png') }}" alt="" class="search-trigger me-3">
            @auth
            <a href="/keranjang" class="me-3">
                <img src="{{ asset('images/icons/bag.png') }}" alt="">
                <span class="font-monospace">{{ count((array) session('keranjang')) }}</span>
            </a>
            @else
            <a href="#" class="me-3">
                <img src="{{ asset('images/icons/bag.png') }}" alt="" data-bs-toggle="modal" data-bs-target="#modalSignIn">
                <span class="font-monospace">0</span>
            </a>
            @endauth
            
            @auth
                <div class="dropdown font-monospace">
                    <img src="{{ asset('images/icons/man.png') }}" alt="profile" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log Out</button>
                            </form>
                    </ul>
                </div>
                
            @else
                <img src="images/icons/man.png" alt="" data-bs-toggle="modal" data-bs-target="#modalSignIn">
            @endauth
        </div>
    </header>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Breadcrumbs -->
        <div class="container mt-5 font-monospace">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="15" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <span class="visually-hidden">Home</span>
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="/barang-1">Barang</a>
                    </li>

                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>

        <!-- Product Page Section Beign -->
        <section class="product-page mb-5 font-monospace">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product">
                            <div class="product-img">
                                <figure>
                                    <img src="{{ asset($bekas->image) }}" alt="{{ $bekas->nama_barang }}">
                                </figure>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="product-content">
                            <h2>{{ $bekas->nama_barang }}</h2>

                            <div class="pc-meta">
                                <h5>Rp {{ $bekas->harga }}</h5>
                                <div class="rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffd200" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffd200" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffd200" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffd200" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#ffd200" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                </div>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis.
                            </p>

                            <ul class="tags">
                                <li><span>Category :</span> Isi Disini</li>
                                <li><span>Tags :</span> Apa,  Apa,  Apa,  Apa, Apa</li>
                            </ul>

                            <div class="product-quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="{{ route('addBarang.ke.keranjang', $bekas->id_barang) }}"><button type="button" class="btn btn-outline-dark btn-lg px-4">Add to cart</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <div class="container border-top border-2 border-black font-monospace">
            <footer class="pt-5">
                <div class="row">
                    <div class="col-6 col-md-3 mb-3">
                        <h5 class="fw-bold">KONTAK</h5>
                        <p> <strong> Alamat : </strong> Kamar 212 - Asrama Putra Telkom University Gedung 4 (LIKI)</p>
                        <p> <strong> Nomor Telepon : </strong> +62 823-6163-8270</p>
                        <p> <strong> Jam Buka : </strong> 08.00 - 17.00</p>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5 class="fw-bold">TENTANG</h5>
                        <ul class="nav flex-column" style="cursor: pointer;">
                            <li class="nav-item mb-2"><a href="/tentang" class="nav-link p-0 text-body-secondary">Tentang Kami</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacy Policy</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Terms & Conditions</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5 class="fw-bold">AKUNKU</h5>
                        <ul class="nav flex-column" style="cursor: pointer;">
                            <li class="nav-item mb-2"><a href="/keranjang" class="nav-link p-0 text-body-secondary">Lihat Keranjang</a></li>
                            <li class="nav-item mb-2"><a href="https://wa.me/82361638270" class="nav-link p-0 text-body-secondary">Customer Service</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 offset-md-1 mb-3">
                        <form id="formNewsletter">
                            @csrf
                            <h5 class="fw-bold">Isi Untuk Dapatkan Berita Promo</h5>
                            <p>Dapatkan update melalui email tentang Promo Special dan Penawaran Menarik lainnya.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter" class="visually-hidden">Alamat Emailmu</label>
                                <input type="text" class="form-control" placeholder="Email address" name="email">
                                <button class="btn btn-dark" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-3 my-3 border-top border-2 border-black">
                    <p>© 2023, Kelompok 6 - Tugas Besar Mata Kuliah Web Programming. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                </div>
            </footer>
        </div>

    </div>

    <!-- Modals Sign Up -->
    <div class="modal fade bg-dark bg-opacity-25 p-4 py-md-5 font-monospace" tabindex="-1" role="dialog" id="modalSignUp">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Sign Up for free!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">

                    <form action="{{ route('user.register') }}" method="post" id="register_form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control rounded-3" id="floatingInputName" placeholder="John Hoe" required value="{{ old('name')}}">
                            <label for="floatingInputName">Name</label>
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control rounded-3" id="floatingInputUsername" placeholder="JohnHoe" required value="{{ old('username')}}">
                            <label for="floatingInputName">Username</label>
                            <span class="text-danger error-text username_error"></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control rounded-3" id="floatingInputEmail" placeholder="name@example.com" required value="{{ old('email')}}">
                            <label for="floatingInputEmail">Email address</label>
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" required value="{{ old('password')}}">
                            <label for="floatingPassword">Password</label>
                            <span class="text-danger error-text password_error"></span>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Sign Up</button>
                        <small class="text-body-secondary">Dengan mengklik Sign Up, Anda menyetujui ketentuan penggunaan.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Sign In -->
    <div class="modal fade bg-dark bg-opacity-25 p-4 py-md-5 font-monospace" tabindex="-1" role="dialog" id="modalSignIn">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Sign In!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="/login" method="post" id="login_form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control rounded-3" id="floatingInputEmail" placeholder="name@example.com" autofocus required value="{{ old('email')}}">
                            <label for="floatingInputEmail">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Sign In</button>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalSignUp" class="link-underline link-underline-opacity-0"><small class="text-body-secondary">Belum punya akun <span class="fw-bold">Baggora</span>?</small></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Subscription Success -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 font-monospace">
        <div id="liveToast-1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Subscription Update</strong>
                <small>a few seconds ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>

            <div class="toast-body">
                Selamat Anda telah melakukan subscription pada newsletter kami! Silahkan cek email Anda~
            </div>
        </div>
    </div>

    <!-- Toast Subscription Error -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 font-monospace">
        <div id="liveToast-2" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-danger">Subscription Update</strong>
                <small>a few seconds ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>

            <div class="toast-body">
                Perhatian! Anda telah melakukan subscription pada newsletter kami sebelumnya! Silahkan cek email Anda~
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>