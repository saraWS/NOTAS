<?php
require 'Modelo/estudiantes.php';
require 'Controlador/conexionDbController.php';
require 'Controlador/baseController.php';
require 'Controlador/estudiantesController.php';

use estudiantesController\EstudiantesController;

$estudiantesController = new EstudiantesController();

$estudiantes = $estudiantesController->read();
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
        <a href="Vista/form.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiantes) {
                    echo '<tr>';
                    echo '  <td>' . $estudiantes->getId() . '</td>';
                    echo '  <td>' . $estudiantes->getName() . '</td>';
                    echo '  <td>' . $estudiantes->getUsername() . '</td>';
                    echo '  <td>';
                    echo '      <a href="Vista/form.php?id=' . $estudiantes->getId() . '">modificar</a>';
                    echo '      <a href="Vista/accion_delete.php?id=' . $estudiantes->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>