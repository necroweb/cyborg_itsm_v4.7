<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mat_pri.css">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <title>Consultar registros</title>
</head>
<body>
<img class="logo"src="../img/logo.png" alt="" width="20%" height="20%">
    <?php
    require_once "conexion_bd.php";

    //mostrar los registro de la tabla de acuerdo al control

    $registro = mysqli_query($conex, "select * from operario where id_ope = '$_REQUEST[cod]'") or die ("error".mysqli_error($conex));

    if ($reg=mysqli_fetch_array($registro) && (isset($_REQUEST['eli']))){
        echo "<div class='alert alert-success text-center' role='alert'> ";
        echo "Empleado eliminado exitosamente </div>" ;
        mysqli_query($conex,"delete  from operario where id_ope = '$_REQUEST[cod]'") or die ("error".mysqli_error($conex));
       
    }
    else {
        
        
        echo "<div class='alert alert-danger text-center' role='alert'>";
        echo "<th>No existe registro de empleado:</th></tr></div>";


    }
    mysqli_close($conex);
    ?>

    
    
</body>
</html>