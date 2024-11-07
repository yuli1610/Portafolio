<?php
$conexion = new mysqli("localhost", "root", "", "producto");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$sql = "SELECT id, nombre, cantidad FROM produ";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="tabla.css">
</head>
<body>

    <center><h1 class="T1">Almacén</h1></center><br><br>
    <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 20px;">
        <button onclick="eliminarProducto()" title="Eliminar">
            <i class="bt1" style="font-size: 24px; color: red;"></i>
        </button>
        <button onclick="editarProducto()" title="Editar">
            <i class="fas fa-edit" style="font-size: 24px; color: blue;"></i>
        </button>
        <button onclick="actualizarTabla()" title="Actualizar">
            <i class="fas fa-sync-alt" style="font-size: 24px; color: green;"></i>
        </button>
    </div>


    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $resultado->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conexion->close();
?>

<script>
        function eliminarProducto() {
            alert('Función para eliminar producto');
            // Lógica para eliminar
        }

        function editarProducto() {
            alert('Función para editar producto');
            // Lógica para editar
        }

        function actualizarTabla() {
            alert('Función para actualizar la tabla');
            // Lógica para actualizar
        }
    </script>