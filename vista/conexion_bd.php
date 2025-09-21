<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=cent, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <?php
        //establecer conexion de php con mysql
        $conex = mysqli_connect ("localhost","root" , "") or die ("mysql no se conecto");
        mysqli_select_db ($conex,"CYBORG_ITSM") or die ("base de datos no encontrada");
    ?>
</body>
</html>