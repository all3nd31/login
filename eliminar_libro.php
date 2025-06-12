<?php
include 'conectar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new OperacionesBd;
    $conexion = $obj->conexion();
    $sql = "DELETE FROM libros WHERE id_libros = $id";
    mysqli_query($conexion, $sql);
}

header("Location: libros_registrados.php");
?>
