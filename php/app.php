<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>

<body>
    <h1>Notas</h1>

    <?php
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    echo "El codigo :" . $codigo . " ";
    echo "El nombre :" . $nombre . " " . $apellido . " ";
    ?>

    <form action="modificar.php" method="post">
        <p> Actividad: 
            <input type="text" name="actividad">
            Nota: 
            <input type="number" name="nota">
            <button  type="submit" value="Modificar"></button>
            <button  type="submit" value="Agregar"></button>
        </p>
    </form>

    <button onclick="crear">crear</button>

    <p id="crear"></p>



</body>

</html>
