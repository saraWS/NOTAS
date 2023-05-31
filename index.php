<?php
require 'Modelo/estudiantes.php';
require 'Controlador/conexionDbController.php';
require 'Controlador/baseController.php';
require 'Controlador/estudiantesController.php';

use estudiantesController\EstudiantesController;

$estudiantesController = new EstudiantesController();

$estudiante = $estudiantesController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista estudiantes</h1>
        <a href="Vista/form.php">Nuevo registro estudiante</a>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiante as $estudiantes) {
                    echo '<tr>';
                    echo '  <td>' . $estudiantes->getCodigo() . '</td>';
                    echo '  <td>' . $estudiantes->getNombres() . '</td>';
                    echo '  <td>' . $estudiantes->getApellidos() . '</td>';
                    echo '  <td>';
                    echo '      <a href="Vista/form.php?codigo=' . $estudiantes->getCodigo() . '">modificar</a>';
                    echo '      <a href="Vista/accion_delete.php?codigo=' . $estudiantes->getCodigo() . '">borrar</a>';
                    echo '      <a href="index_notas.php?codigo=' . $estudiantes->getCodigo() . '">NOTAS ESTUDIANTES</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
    
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>