<?php

require_once 'connect.php';

$sql = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1"; // Fila más reciente
$result = $db->query($sql);

$idiomas = [];
$formaciones = [];
$experiencias = [];
$aptitudes = [];


if ($result->num_rows > 0) {
    $data_row = $result->fetch_assoc(); // array a la fila seleccionada
} else {
  $data_row = [
    'nombre_apellidos' => '',
    'fecha_nacimiento' => '',
    'ocupacion' => '',
    'telefono' => '',
    'email' => '',
    'nacionalidad' => '',
    'perfil' => '',
  ];
}

$sql = "SELECT * FROM idiomas ORDER BY id DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $idiomas[] = $row;
  }
}

$sql = "SELECT * FROM formacion ORDER BY id DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $formaciones[] = $row;
  }
}

$sql = "SELECT * FROM experiencia ORDER BY id DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $experiencias[] = $row;
  }
}

$sql = "SELECT * FROM aptitudes ORDER BY id DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $aptitudes[] = $row;
  }
} 

$db->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>CSS Template</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="formulario">
    <h1>Formulario para CV</h1>
    <form action="agregar.php" method="post" class="">
      <input type="hidden" name="tabla" value="usuarios">
      <div class="flex-field">
        <div>
          <label for="nombre" class="field">Nombre y Apellidos</label>
          <input type="text" name="nombre" class="text-input" value="<?php echo $data_row['nombre_apellidos']; ?>">
        </div>
        <div>
          <label for="nacimiento"  class="field">Fecha de Nacimiento</label>
          <input type="date" name="nacimiento" class="text-input" value="<?php echo $data_row['fecha_nacimiento']; ?>">
        </div>
      </div>

      <div class="flex-field">
        <div>
          <label for="ocupacion"  class="field">Ocupación</label>
          <input type="text" name="ocupacion" class="text-input" value="<?php echo $data_row['ocupacion']; ?>">
        </div>
        <div>
          <label for="telefono"  class="field">Teléfono</label>
          <input type="text" name="telefono" class="text-input" value="<?php echo $data_row['telefono']; ?>">
        </div>
      </div>
      
      <div class="flex-field">
        <div>
          <label for="email"  class="field">Correo electrónico</label>
          <input type="email" name="email" class="text-input" value="<?php echo $data_row['email']; ?>">
        </div>
        <div>
          <label for="nacionalidad"  class="field">Nacionalidad</label>
          <select name="nacionalidad" id="" class="text-input">
            <option value="Perú" <?php echo ($data_row['nacionalidad'] == 'Perú') ? 'selected' : ''; ?>>Perú</option>
            <option value="Chile" <?php echo ($data_row['nacionalidad'] == 'Chile') ? 'selected' : ''; ?>>Chile</option>
            <option value="Bolivia" <?php echo ($data_row['nacionalidad'] == 'Bolivia') ? 'selected' : ''; ?>>Bolivia</option>
            <option value="Brasil" <?php echo ($data_row['nacionalidad'] == 'Brasil') ? 'selected' : ''; ?>>Brasil</option>
            <option value="Ecuador" <?php echo ($data_row['nacionalidad']== 'Ecuador') ? 'selected' : ''; ?>>Ecuador</option>
            <option value="Colombia" <?php echo ($data_row['nacionalidad'] == 'Colombia') ? 'selected' : ''; ?>>Colombia</option>
            <option value="Argentina" <?php echo ($data_row['nacionalidad'] == 'Argentina') ? 'selected' : ''; ?>>Argentina</option>
          </select>
        </div>
      </div>

      <label  class="field">Perfil</label>
      <textarea rows="10" cols="50" name="perfil"></textarea>


      <button type="submit">Enviar</button>
    </form>

    <form action="agregar.php" method="post" class="">
      <input type="hidden" name="tabla" value="idiomas">
      <span for="idiomas" class="subtitle">Idiomas</span>
      <label for="idioma" class="sfield">Idioma</label>
      <input type="text" name="idioma" class="text-input">
      <label for="nivel"  class="sfield">Nacionalidad</label>
          <select name="nivel" id="" class="text-input">
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
          </select>
      <button type="submit">Agregar</button>
    </form>

    <form action="agregar.php" method="post" class="">
      <input type="hidden" name="tabla" value="formacion">
      <span for="idiomas" class="subtitle">Formación</span>
      <label for="institucion" class="sfield">Institucion</label>
      <input type="text" name="institucion" class="text-input">

      <label for="titulo" class="sfield">Titulo</label>
      <input type="text" name="titulo" class="text-input">

      <label for="ubicacion" class="sfield">Ubicación</label>
      <input type="text" name="ubicacion" class="text-input">

      <div class="flex-field">
        <div>
          <label for="ini_year" class="sfield">Año de Inicio</label>
          <input type="text" name="ini_year" class="text-input">
        </div>
        <div>
          <label for="fin_year" class="sfield">Año de Fin</label>
          <input type="text" name="fin_year" class="text-input">
        </div>
      </div>
      <button type="submit">Agregar</button>
    </form>

    <form action="agregar.php" method="post" class="">
      <input type="hidden" name="tabla" value="experiencia">
      <span for="idiomas" class="subtitle">Experiencia</span>
      <label for="cargo" class="sfield">Cargo</label>
      <input type="text" name="cargo" class="text-input">

      <label for="empresa" class="sfield">Empresa</label>
      <input type="text" name="empresa" class="text-input">

      <label for="ubicacion" class="sfield">Ubicación</label>
      <input type="text" name="ubicacion" class="text-input">

      <div class="flex-field">
        <div>
          <label for="ini_year" class="sfield">Año de Inicio</label>
          <input type="text" name="ini_year" class="text-input">
        </div>
        <div>
          <label for="fin_year" class="sfield">Año de Fin</label>
          <input type="text" name="fin_year" class="text-input">
        </div>
      </div>
      <button type="submit">Agregar</button>
    </form>

    <form action="agregar.php" method="post" class="">
      <input type="hidden" name="tabla" value="aptitudes">
      <span for="idiomas" class="subtitle">Aptitudes y Habilidades</span>

      <label for="aptitud" class="sfield">Aptitud o Habilidad</label>
      <input type="text" name="aptitud" class="text-input">
      <button type="submit">Agregar</button>
    </form>
  </div>

  <div class="cv">
  <header>
    <div class="image">
      <img src="assets/user.jpg" alt="user-img">
    </div>
    <div class="nombre">
      <h2><?php  echo $data_row['nombre_apellidos']; ?></h2>
      <span><?php  echo $data_row['ocupacion']; ?></span>
    </div>
  </header>

  <section>
    <nav>
      <div>
        <h3>CONTACTO</h3>
        <hr />
        <p class="contacto">
          <img src="assets/ring-phone.png" alt="asd" style="width: 25px;">
          <?php  echo $data_row['telefono']; ?>
        </p>
        <p class="contacto">
          <img src="assets/correo-electronico.png" alt="asd" style="width: 22px;">
          <?php  echo $data_row['email']; ?>
        </p>
        <p class="contacto">
          <img src="assets/mapa.png" alt="asd" style="width: 22px;">
          <?php  echo $data_row['nacionalidad'] ?>
        </p>
      </div>
      <div>
        <h3>IDIOMAS</h3>
        <hr />
        <ul class="idiomas-list">
          <?php if (empty($idiomas)): ?>
              <li>N/A</li>
          <?php else: ?>
              <?php foreach ($idiomas as $idi): ?>
                  <li><?php echo $idi['idioma']; ?> - <?php echo $idi['nivel']; ?></li>
              <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div>
        <h3>APTITUDES Y </h3> <br> <h3 style="margin-top: -20px">HABILIDADES</h3>
        <hr />
        <ul>
          <?php if (empty($aptitudes)): ?>
              <li>N/A</li>
          <?php else: ?>
              <?php foreach ($aptitudes as $apt): ?>
                  <li><?php echo $apt['aptitud']; ?></li>
              <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <article >
      <h3>PERFIL</h3>
      <hr />
      <p>
        <?php echo $data_row['perfil'] ?>
      </p>
      <h3>EXPERIENCIA LABORAL</h3>
      <hr />
      <div>
        <?php if (empty($experiencias)): ?>
              <li>N/A</li>
          <?php else: ?>
              <?php foreach ($experiencias as $exp): ?>
                <h4><?php echo $exp['cargo']; ?></h4>
                <span class="article-lugar"><?php echo $exp['ubicacion']; ?></span>
                <span class="article-rango-fechas">| <?php echo $exp['year_ini']; ?> - <?php echo $exp['year_fin']; ?></span>
              <?php endforeach; ?>
          <?php endif; ?>
      </div>
      <h3 style="margin-top: 20px;">FORMACIÓN</h3>
      <hr />
      <div>
        <?php if (empty($formaciones)): ?>
              <li>N/A</li>
          <?php else: ?>
              <?php foreach ($formaciones as $for): ?>
                <h4><?php echo $for['titulo']; ?></h4>
                <span class="article-lugar"><?php echo $for['ubicacion']; ?></span>
                <span class="article-rango-fechas">| <?php echo $for['year_ini']; ?> - <?php echo $for['year_fin']; ?></span>
              <?php endforeach; ?>
          <?php endif; ?>
      </div>
    </article>
  </section>
</div>
</body>

</html>