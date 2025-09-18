<?php
// Ruta del archivo donde guardaremos los datos
$archivo = "contactos.csv";

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$fecha = date("Y-m-d H:i:s");

// Verificar si el archivo existe
$existe = file_exists($archivo);

// Abrir el archivo en modo añadir (append)
$fp = fopen($archivo, "a");

// Si es la primera vez, escribir la cabecera
if (!$existe) {
    fputcsv($fp, ["Nombre", "Email", "Asunto", "Mensaje", "Fecha"]);
}

// Guardar los datos del formulario en una nueva fila
fputcsv($fp, [$nombre, $email, $asunto, $mensaje, $fecha]);

// Cerrar archivo
fclose($fp);

// Redirigir a página de gracias o mostrar mensaje
echo "<script>alert('✅ Tu mensaje fue guardado correctamente'); window.location.href='index.html';</script>";
?>
