<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/Logo.png" type = "image/x-icon">
    <Title>Baggora: Tempat Thrifting Sekitaran Kampus</Title>

    <!-- Material -->
    <link rel="stylesheet" href="css/barang-style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                <img src="images/Logo-WithName.png" class="logo" alt="" width="75%">
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
            <img src="images/icons/search.png" alt="" class="search-trigger me-3">
            @auth
            <a href="/keranjang" class="me-3">
                <img src="images/icons/bag.png" alt="">
                <span class="font-monospace">{{ count((array) session('keranjang')) }}</span>
            </a>
            @else
            <a href="#" class="me-3">
                <img src="images/icons/bag.png" alt="" data-bs-toggle="modal" data-bs-target="#modalSignIn">
                <span class="font-monospace">0</span>
            </a>
            @endauth

            @auth
                <div class="dropdown font-monospace">
                    <img src="images/icons/man.png" alt="profile" data-bs-toggle="dropdown">
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

        <!-- Banner Awal -->
        <div class="mt-5 font-monospace">
            <div class="p-5 text-center bg-body-tertiary">
                <div class="container py-5" style="background-image: url('images/banner/b2.jpg');">
                    <h1 class="text-light">#Pilih Bareng yang Kamu Inginkan!</h1>
                    <p class="col-lg-8 mx-auto text-light lead">
                        Diskon hingga 70% - Untuk Semua Kebutuhan Perkuliahan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Product -->
        <section id="product-1" class="section-p1 m-5 font-monospace">
            <p class="fs-1 fw-bold"> Clearance Sale </p>
            <P class="fs-6 fw-normal"> Bazar Barang Second-in-hand </P>
            <div class="pro-container">
                @auth
                @foreach ($tb_barangbekas as $bekas)
                <div class="pro" onclick="window.location.href='{{ $bekas->file }}';">
                    <img src="{{ $bekas->image }}" alt="{{ $bekas->nama_barang }}">
                    <div class="des">
                        <span> {{ $bekas->nama_merk }} </span>
                        <h5> {{ $bekas->nama_barang }} </h5>
                        <div class="star"> 
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4> Rp {{ $bekas->harga }} </h4>
                    </div>
                    <a href="{{ route('addBarang.ke.keranjang', $bekas->id_barang) }}"> <i class="fa-solid fa-cart-plus"></i> </a>
                </div>
                @endforeach
                @else
                @foreach ($tb_barangbekas as $bekas)
                <div class="pro" onclick="#" data-bs-toggle="modal" data-bs-target="#modalSignIn">
                    <img src="{{ $bekas->image }}" alt="{{ $bekas->nama_barang }}">
                    <div class="des">
                        <span> {{ $bekas->nama_merk }} </span>
                        <h5> {{ $bekas->nama_barang }} </h5>
                        <div class="star"> 
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4> Rp {{ $bekas->harga }} </h4>
                    </div>
                    <a href="#"> <i class="fa-solid fa-cart-plus"></i> </a>
                </div>
                @endforeach
                @endauth  
            </div>
        </section>

        <!-- Pagination -->
        <nav aria-label="Pagination" class="mb-5 font-monospace">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="/barang-2" style="color: black;">Previous</a>
                </li>

                <li class="page-item"><a class="page-link" href="/barang-1" style="color: black;">1</a></li>
                <li class="page-item"><a class="page-link" href="/barang-2" style="color: black;">2</a></li>
                <li class="page-item" aria-current="page">
                    <span class="page-link" style="background-color: black; color: white;">3</span>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="/barang-3" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            </ul>
        </nav>

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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>