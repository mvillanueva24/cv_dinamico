<?php

require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] = "POST"){
    $tabla = $_POST['tabla'];

    $sql = "INSERT INTO " . $tabla;

    if ($tabla == 'idiomas'){
        $idioma = isset($_POST['idioma']) ? $_POST['idioma'] : null;
        $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : null;
        $sql = $sql . " (idioma, nivel) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $idioma, $nivel);

    } elseif ($tabla == 'formacion') {
        $institucion = isset($_POST['institucion']) ? $_POST['institucion'] : null;
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
        $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : null;
        $ini_year = isset($_POST['ini_year']) ? $_POST['ini_year'] : null;
        $fin_year = isset($_POST['fin_year']) ? $_POST['fin_year'] : null;
        $sql = $sql . " (institucion, titulo, ubicacion, year_ini, year_fin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssss", $institucion, $titulo, $ubicacion, $ini_year, $fin_year);

        

    } elseif ($tabla == 'experiencia'){
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
        $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : null;
        $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : null;
        $ini_year = isset($_POST['ini_year']) ? $_POST['ini_year'] : null;
        $fin_year = isset($_POST['fin_year']) ? $_POST['fin_year'] : null;
        $sql = $sql . " (cargo, empresa, ubicacion, year_ini, year_fin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssss", $cargo, $empresa, $ubicacion, $ini_year, $fin_year);

    } elseif ($tabla == 'aptitudes') {
        $aptitud = isset($_POST['aptitud']) ? $_POST['aptitud'] : null;
        $sql = $sql . " (aptitud) VALUES (?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $aptitud);

    } elseif ($tabla == 'usuarios') {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null;
        $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : null;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : null;
        $sql = $sql . " (nombre_apellidos, fecha_nacimiento, ocupacion, telefono, email, nacionalidad, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssssss", $nombre, $nacimiento, $ocupacion, $telefono, $email, $nacionalidad, $perfil);

        

    }

    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $db->close();
}

?>