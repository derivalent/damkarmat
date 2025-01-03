<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pemadam Kebakaran Banyuwangi</title>
    {{-- <link rel="icon" type="image/png" href="images/logo_damkar.png"> --}}
    {{-- <link rel="shortcut icon" type="x-icon" href="images/icon_logo_damkar.png"> --}}
    <link rel="icon" type="x-icon" href="images/icon_logo_damkar.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form_login.css') }}" />
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(images/damkarbwi.jpg);
            background-position: center;
            background-size: cover;
            opacity: .9;
        }

        .box-login {
            border: 1px solid #ccc;
            width: 350px;
            margin: 50px auto;
            padding: 10px 20px;
            border-radius: 3px;
            box-shadow: 0px 0px 10px #ccc;
            background-color: #ffffff;
            border-radius: 10px;
        }

        .box-form input {
            width: 100%;
            padding: 10px;
            font-size: 11pt;
            box-sizing: border-box;
            margin: 10px 0px;
            border-radius: 50px;
        }

        .box-form label {
            font-weight: bold;
        }

        .tombol-login {
            background: #3131ff;
            width: 100%;
            padding: 10px;
            margin: 10px 0px;
            border: 1px solid #3131ff;
            border-radius: 3px;
            color: white;
        }

        .password-toggle {
            cursor: pointer;
        }

        .judul {
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        h3 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="box-login">
        {{-- <div class="judul mt-4 mb-3 d-flex align-items-center">
            <div>
                <img src="images/logo_damkar.png" alt="Dinas Pemadam Kebakaran" class="img-fluid logo-damkar">
            </div>
            <h3 class="ms-3"><b>DAMKARMAT BANYUWANGI</b></h3>
        </div> --}}
        <div class="judul mt-4 mb-3 d-flex align-items-center">
            <div>
                <img src="images/logo_damkar_persegi.png" alt="Dinas Pemadam Kebakaran" class="img-fluid logo-damkar">
            </div>
            <h3><b>DAMKARMAT BANYUWANGI</b></h3>
        </div>
        <hr>
        <form id="loginForm" action="{{ route('Autentikasi') }}" method="POST" novalidate>
            @csrf
            <div class="box-form">
                <label>Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email .." required>
                <div class="error" id="emailError"></div>
            </div>
            <div class="box-form">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="passwordKu" placeholder="Masukkan password .." required>
                    {{-- <div class="input-group-append">
                        <span class="input-group-text password-toggle" onclick="showHide()">
                            <i class="fa fa-eye" id="togglePassword"></i>
                        </span>
                    </div> --}}

                </div>
                <div class="error" id="passwordError"></div>
            </div>

            <input type="checkbox" onclick="showHide()"> Tampilkan Password

            <input type="submit" value="LOGIN" class="tombol-login">

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($massage = Session::get('failed'))
        <script>
            Swal.fire('{{ $massage }}');
        </script>
    @endif

    <script>
        function showHide() {
            var inputan = document.getElementById("passwordKu");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let isValid = true;

            const email = document.getElementById('email');
            const password = document.getElementById('passwordKu');

            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            emailError.textContent = '';
            passwordError.textContent = '';

            if (!email.checkValidity()) {
                emailError.textContent = 'Email tidak valid atau kosong.';
                isValid = false;
            }

            if (!password.checkValidity()) {
                passwordError.textContent = 'Password tidak boleh kosong.';
                isValid = false;
            }

            if (isValid) {
                this.submit();
            }
        });
    </script>
</body>

</html>
