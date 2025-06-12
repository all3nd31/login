<?php
session_start();

$usuario_correcto = "Aldo";
$contrasena_correcta = "187";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario === $usuario_correcto && $password === $contrasena_correcta) {
        $_SESSION['usuario'] = $usuario;
        header("Location: menu.php");
        exit();
    } else {
        $error = "⚠️ Usuario o contraseña incorrectos. Vuelve a intentarlo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aldo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg,rgb(30, 21, 25),rgb(82, 80, 80));
            color: white;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            font-weight: bold;
        }
        .btn-custom {
            background-color:rgb(193, 181, 186);
            border: none;
            font-size: 18px;
            padding: 10px;
        }
        .btn-custom:hover {
            background-color:rgb(150, 135, 141);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>🔐 Iniciar Sesión</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-custom w-100">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>