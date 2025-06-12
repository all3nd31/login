<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registro de Libros</title>
    <style>
        /* Reset and base */
        body {
            background-color:rgb(44, 41, 41);
            font-family: 'Poppins', Helvetica, Arial, sans-serif;
            color: #6b7280;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(121, 119, 119, 0.94);
        }
        h2 {
            font-weight: 700;
            font-size: 2.5rem;
            color: #111827;
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 0.6rem 0.75rem;
            font-size: 1rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.75rem;
            color: #374151;
            transition: border-color 0.3s ease;
            outline-offset: 2px;
            background-color: white;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2210%22%20height%3D%227%22%20viewBox%3D%220%200%2010%207%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%200l5%207%205-7z%22%20fill%3D%22%236B7280%22/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 10px 7px;
        }
        input[type="text"]:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.3);
            outline: none;
        }
        input[type="submit"] {
            margin-top: 1.5rem;
            background-color:rgb(160, 164, 172);
            color: white;
            border: none;
            padding: 0.9rem 1.75rem;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: background-color 0.25s ease;
            user-select: none;
            width: 100%;
        }
        input[type="submit"]:hover,
        input[type="submit"]:focus {
            background-color: #1d4ed8;
            outline: none;
        }
        .message {
            margin-top: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-weight: 600;
        }
        .message.success {
            color: #166534;
            background-color: #d1fae5;
            border: 1px solid #22c55e;
        }
        .message.error {
            color: #b91c1c;
            background-color: #fee2e2;
            border: 1px solid #f87171;
        }
    </style>
    <script>
        function sanitizeISBN(input) {
            let value = input.value.replace(/\D/g,'');
            if (value.length > 13) {
                value = value.slice(0,13);
            }
            input.value = value;
        }
        function sanitizeIdLocal(input) {
            let val = input.value.toUpperCase();
            if(val.length > 4) {
                val = val.slice(0,4);
            }
            let part1 = val.slice(0,2).replace(/[^A-Z]/g,'');
            let part2 = val.slice(2,4).replace(/\D/g,'');
            input.value = part1 + part2;
        }
        function uppercaseInput(input) {
            input.value = input.value.toUpperCase();
        }
        window.addEventListener('DOMContentLoaded', () => {
            const isbnInput = document.getElementById('isbn');
            isbnInput.addEventListener('input', () => sanitizeISBN(isbnInput));

            const idLocalInput = document.getElementById('id_local');
            idLocalInput.addEventListener('input', () => sanitizeIdLocal(idLocalInput));

            const tituloInput = document.getElementById('titulo');
            tituloInput.addEventListener('input', () => uppercaseInput(tituloInput));

            const edicionInput = document.getElementById('edicion');
            edicionInput.addEventListener('input', () => uppercaseInput(edicionInput));

            const nomAutorInput = document.getElementById('nom_autor');
            nomAutorInput.addEventListener('input', () => uppercaseInput(nomAutorInput));

            const apAutorInput = document.getElementById('ap_autor');
            apAutorInput.addEventListener('input', () => uppercaseInput(apAutorInput));

            const amAutorInput = document.getElementById('am_autor');
            amAutorInput.addEventListener('input', () => uppercaseInput(amAutorInput));
        });
    </script>
