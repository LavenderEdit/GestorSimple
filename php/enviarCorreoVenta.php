<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$cliente = $data['cliente'] ?? '';
$usuario = $data['usuario'] ?? '';
$fecha = $data['fecha'] ?? '';
$total = $data['total'] ?? '';
$correoDestino = $data['correo'] ?? '';

if (!$cliente || !$correoDestino || !$total) {
    echo json_encode(['success' => false, 'message' => 'Faltan datos necesarios.']);
    exit;
}

$asunto = "Detalle de tu compra - Comprobante";

$mensaje = "
<html>
<head>
  <title>Detalle de Venta</title>
</head>
<body style='font-family: Arial, sans-serif;'>
  <h2 style='color: #333;'>Gracias por tu compra</h2>
  <p><strong>Cliente:</strong> $cliente</p>
  <p><strong>Registrado por:</strong> $usuario</p>
  <p><strong>Fecha:</strong> $fecha</p>
  <p><strong>Total:</strong> S/ " . number_format($total, 2) . "</p>
  <p style='margin-top: 30px;'>Este es un correo automático, no responder.</p>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: Mi Sistema de Ventas <no-responder@mpphp.com>" . "\r\n";

$enviado = mail($correoDestino, $asunto, $mensaje, $headers);

if ($enviado) {
    echo json_encode(['success' => true, 'message' => 'Correo enviado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Se ha enviado el correo.']);
}
