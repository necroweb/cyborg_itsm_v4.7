<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operario consultado</title>
    <!--css-->
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/con_ope.css">
    <link rel="stylesheet" href="../css/mat_pri.css">
    
     <!--fuente roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--fondo de imagen-->
    <link rel="stylesheet" href="css/bg.css">

</head>
<body>
<nav class="nav nav-bar">
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
    <form action="../vista/mat_pri.html" class="logo"> 
        <input type="submit" value="Volver">
    </form>
</nav>
    <?php
    require_once 'conexion_bd.php';
    $registro = mysqli_query($conex,"select * from operario where id_ope = '$_REQUEST[cod]'  OR NOM_OPE LIKE '$_REQUEST[cod]' OR APE_OPE LIKE'$_REQUEST[cod]'") or die("error".mysqli_error($conex));
    // realizar mas consultas o filtros con nombres o apellidos
    if($reg=mysqli_fetch_array($registro)){
        echo "<br><center><table width=50% height=40% border=2 callspacing=0 <tr><th colspan=4";
        echo "<th>Informacion del empleado:</th></tr>";
        echo "<tr>";
        $ff=$reg['FOT_OPE'];
        echo "<th colspan=4><img class='foto' src=\"$ff\" width=130 height=130></img></tr></th>";
        echo '<tr><th> id: <th>'   .$reg['ID_OPE'].'</th>';
        echo '<th> nom: <th>' .$reg['NOM_OPE'].'</th>';
        echo '<tr><th> ape: <th>' .$reg['APE_OPE'].'</th>';
        echo '<th> tdo: <th>' .$reg['TDO_OPE'].'</th>';
        echo '<tr><th> nro: <th>' .$reg['NRO_OPE'].'</th>';
        echo '<th> car: <th>' .$reg['CAR_OPE'].'</th>';
        echo '<tr><th> dir: <th>' .$reg['EMA_OPE'].'</th>';
        echo '<th> tel: <th>' .$reg['CAR_OPE'].'</th>';
        echo '<tr><th> trh: <th>' .$reg['DIR_OPE'].'</th>';
        echo '<th> ema: <th>' .$reg['RH_OPE'].'</th>';
        echo '<tr><th> eps: <th>' .$reg['EPS_OPE'].'</th>';
        echo '<th> arl: <th>' .$reg['ARL_OPE'].'</th>';
    
        
        echo'</th></tr></table>';
    }
    else{
   
        echo "<script language='JavaScript'>
                alert('Empleado no exite');
                location.assign('../vista/con_ope.html');
            </script>";
         
    }
    mysqli_close($conex);
    ?>
</body>
</html>