</head>
<body>
    <main class="container" role="main" aria-labelledby="form-title">
        <h2 id="form-title">Registrar Libro</h2>
        <form method="POST" action="" novalidate>
            <label for="id_local">ID Local:</label>
            <input
                type="text"
                name="id_local"
                id="id_local"
                required
                pattern="[A-Za-z]{2}\d{2}"
                maxlength="4"
                title="ID Local debe contener dos letras seguidas de dos números, por ejemplo: AB12"
                autocomplete="off"
                inputmode="text" />

            <label for="isbn">ISBN:</label>
            <input
                type="text"
                name="isbn"
                id="isbn"
                required
                pattern="\d{13}"
                maxlength="13"
                title="El ISBN debe contener exactamente 13 dígitos numéricos."
                inputmode="numeric"
                autocomplete="off" />

            <label for="titulo">Título:</label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                required
                autocomplete="off" />

            <label for="genero">Género:</label>
            <select name="genero" id="genero" required aria-required="true" title="Seleccione 'M' o 'F'">
                <option value="" disabled selected>Seleccione Género</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>

            <label for="editorial">Editorial:</label>
            <select name="editorial" id="editorial" required aria-required="true" title="Seleccione una editorial">
                <option value="" disabled selected>Seleccione Editorial</option>
                <option value="PEARSON">PEARSON</option>
                <option value="PLANETA">PLANETA</option>
                <option value="SANTILLANA">SANTILLANA</option>
                <option value="ANAYA">ANAYA</option>
                <option value="SM">SM</option>
                <option value="GANDHI">GANDHI</option>
                <option value="OXFORD">OXFORD</option>
                <option value="CAMBRIDGE">CAMBRIDGE</option>
                <option value="MACMILLAN">MACMILLAN</option>
                <option value="ALFAGUARA">ALFAGUARA</option>
            </select>

            <label for="edicion">Edición:</label>
            <input
                type="text"
                name="edicion"
                id="edicion"
                required
                autocomplete="off" />

            <label for="ano_publ">Año de Publicación:</label>
            <select name="ano_publ" id="ano_publ" required autocomplete="off" aria-required="true" title="Seleccione año de publicación">
                <option value="" disabled selected>Seleccione Año</option>
                <!-- Options generated by PHP below -->
                <?php
                    for ($year = 1900; $year <= 2025; $year++) {
                        // Maintain selected on POST
                        $selected = (isset($_POST['ano_publ']) && $_POST['ano_publ'] == $year) ? "selected" : "";
                        echo "<option value=\"$year\" $selected>$year</option>";
                    }
                ?>
            </select>

            <label for="nom_autor">Nombre del Autor:</label>
            <input type="text" name="nom_autor" id="nom_autor" required autocomplete="off" />

            <label for="ap_autor">Apellido Paterno del Autor:</label>
            <input type="text" name="ap_autor" id="ap_autor" required autocomplete="off" />

            <label for="am_autor">Apellido Materno del Autor:</label>
            <input type="text" name="am_autor" id="am_autor" required autocomplete="off" />

            <input type="submit" value="Guardar" />
        </form>

        <?php
        $mensaje = '';
        $mensajeClase = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'conectar.php';

            $obj = new OperacionesBd;

            $id_local = isset($_POST['id_local']) ? strtoupper($_POST['id_local']) : '';
            $isbn = $_POST['isbn'] ?? '';
            $titulo = $_POST['titulo'] ?? '';
            $genero = $_POST['genero'] ?? '';
            $editorial = $_POST['editorial'] ?? '';
            $edicion = $_POST['edicion'] ?? '';
            $ano_publ = $_POST['ano_publ'] ?? '';
            $nom_autor = $_POST['nom_autor'] ?? '';
            $ap_autor = $_POST['ap_autor'] ?? '';
            $am_autor = $_POST['am_autor'] ?? '';

            $error = false;

            if (!preg_match('/^[A-Z]{2}\d{2}$/', $id_local)) {
                $mensaje = "Error: El ID Local debe contener exactamente 4 caracteres: dos letras seguidas de dos números.";
                $mensajeClase = "error";
                $error = true;
            }

            if (!$error && !preg_match('/^\d{13}$/', $isbn)) {
                $mensaje = "Error: El ISBN debe contener exactamente 13 dígitos numéricos.";
                $mensajeClase = "error";
                $error = true;
            }

            if (!$error && !in_array($genero, ['M','F'])) {
                $mensaje = "Error: Seleccione un valor válido para el género (M o F).";
                $mensajeClase = "error";
                $error = true;
            }

            $editoriales_validas = [
                "PEARSON","PLANETA","SANTILLANA","ANAYA","SM",
                "GANDHI","OXFORD","CAMBRIDGE","MACMILLAN","ALFAGUARA"
            ];
            if (!$error && !in_array(strtoupper($editorial), $editoriales_validas)) {
                $mensaje = "Error: Seleccione una editorial válida.";
                $mensajeClase = "error";
                $error = true;
            }

            // Validate year is between 1900 and 2025
            if (!$error && (!is_numeric($ano_publ) || $ano_publ < 1900 || $ano_publ > 2025)) {
                $mensaje = "Error: Seleccione un año de publicación válido entre 1900 y 2025.";
                $mensajeClase = "error";
                $error = true;
            }

            if (!$error) {
                $id_local = htmlspecialchars($id_local, ENT_QUOTES, 'UTF-8');
                $isbn = htmlspecialchars($isbn, ENT_QUOTES, 'UTF-8');
                $titulo = htmlspecialchars(strtoupper($titulo), ENT_QUOTES, 'UTF-8');
                $genero = htmlspecialchars($genero, ENT_QUOTES, 'UTF-8');
                $editorial = htmlspecialchars(strtoupper($editorial), ENT_QUOTES, 'UTF-8');
                $edicion = htmlspecialchars(strtoupper($edicion), ENT_QUOTES, 'UTF-8');
                $ano_publ = (int)$ano_publ;
                $nom_autor = htmlspecialchars(strtoupper($nom_autor), ENT_QUOTES, 'UTF-8');
                $ap_autor = htmlspecialchars(strtoupper($ap_autor), ENT_QUOTES, 'UTF-8');
                $am_autor = htmlspecialchars(strtoupper($am_autor), ENT_QUOTES, 'UTF-8');

                $sql = "INSERT INTO libros (isbn, id_local, titulo, genero, editorial, edicion, ano_publ, estatus, nom_autor, ap_autor, am_autor) 
                        VALUES ('$isbn', '$id_local', '$titulo', '$genero', '$editorial', '$edicion', $ano_publ, 0, '$nom_autor', '$ap_autor', '$am_autor');";

                $resultado = $obj->guardardatos($sql);

                if ($resultado) {
                    $mensaje = "Libro registrado correctamente.";
                    $mensajeClase = "success";
                    // Output script to ask user to add another or go to menu
                    echo "<script>
                            if (confirm('¿Desea agregar otro registro?')) {
                                window.location.href = window.location.pathname;
                            } else {
                                window.location.href = '/menu.html';
                            }
                          </script>";
                } else {
                    $mensaje = "Error al registrar el libro. Por favor, inténtelo de nuevo.";
                    $mensajeClase = "error";
                }
            }

            echo "<p class='message $mensajeClase' role='alert'>{$mensaje}</p>";
        }
        ?>
    </main>
</body>
</html>