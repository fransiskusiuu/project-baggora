<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/Logo.png" type = "image/x-icon">
    <Title>Baggora: Tempat Thrifting Sekitaran Kampus</Title>

    <!-- Material -->
    <link rel="stylesheet" href="css/profile-style.css" type="text/css">
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
                <li><a class="nav-link px-4 text-black fs-5 fw-semibold font-monospace" href="/barang-1">Barang</a></li>
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

        <!-- Profile Information -->
        <div class="container mt-5 p-5 border rounded bg-white shadow font-monospace">
            <h4 class="fw-bold">Profile Information</h4>
            <h6 class="mb-3">Update your account's profile information and email address.</h6>
            <form method="post" action="{{ route('update.profile') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ auth()->user()->name }}">
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ auth()->user()->email }}">
                </div>
            
                <button type="submit" class="btn btn-dark">Save</button>
            </form>
        </div>

        <!-- Update Password -->
        <div class="container mt-4 p-5 border rounded bg-white shadow font-monospace">
            <h4 class="fw-bold">Update Password</h4>
            <h6 class="mb-3">Ensure your account is using a long, random password to stay secure.</h6>
            <form method="post" action="{{ route('update.password') }}">
                @csrf
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" id="currentPassword" name="currentPassword">
                    @error('currentPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword">
                    @error('newPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="newPassword_confirmation">
                </div>
            
                <button type="submit" class="btn btn-dark">Save</button>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="container mt-4 mb-4 p-5 border rounded bg-white shadow font-monospace">
            <h4 class="fw-bold">Delete Account</h4>
            <h6 class="mb-4">Once your account is deleted, all of its resources and data will be<br>permanently deleted. Before deleting your account, please download any<br>data or information that you wish to retain.</h6>
            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete Account</button>
        </div>

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

    <!-- Modals Delete Profile -->
    <div class="modal fade bg-dark bg-opacity-25 p-4 py-md-5 font-monospace" tabindex="-1" role="dialog" id="modalDelete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0 fw-bold mb-3">Yakin akan menghapus?</h5>
                <p class="mb-0">Jika memilih Ya, Anda setuju untuk patuh terhadap seluruh kebijakan penghapusan akun.</p>
            </div>

            <form action="{{ route('user.destroy', ['user' => Auth::user()]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-footer flex-nowrap p-0">
                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 text-danger py-3 m-0 rounded-0 border-end"><strong>Ya</strong></button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </div>
            </form>
            
            </div>
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

    <!-- Toast Profile -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 font-monospace">
        <div id="liveToast-3" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Profile Update</strong>
                <small>a few seconds ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>

            <div class="toast-body">
                Data profile Anda telah berhasil diubah!
            </div>
        </div>
    </div>
    
    <!-- Toast Password -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 font-monospace">
        <div id="liveToast-4" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Password Update</strong>
                <small>a few seconds ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>

            <div class="toast-body">
                Password berhasil diubah!
            </div>
        </div>
    </div>

    <!-- Toast Password -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
         $(document).ready(function() {
            @if (session('SuccessGantiInfoProfile'))
                $('#liveToast-3').toast('show');
            @endif
        });

        $(document).ready(function() {
            @if (session('SuccessGantiPassword'))
                $('#liveToast-4').toast('show');
            @endif
        });
    </script>
</body>

</html>