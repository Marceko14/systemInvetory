<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login | Pasteleria Diego's">
    <meta name="robots" content="noindex, nofollow">
    <title>Login | Pasteleria Diego's</title>
    <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, rgba(255, 183, 178, 0.8), rgba(255, 231, 213, 0.8)), 
                        url('https://source.unsplash.com/1920x1080/?bakery');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            border-radius: 15px 15px 0 0;
        }

        .btn-success {
            background-color: #ff6f61;
            border-color: #ff6f61;
            transition: transform 0.2s ease-in-out;
        }

        .btn-success:hover {
            background-color: #ff4a3c;
            transform: scale(1.05);
        }

        .btn-link {
            font-size: 0.9rem;
        }

        .input-group-text {
            border: none;
        }

        input:focus {
            box-shadow: 0 0 5px rgba(255, 111, 97, 0.8);
            border-color: #ff6f61;
        }

        #toggle-password {
            background: none;
            border: none;
        }

        #to-recover {
            color: #ff6f61 !important;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form id="frmAcceso" method="post">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="logina" class="form-label">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="logina" name="logina" placeholder="Ingrese su usuario" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-warning text-white"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                                <button type="button" class="btn" id="toggle-password">
                                    <i id="eye-icon" class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button class="btn btn-link" id="to-recover" type="button"><i class="fas fa-lock"></i> ¿Olvidaste tu contraseña?</button>
                            <button class="btn btn-success px-4" type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar/ocultar contraseña
        document.getElementById('toggle-password').addEventListener('click', function () {
            var passwordField = document.getElementById('password');
            var passwordFieldType = passwordField.type;
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordFieldType === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tu archivo JavaScript -->
    <script src="scripts/login.js"></script>
</body>

</html>



















