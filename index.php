<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- CDN de SweetAlert2 -->
    <link rel="stylesheet" href="index.css">
    
    <style>
        footer {
            background-color: #333; /* Fondo oscuro */
            color: white;           /* Texto en color blanco */
            padding: 20px;
            text-align: center;
            position: fixed;        /* Fija el pie de página */
            width: 100%;            /* Ancho completo de la pantalla */
            bottom: 0;              /* Ubicado en la parte inferior */
            font-size: 14px;
            left: -5px;
        }

        footer a {
            color: #4a4ad8;         /* Color de los enlaces en el pie de página */
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline; /* Subrayado al pasar el cursor */
        }
    </style>

    <script>
        function confirmarEnvio(event) {
            event.preventDefault(); // Evita el envío del formulario inmediato

            Swal.fire({
                title: '¿Agregar producto?',
                text: '¿Estás seguro de que quieres agregar este producto?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, agregar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formProducto').submit(); // Enviar formulario si se confirma
                }
            });
        }
    </script>
</head>
<body>

    <div style="padding-bottom: 60px;"> <!-- Espacio para el footer -->
    </div>

    <!-- Pie de página -->
    <footer>
        © 2024 Mi Tienda. Todos los derechos reservados. | 
        <a href="politica-privacidad.php">Política de Privacidad</a> | 
        <a href="contacto.php">Contacto</a>
    </footer>

    <div class="area"></div>
    <img src="1.png" alt="" class="img">
    <div class="vertical-line"></div>
    <div class="llena">

    <center><h1 class="text">Ingreso de Productos</h1></center>

    <form id="formProducto" action="guardar_producto.php" method="POST" onsubmit="confirmarEnvio(event)">
        <div class="formu">
            <label for="nombre">Nombre del Producto:</label><br><br>
            <input type="text" id="nombre" name="nombre" required>
            <br><br>

            <label for="cantidad">Cantidad:</label><br><br>
            <input type="number" id="cantidad" name="cantidad" required>
            <br><br>
            <button type="submit" class="b1">Agregar</button>
            <button type="reset" class="b2">Cancelar</button>
        </div>
    </form>

    <button class="button1" onclick="window.location.href='productos.php'">Ver Productos</button>
    <button class="button2" onclick="window.location.href='tabla.php'">Tabla de Productos</button>

    </div>

</body>
</html>
