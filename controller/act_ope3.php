<html>
    <head>
        <title>Modificar Datos</title>
         <!--fuente roboto-->
         <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
            <!--fondo de imagen-->
            <link rel="stylesheet" href="css/bg.css">
            <link rel="stylesheet" href="../css/act_ope.css">
            <link rel="stylesheet" href="../css/mat_pri.css">
    <script>
        function volver(){
            location.href = "act_ope2.php"
        }
    </script>
    </head>
    <body>
    <nav class="nav nav-bar">
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
        <form action="../vista/act_ope.php" class="logo"> 
            <input type="submit" value="Volver">
        </form>
    </nav>
        <?php
            require_once 'conexion_bd.php';

            $registro = mysqli_query($conex,"update operario set NOM_OPE= '$_REQUEST[nom_n]' where NOM_OPE= '$_REQUEST[nom_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set APE_OPE= '$_REQUEST[ape_n]' where APE_OPE= '$_REQUEST[ape_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set TDO_OPE= '$_REQUEST[tdo_n]' where TDO_OPE= '$_REQUEST[tdo_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set NRO_OPE= '$_REQUEST[nro_n]' where NRO_OPE= '$_REQUEST[nro_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set CAR_OPE= '$_REQUEST[car_n]' where CAR_OPE= '$_REQUEST[car_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set DIR_OPE= '$_REQUEST[dir_n]' where DIR_OPE= '$_REQUEST[dir_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set TEL_OPE= '$_REQUEST[tel_n]' where TEL_OPE= '$_REQUEST[tel_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set RH_OPE= '$_REQUEST[rh_n]' where RH_OPE= '$_REQUEST[rh_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set EMA_OPE= '$_REQUEST[ema_n]' where EMA_OPE= '$_REQUEST[ema_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set EPS_OPE= '$_REQUEST[eps_n]' where EPS_OPE= '$_REQUEST[eps_v]' ")or die("error".mysql_error());
            $registro = mysqli_query($conex,"update operario set ARL_OPE= '$_REQUEST[arl_n]' where ARL_OPE= '$_REQUEST[arl_v]' ")or die("error".mysql_error());

            echo "<script>
                alert('Actualización guardada');
                window.location.href = '../vista/dashboard.php';
                </script>";
                exit();
        ?>
        
        

        
            <form method="post" action="../vista/mat_pri.html">
            <tr>
                <th>    
                <input type="submit" value="Menu Principal">
                </th>
            </tr>
            </form>
        </table>
    </body>
</html>