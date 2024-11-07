<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['Cedula'];
$posicion = $_POST['Posicion'];
$sueldo_neto = $_POST['Sueldo_neto'];

$sueldo_bruto = $sueldo_neto + 500; 

$sql = "INSERT INTO fornom (nombre, apellido, cedula, Posicion, Sueldo_bruto, Sueldo_Neto)
        VALUES ('$nombre', '$apellido', '$cedula', '$posicion', '$sueldo_bruto', '$sueldo_neto')";

if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/PHP.SQL/"); 
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
