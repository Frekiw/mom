<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        .login-container {
            height: 100vh;
            background-color: #0F0F0F;
            
        }
        .login {
            padding-top: 160px;
        }
        .login-box {
            background-color: #191919;
            width: 500px;
            padding: 20px;
            border-radius: 10px;
        }
        .input-group-text {
            background-color: #0F0F0F;
            border: none;
            color: #fff;
        }
        .pass1 {
            background-color: #0F0F0F;
            border: none;
            color: #fff;
        }
        .form-control {
            background-color: #0F0F0F;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            box-shadow: none;
        }

        /--responsive--/
        @media (max-width: 1920px) {
            
        }

        @media (max-width: 1780px) {
            .login-box {
                width: 900px !important;
            }
            .form-control {
                width: 700px !important;
            }
            .pass1{
                width: 740px !important;
            }
        }

        @media (max-width:1366px) {
            
        }

        @media(max-width:1150px) {
            .login-box {
                width: 700px !important;
            }
            .form-control {
                width: 500px !important;
            }
            .pass1{
                width: 540px !important;
            }
        }

        @media(max-width:1080px) {
            
        }

        @media(max-width:991px) {
            .login-box {
                width: 600px !important;
            }
            .form-control {
                width: 400px !important;
            }
            .pass1{
                width: 440px !important;
            }
        }

        @media(max-width:780px) {
            .login-box {
                width: 400px !important;
            }
            .form-control {
                width: 250px !important;
            }
            .pass1{
                width: 290px !important;
            }
        }

        @media(max-width:768px) {
            
        }

        @media(max-width:640px) {
            
        }

        @media(max-width:414px) {
            .login-box {
                width: 300px !important;
            }
            .form-control {
                width: 200px !important;
            }
            .pass1{
                width: 230px !important;
            }
            .input-group-prepend{
                width:100%;
            }
            .pass1{
                width:100% !important;
            }

            .input-group-prepend .form-control{
                width:100% !important;
            }
        }

        @media(max-width:384px) {
            
        }

        @media(max-width:375px) {
            
        }

        @media(max-width:320px) {
            
        }
        
    </style>
</head>
<body>
    <section class="login-container">
        <div class="container d-flex justify-content-center align-items-center login">
            <div class="login-box justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="py-3">
                        <img src="{{ asset('home/img/logomaxid.png') }}" alt="Logo" style="width:150px;">
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center py-2">
                    <h2 class="text-white">Welcome Back</h2>
                </div>
                <div class="row d-flex justify-content-center align-items-center"> 
                    <form action="{{ route('portal') }}" method="POST">
                        @csrf
                        <div class="input-group pt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input style="width: 400px;" type="text" name="id_meeting" class="form-control" placeholder="ID Meeting" value="{{ old('id_meeting') }}" required>
                            </div>
                        </div>
                        <div class="input-group py-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-star"></i></span>
                                <input style="width: 400px;" type="text" name="id_mt" class="form-control" placeholder="Kode Meeting" value="{{ old('id_mt') }}" required>
                            </div>
                        </div>
                        <div class="input-group pb-4 w-100">
                            <div class="input-group-prepend">
                                <div class="d-flex pass1">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password" style="width: 365px;" type="password" name="password" class="form-control" placeholder="Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
    
        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    
</body>
</html>



