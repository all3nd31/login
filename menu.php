<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(30, 21, 25),rgb(82, 80, 80));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .menu-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px;
        }
        h2 {
            color: #333;
            font-weight: bold;
        }
        .menu-item {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: rgba(0, 0, 0, 0.3);
            transition: 0.3s;
        }
        .menu-item:hover {
            background-color: rgb(193, 181, 186);
        }
        .logout {
            background-color: #dc3545;
        }
        .logout:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>

    <div class="menu-container">
        <h2>📚 Menú Principal</h2>
        <a class="menu-item" href="registro_libros.php">Registro de Libros</a>
        <a class="menu-item" href="libros_registrados.php">Libros Registrados</a>
        <a class="menu-item" href="integrantes.php">Integrantes del Equipo</a>
        <a class="menu-item logout" href="login.php">Cerrar Sesión</a>
    </div>

</body>
</html>