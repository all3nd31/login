<?php
include 'conectar.php';
$obj = new OperacionesBd();
$conexion = $obj->conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM libros WHERE id_libros = $id";
    $resultado = mysqli_query($conexion, $sql);
    $libro = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_libros'];
    $isbn = $_POST['isbn'];
    $id_local = $_POST['id_local'];
    $titulo = strtoupper($_POST['titulo']);
    $genero = $_POST['genero'];
    $editorial = $_POST['editorial'];
    $edicion = strtoupper($_POST['edicion']);
    $ano_publ = $_POST['ano_publ'];
    $estatus = $_POST['estatus'];
    // Convert author name fields to uppercase before saving
    $nom_autor = strtoupper($_POST['nom_autor']);
    $ap_autor = strtoupper($_POST['ap_autor']);
    $am_autor = strtoupper($_POST['am_autor']);

    $sql = "UPDATE libros SET 
        isbn = '$isbn',
        id_local = '$id_local',
        titulo = '$titulo',
        genero = '$genero',
        editorial = '$editorial',
        edicion = '$edicion',
        ano_publ = '$ano_publ',
        estatus = '$estatus',
        nom_autor = '$nom_autor',
        ap_autor = '$ap_autor',
        am_autor = '$am_autor'
        WHERE id_libros = $id";

    mysqli_query($conexion, $sql);
    header("Location: libros_registrados.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Actualizar Libro</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

    :root {
      --color-bg: rgba(30, 21, 25, 0.52);
      --color-text: rgb(82, 80, 80);
      --color-heading: #111827;
      --color-input-bg: #f9fafb;
      --color-border: rgb(193, 181, 186);
      --color-button-bg: #111827;
      --color-button-text: #ffffff;
      --radius: 0.75rem;
      --shadow-light: 0 1px 3px rgba(0,0,0,0.1);
      --spacing-section: 4rem;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: var(--color-bg);
      color: var(--color-text);
      line-height: 1.6;
      padding: 2rem 1rem;
      display: flex;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      max-width: 600px;
      width: 100%;
      background: var(--color-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow-light);
      padding: 2.5rem 3rem;
      box-sizing: border-box;
    }

    h2 {
      font-weight: 600;
      color: var(--color-heading);
      font-size: 2.5rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    form label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.4rem;
      color: var(--color-heading);
    }

    form input[type="text"],
    form input[type="number"],
    form select {
      width: 100%;
      padding: 0.7rem 1rem;
      border: 1px solid var(--color-border);
      border-radius: var(--radius);
      background: var(--color-input-bg);
      color: var(--color-heading);
      font-size: 1rem;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
      outline-offset: 2px;
      text-transform: uppercase;
    }

    form input[type="text"]:focus,
    form input[type="number"]:focus,
    form select:focus {
      border-color: var(--color-button-bg);
      outline: none;
      box-shadow: 0 0 8px rgb(17, 24, 39);
    }

    form input[type="submit"] {
      margin-top: 2rem;
      background: var(--color-button-bg);
      color: var(--color-button-text);
      border: none;
      padding: 0.95rem 1.8rem;
      font-size: 1.125rem;
      font-weight: 600;
      border-radius: var(--radius);
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
      user-select: none;
    }

    form input[type="submit"]:hover,
    form input[type="submit"]:focus {
      background-color: #374151;
      outline: none;
    }

    .message {
      text-align: center;
      font-weight: 600;
      font-size: 1.1rem;
      color: #dc2626;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Convert fields to uppercase as user types
      ['titulo', 'edicion', 'nom_autor', 'ap_autor', 'am_autor'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
          input.addEventListener('input', () => {
            input.value = input.value.toUpperCase();
          });
        }
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <h2>Actualizar Libro</h2>

    <?php if (isset($libro)) { ?>
    <form method="POST" action="actualizar_libros.php" novalidate>
      <input type="hidden" name="id_libros" value="<?php echo htmlspecialchars($libro['id_libros']); ?>">

      <label for="id_local">ID Local:</label>
      <input
        type="text"
        id="id_local"
        name="id_local"
        value="<?php echo htmlspecialchars($libro['id_local']); ?>"
        required
        pattern="[A-Za-z]{2}\d{2}"
        maxlength="4"
        title="El ID Local debe tener dos letras seguidas de dos números, por ejemplo: AB12."
        autocomplete="off"
      />

      <label for="isbn">ISBN:</label>
      <input
        type="text"
        id="isbn"
        name="isbn"
        value="<?php echo htmlspecialchars($libro['isbn']); ?>"
        required
        pattern="\d{13}"
        maxlength="13"
        title="El ISBN debe ser un número de 13 dígitos."
        inputmode="numeric"
        autocomplete="off"
      />

      <label for="titulo">Título:</label>
      <input
        type="text"
        id="titulo"
        name="titulo"
        value="<?php echo htmlspecialchars($libro['titulo']); ?>"
        required
      />

      <label for="genero">Género:</label>
      <select name="genero" id="genero" required>
        <option value="" disabled <?php echo empty($libro['genero']) ? 'selected' : ''; ?>>Seleccione</option>
        <option value="M" <?php echo ($libro['genero'] === 'M') ? 'selected' : ''; ?>>M</option>
        <option value="F" <?php echo ($libro['genero'] === 'F') ? 'selected' : ''; ?>>F</option>
      </select>

      <label for="editorial">Editorial:</label>
      <select id="editorial" name="editorial" required>
        <option value="" disabled <?php echo empty($libro['editorial']) ? 'selected' : ''; ?>>Seleccione</option>
        <?php
          $editoriales = [
            "PEARSON",
            "OXFORD",
            "CAMBRIDGE",
            "MCGRAW-HILL",
            "ELSEVIER",
            "SPRINGER",
            "WILEY",
            "TAYLOR & FRANCIS",
            "BLOOMSBURY",
            "HARPER COLLINS"
          ];
          foreach ($editoriales as $editorial) {
            $selected = ($libro['editorial'] === $editorial) ? "selected" : "";
            echo "<option value=\"$editorial\" $selected>$editorial</option>";
          }
        ?>
      </select>

      <label for="edicion">Edición:</label>
      <input
        type="text"
        id="edicion"
        name="edicion"
        value="<?php echo htmlspecialchars($libro['edicion']); ?>"
        required
      />

      <label for="ano_publ">Año de Publicación:</label>
      <select id="ano_publ" name="ano_publ" required>
        <option value="" disabled <?php echo empty($libro['ano_publ']) ? 'selected' : ''; ?>>Seleccione</option>
        <?php
          for ($year = 1900; $year <= 2025; $year++) {
            $selected = ($libro['ano_publ'] == $year) ? 'selected' : '';
            echo "<option value=\"$year\" $selected>$year</option>";
          }
        ?>
      </select>

      <label for="estatus">Estatus:</label>
      <input
        type="number"
        id="estatus"
        name="estatus"
        min="0"
        max="1"
        value="<?php echo htmlspecialchars($libro['estatus']); ?>"
        required
      />

      <label for="nom_autor">Nombre del Autor:</label>
      <input
        type="text"
        id="nom_autor"
        name="nom_autor"
        value="<?php echo htmlspecialchars($libro['nom_autor']); ?>"
        required
      />

      <label for="ap_autor">Apellido Paterno:</label>
      <input
        type="text"
        id="ap_autor"
        name="ap_autor"
        value="<?php echo htmlspecialchars($libro['ap_autor']); ?>"
        required
      />

      <label for="am_autor">Apellido Materno:</label>
      <input
        type="text"
        id="am_autor"
        name="am_autor"
        value="<?php echo htmlspecialchars($libro['am_autor']); ?>"
        required
      />

      <input type="submit" value="Actualizar" />
    </form>
    <?php } else { ?>
      <p class="message">Libro no encontrado.</p>
    <?php } ?>
  </div>
</body>
</html>