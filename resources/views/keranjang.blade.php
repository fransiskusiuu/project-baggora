<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/Logo.png" type = "image/x-icon">
    <Title>Baggora: Tempat Thrifting Sekitaran Kampus</Title>

    <!-- Material -->
    <link rel="stylesheet" href="css/keranjang-style.css" type="text/css">
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
                <a href="/keranjang" class="me-3">
                    <img src="images/icons/bag.png" alt="">
                    @auth
                    <span class="font-monospace">{{ count((array) session('keranjang')) }}</span> <!-- Ini nanti bisa diubah nilai angkanya sesuai dengan barang yang masuk ke keranjang  -->
                    @else
                    <span class="font-monospace">0</span>
                    @endauth
                </a>
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

                    <li class="breadcrumb-item active">Keranjang</li>
                </ol>
            </nav>
        </div>

        <!-- Keranjang -->
        <div class="cart-page font-monospace">
            <div class="container">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-h">Barang</th>
                                <th>Harga</th>
                                <th class="quan">Kuantitas</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('keranjang'))
                                @foreach(session('keranjang') as $id => $details)
                                @php $subtotal = $details['harga'] * $details['kuantitas']; @endphp
                                @php $total += $subtotal; @endphp
                            <tr rowId="{{ $id }}">
                                <td class="product-col">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['nama_barang'] }}">
                                    <div class="p-title">
                                        <h5>{{ $details['nama_barang'] }}</h5>
                                    </div>
                                </td>

                                <td class="price-col">Rp {{ $details['harga'] }}</td>
                                
                                
                                <td class="quantity-col">
                                    <div class="pro-qty-keranjang">
                                        <input type="text" name="kuantitas" value="{{ $details['kuantitas'] }}">
                                    </div>
                                </td>

                                <td class="total sub-total">Rp {{$subtotal}}</td>
                                <td class="product-close delete-barang">x</td>
                            </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="cart-btn bg-body-secondary">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="coupon-input">
                                <input type="text" placeholder="Enter cupone code">
                            </div>
                        </div>

                        <div class="col-lg-5 offset-lg-1 text-left text-lg-right text-end">
                            <a href="{{ route('delete.keranjang') }}"><div class="site-btn clear-btn">Clear Cart</div></a>
                            <div class="site-btn update-btn">Update Cart</div>
                        </div>
                    </div>
                </div>

                <div class="shopping-method">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shipping-info">
                                    <h5>Pilih Pengiriman</h5>
                                    <div class="chose-shipping">
                                        <div class="cs-item">
                                            <input type="radio" name="cs" id="one">
                                            <label for="one" class="active">
                                                Pengiriman Standart
                                                <span>Sekitar Jabodetabek</span>
                                            </label>
                                        </div>

                                        <div class="cs-item">
                                            <input type="radio" name="cs" id="two">
                                            <label for="two">
                                                Next Day delievery - Rp 20.000
                                            </label>
                                        </div>
                                        
                                        <div class="cs-item last">
                                            <input type="radio" name="cs" id="three">
                                            <label for="three">
                                                In Store Pickup - Free
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-info">
                                    <div class="total-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Total</th>
                                                    <th>Pengiriman</th>
                                                    <th class="total-cart">Total Harga Checkout</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="total">Rp {{ $total }}</td>
                                                    <td class="shipping">Rp 10000</td>
                                                    <td class="total-cart-p">Rp {{ $total+10000 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <a href="#" class="primary-btn checkout-btn link-underline link-underline-opacity-0">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

   <!-- Modals Delete Barang -->
    <div class="modal fade bg-dark bg-opacity-25 p-4 py-md-5 font-monospace" tabindex="-1" role="dialog" id="modalDelete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0 fw-bold mb-3">Yakin akan menghapus?</h5>
                    <p class="mb-0">Jika memilih Ya, Anda akan menghapus barang dari keranjang.</p>
                </div>

                <form>
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

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(".delete-barang").click(function (e) {
            e.preventDefault();

            $('#modalDelete').data('rowId', $(this).parents("tr").attr("rowId"));
            $('#modalDelete').modal('show');
        });

        $('#modalDelete .text-danger').on('click', function() {
            var rowId = $('#modalDelete').data('rowId');

            $.ajax({
                url: '{{ route('deleteBarang.keranjang') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: rowId
                },
                success: function (response) {
                    window.location.reload();
                }
            });

            $('#modalDelete').modal('hide');
        });

    </script>
    <script>
        let shippingOptions = document.querySelectorAll('input[type=radio][name="cs"]');

        shippingOptions.forEach(function(radio) {
            radio.addEventListener('change', function() {
                let shippingCost;
                if (this.id === 'one') {
                    shippingCost = 10000; 
                } else if (this.id === 'two') {
                    shippingCost = 20000; 
                } else if (this.id === 'three') {
                    shippingCost = 0; 
                }

                document.querySelector('.shipping').textContent = 'Rp ' + shippingCost;

                let total = Number(document.querySelector('.total').textContent.replace('Rp ', ''));
                document.querySelector('.total-cart-p').textContent = 'Rp ' + ({{$total}} + shippingCost);
            });
        });
    </script>
</body>

</html>