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
        .form-control {
            background-color: #0F0F0F;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            box-shadow: none;
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
                    <form>
                        <div class="input-group py-2 ">
                            <div class="input-group-prepend" >
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input style="width: 400px;" type="text" id="email" class="form-control" placeholder="ID Meeting" required="">
                            </div>
                            
                        </div>
                        <div class="input-group pb-4 w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input style="width: 400px;" type="password" id="password" class="form-control" placeholder="Password" required="">
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
