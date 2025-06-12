<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Integrantes del Equipo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg,rgb(30, 21, 25),rgb(82, 80, 80));
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            padding: 40px;
        }
        .integrantes {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 200px;
        }
        .card img {
            width: 100%;
            height: 200px;
            border-radius: 10px;
            object-fit: cover;
        }
        .btn-custom {
            background-color: rgb(193, 181, 186);
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 30px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>👥 Integrantes del Equipo</h2>
        <div class="integrantes">
            <div class="card">
                <img src="img/paul.jpg" alt="Paul Ortiz Castro">
                <p><strong>Paul Ortiz Castro</strong></p>
            </div>
            <div class="card">
                <img src="img/aldo.jpg" alt="Aldo Ortiz Allende">
                <p><strong>Aldo Ortiz Allende</strong></p>
            </div>
            <div class="card">
                <img src="img/jesus.jpg" alt="Jesús Emilio Hernández Figueroa">
                <p><strong>Jesús Emilio Hernández Figueroa</strong></p>
            </div>
            <div class="card">
                <img src="img/alexander.jpg" alt="Alexander Martínez Pérez">
                <p><strong>Alexander Martínez Pérez</strong></p>
            </div>
        </div>

        <a href="menu.php" class="btn-custom">🔙 Regresar al Menú</a>
    </div>

</body>
</html>