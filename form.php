<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            background-image: url('fondo_php (1).png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .table-container {
            position: relative;
            top: 80px; 
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 8px;
            width: 80%; 
        }
        h1 {
            color: rgb(129, 100, 209);
            font-size: 300%;
            position: relative;
            left: 20px;
            top: -200px;
            text-shadow: 3px 3px 5px rgba(31, 85, 167, 0.5);
        }
    </style>
    <title>Tabla de Datos</title>
</head>
<body>
    <center>
        <h1>Datos Ingresados</h1>
    </center>

    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Posición</th>
                    <th scope="col">Sueldo Neto</th>
                    <th scope="col">Sueldo Bruto</th>
                    <th scope="col">Imp. Sobre la Renta</th>
                    <th scope="col">Seguro de Vida</th>
                    <th scope="col">Contribución del Empleado al Seguro de Pensiones</th>
                    <th scope="col">Plan Odontológico</th>
                    <th scope="col">Seguro Familiar de Salud</th>
                    <th scope="col">Descuentos Funerarios</th>
                    <th scope="col">Plan de Retiro Complementario</th>
                    <th scope="col">Incentivo por Formación Académica</th>
                    <th scope="col">Incentivo por Evaluación de Desempeño</th>
                    <th scope="col">Incentivo por Experiencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = new mysqli("localhost", "root", "", "nomina");

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consulta SQL para obtener todos los campos necesarios
                $sql = "SELECT nombre, apellido, cedula, Posicion, Sueldo_Neto, Sueldo_bruto, 
                        Imp_Sobre_la_Renta, Seguro_de_Vida, Contribución_del_Empleado_al_Seguro_de_Pensiones, 
                        Plan_Odontológico, Seguro_Familiar_de_Salud, Descuentos_Funerarios, 
                        Plan_de_Retiro_Complementario, Incentivo_por_Formación_Títulos_Académicos, 
                        Incentivo_por_Evaluación_de_Desempeño, Incentivo_por_Experiencia_Años_en_Servicio 
                        FROM fornom";

                // Ejecutar la consulta
                $resultado = $conexion->query($sql);

                // Verificar si se obtuvieron resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar datos en la tabla
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>
                                 <td>{$row['nombre']}</td>
                                 <td>{$row['apellido']}</td>
                                 <td>{$row['cedula']}</td>
                                 <td>{$row['Posicion']}</td>
                                 <td>{$row['Sueldo_Neto']}</td>
                                 <td>{$row['Sueldo_bruto']}</td>
                                 <td>{$row['Imp_Sobre_la_Renta']}</td>
                                 <td>{$row['Seguro_de_Vida']}</td>
                                 <td>{$row['Contribución_del_Empleado_al_Seguro_de_Pensiones']}</td>
                                 <td>{$row['Plan_Odontológico']}</td>
                                 <td>{$row['Seguro_Familiar_de_Salud']}</td>
                                 <td>{$row['Descuentos_Funerarios']}</td>
                                 <td>{$row['Plan_de_Retiro_Complementario']}</td>
                                 <td>{$row['Incentivo_por_Formación_Títulos_Académicos']}</td>
                                 <td>{$row['Incentivo_por_Evaluación_de_Desempeño']}</td>
                                 <td>{$row['Incentivo_por_Experiencia_Años_en_Servicio']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No hay datos disponibles.</td></tr>";
                }

                // Cerrar la conexión
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>

    <span style="color: blue; text-decoration: underline; cursor: pointer;" class="link2" onclick="window.location.href = 'http://localhost/Formulario/';">
        Volver atrás
    </span>
</body>
</html>