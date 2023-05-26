<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$codigo = $_POST['codigo'];
echo "El codigo  es: " . $codigo . " ";
echo "El nombre es: " . $nombre . " ". $apellido. " ";
?>
<!-- Es necesario neter el php en el html? -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Registro</title>
</head>

<body>
<h1>Modificar Registro</h1>

<form>
    
    <div>
        Activity:
        <input type="text" name="actividad">
        Nota:
        <input type="number" name="nota">
        <br>
        <button type="submit" value="Guardar" >Guardar</button>
    </div>
</form>
</body>
</html>