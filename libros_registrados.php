<?php
include 'conectar.php';
$obj = new OperacionesBd;
$conexion = $obj->conexion();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM libros";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros Registrados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color:rgba(27, 28, 28, 0.76);
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 30px;
            background-color:rgba(107, 101, 101, 0.72);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #343a40;
            font-weight: bold;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: #343a40;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color:rgba(34, 33, 33, 0.85);
        }

        a img {
            transition: transform 0.2s ease-in-out;
            width: 25px;
        }

        a img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Libros Registrados</h2>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>ID Local</th>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Género</th>
                    <th>Editorial</th>
                    <th>Edición</th>
                    <th>Año</th>
                    <th>Estatus</th>
                    <th>Nombre Autor</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila['id_libros']; ?></td>
                        <td><?php echo $fila['id_local']; ?></td>
                        <td><?php echo $fila['isbn']; ?></td>
                        <td><?php echo $fila['titulo']; ?></td>
                        <td><?php echo $fila['genero']; ?></td>
                        <td><?php echo $fila['editorial']; ?></td>
                        <td><?php echo $fila['edicion']; ?></td>
                        <td><?php echo $fila['ano_publ']; ?></td>
                        <td><?php echo $fila['estatus']; ?></td>
                        <td><?php echo $fila['nom_autor']; ?></td>
                        <td><?php echo $fila['ap_autor']; ?></td>
                        <td><?php echo $fila['am_autor']; ?></td>
                        <td>
                            <a href="actualizar_libros.php?id=<?php echo $fila['id_libros']; ?>">
                                <img src="img/1.jpeg" alt="Actualizar" title="Actualizar">
                            </a>
                            <a href="javascript:confirmarEliminacion(<?php echo $fila['id_libros']; ?>)">
                                <img src="img/borrar.jpeg" alt="Eliminar" title="Eliminar">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de eliminar este libro?")) {
                window.location.href = "eliminar_libro.php?id=" + id;
            }
        }
    </script>
</body>
</html>
