<?php
// Proyecto escolar: procesa un formulario sin enviar mensajes ni guardar información.
// Abrir esta página con XAMPP o un servidor que ejecute PHP.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contactos.html');
    exit;
}
function limpiar($valor) {
    return trim((string) $valor);
}
$nombre = limpiar($_POST['nombre'] ?? '');
$correo = limpiar($_POST['correo'] ?? '');
$mensaje = limpiar($_POST['mensaje'] ?? '');
$errores = [];
if ($nombre === '' || strlen($nombre) > 80) $errores[] = 'Escribe un nombre de hasta 80 caracteres.';
if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 120) $errores[] = 'Escribe un correo válido.';
if ($mensaje === '' || strlen($mensaje) > 1500) $errores[] = 'Escribe un mensaje de hasta 1500 caracteres.';
$seguro = htmlspecialchars($nombre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
http_response_code($errores ? 422 : 200);
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Resultado del formulario | Octubre morado</title><link rel="stylesheet" href="css/estilos.css"></head>
<body><div class="mini-top">Proyecto escolar · Prueba de PHP</div><header class="site-header"><div class="container nav-wrap"><a class="brand" href="index.html"><span class="brand-mark">✦</span><span><strong>Octubre morado</strong><small>Una tradición que nos une</small></span></a><nav class="nav" aria-label="Menú principal"><a href="index.html">Inicio</a><a href="nosotros.html">Nosotros</a><a href="contactos.html">Contactos</a></nav></div></header>
<main class="container"><div class="result-panel">
<?php if (empty($errores)): ?>
  <span class="eyebrow">Prueba terminada</span>
  <h1>¡Mensaje recibido!</h1>
  <p>Gracias, <strong><?php echo $seguro; ?></strong>. PHP recibió los campos del formulario y comprobó que tienen un formato válido.</p>
  <p class="notice">Esto es solo una demostración: el mensaje no se guardó ni se envió por correo.</p>
<?php else: ?>
  <span class="eyebrow">Hay datos por corregir</span>
  <h1>Revisa el formulario</h1><ul>
  <?php foreach ($errores as $error): ?><li><?php echo htmlspecialchars($error, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></li><?php endforeach; ?>
  </ul>
<?php endif; ?>
  <p><a class="primary-button" href="contactos.html">Volver a Contactos</a></p>
</div></main><footer class="site-footer"><div class="container"><p>Trabajo educativo · Unidad 07 · 2026</p></div></footer></body></html>
