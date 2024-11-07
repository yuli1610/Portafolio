<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "producto");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtención de datos del formulario
$nombreProducto = $_POST['nombre'];
$cantidad = (int) $_POST['cantidad'];

// Validar si existe el producto en la base de datos
$sql = "SELECT cantidad FROM productos WHERE nombre = '$nombreProducto'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Si el producto existe, restar la cantidad
    $producto = $resultado->fetch_assoc();
    $nuevaCantidad = $producto['cantidad'] - $cantidad;

    if ($nuevaCantidad >= 0) {
        // Actualizar cantidad en la base de datos
        $sqlUpdate = "UPDATE produ   SET cantidad = $nuevaCantidad WHERE nombre = '$nombreProducto'";
        $conexion->query($sqlUpdate);

        echo "<script>
            Swal.fire({
                title: 'Producto agregado',
                text: 'Cantidad descontada correctamente.',
                icon: 'success'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Cantidad insuficiente en el inventario.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    }
} else {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'Producto no encontrado.',
            icon: 'error'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
}

$productos = [
    ["nombre" => "Laptop", "cantidad" => 10],
    ["nombre" => "Mouse", "cantidad" => 25],
    ["nombre" => "Teclado", "cantidad" => 15],
    ["nombre" => "Monitor", "cantidad" => 8],
    ["nombre" => "Impresora", "cantidad" => 5],
    ["nombre" => "USB", "cantidad" => 50]
];



foreach ($productos as $producto) {
    $nombre = $producto["nombre"];
    $cantidad = $producto["cantidad"];

    $sql = "INSERT INTO productos (nombre, cantidad) VALUES ('$nombre', $cantidad)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto '$nombre' insertado correctamente.<br>";
    } else {
        echo "Error al insertar '$nombre': " . $conn->error . "<br>";
    }
}

$conexion->close();
?>
