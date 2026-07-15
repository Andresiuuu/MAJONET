<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['mensaje'] = 'Error de seguridad. Intente nuevamente.';
    $_SESSION['tipo'] = 'error';
    header('Location: index.php#contacto');
    exit;
}

$nombre   = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono']);
// Eliminar cualquier carácter que no sea un número
$telefono = preg_replace('/\D/', '', $telefono);
// Si es un número ecuatoriano que empieza con 0
if (substr($telefono, 0, 1) === '0') {
    $telefono = '593' . substr($telefono, 1);
}
$ciudad   = trim($_POST['ciudad'] ?? '');
$terminos = isset($_POST['terminos']);
$privacidad = isset($_POST['privacidad']);

$errores = [];

if ($nombre === '' || strlen($nombre) > 100) {
    $errores[] = 'El nombre es obligatorio (máx. 100 caracteres).';
}

if ($telefono === '' || strlen($telefono) > 15 || !preg_match('/^[0-9+\-\s()]+$/', $telefono)) {
    $errores[] = 'El teléfono es obligatorio (máx. 15 dígitos).';
}

if ($ciudad === '' || strlen($ciudad) > 50) {
    $errores[] = 'La ciudad es obligatoria (máx. 50 caracteres).';
}

if (!$terminos) {
    $errores[] = 'Debe aceptar los términos y condiciones.';
}

if (!$privacidad) {
    $errores[] = 'Debe aceptar la política de privacidad.';
}

if (!empty($errores)) {
    $_SESSION['mensaje'] = implode(' ', $errores);
    $_SESSION['tipo'] = 'error';
    header('Location: index.php#contacto');
    exit;
}

require_once __DIR__ . '/conexion.php';

try {
    $stmt = $pdo->prepare(
        "INSERT INTO cliente (nombre, telefono, ciudad) VALUES (:nombre, :telefono, :ciudad)"
    );
    $stmt->execute([
        ':nombre'   => $nombre,
        ':telefono' => $telefono,
        ':ciudad'   => $ciudad,
    ]);

    $_SESSION['mensaje'] = '¡Registro exitoso! Nos pondremos en contacto pronto.';
    $_SESSION['tipo'] = 'exito';
} catch (PDOException $e) {
    $_SESSION['mensaje'] = 'Error al guardar los datos. Intente nuevamente.';
    $_SESSION['tipo'] = 'error';
}

header('Location: index.php#contacto');
exit;
