<?php // Apertura del codigo

// Se define una clase llamada OperacionesBd para manejar la conexión y operaciones con la bd
class OperacionesBd {

    // Propiedad privada que almacena el nombre del servidor
    private $servidor = "localhost";

    // Propiedad privada
    private $usuario = "root";

    // almacena el nombre de la base de datos a conectar
    private $bd = "biblioteca";

    // almacena la contraseña del usuario (vacía por defecto en XAMPP)
    private $password = "";

    // Método público que establece y retorna una conexión a la base de datos
    public function conexion() {
        // Se crea la conexión usando mysqli_connect y las propiedades definidas arriba
        $conexion = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->bd
        );

        // Se retorna el objeto de conexión para poder usarlo en otras partes del código
        return $conexion;
    }

    // Método público que ejecuta una consulta SQL para guardar datos en la base de datos
    public function guardardatos($sql) {
        // Se crea una nueva instancia de la clase OperacionesBd
        $obj = new OperacionesBd;

        // Se llama al método conexion() para obtener la conexión
        $conexion = $obj->conexion();

        // Se ejecuta la consulta SQL pasada como argumento
        mysqli_query($conexion, $sql);
    }
}
