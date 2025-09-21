<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=cent, initial-scale=1.0">
    <title>Prueba</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
   
</head>
<body>
    <center>
        <h1>
            Conexion base de datos a base de datos 
        </h1>
    <?php
        //conexion php con mysql
        require_once "conexion_bd.php";

       
        // insertar registro ewn la tabla

        mysqli_query ($conex, "INSERT INTO USUARIO (NOM_USE, PAS_USE) values
        ('$_REQUEST[nom]','$_REQUEST[pas]')") or die ("error".mysqli_error($conex));
        echo "<div class='alert alert-success text-center' role='alert'>";
        echo ("<center><h5>--Datos guardados correctamente--");

        mysqli_close($conex);

    ?>
</body>
</html>