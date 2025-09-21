<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGAR DATOS</title>
    <!--Bootstrap5-->
     <!--fondo de imagen-->
     <link rel="stylesheet" href="../css/bg.css">
    <!--style-->
    <link rel="stylesheet" href="../css/lis_ope.css">
    

    <script>
        function salir() {
            window.location.href = "mat_pri.html";
        }
    </script>
</head>
<body>
<nav class="nav nav-bar">
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
    <form action="mat_pri.html" class="logo"> 
        <input type="submit" value="Volver">
    </form>
</nav>
<br><br><br><br>
       <div class="table-lista"> 
        <table  align="center" width="50%" height="100%" border="NONE" bordercolor="black" >
            
          
            <tr>
                <th colspan="13">LISTA DE OPERARIOS</th>
            </tr>
        
            <tr>
                <th>ID</th><th>NOMBRES</th><th>APELLIDOS</th><th>DOCUMENTO</th><th>CARGO</th> <th>TELEFONO</th><th>EMAIL</th><th>FOTO</th>
            </tr>
        


        <?php
            //conexion php mysql
            require_once "conexion_bd.php";

            //mostrar los registros
            $registro = mysqli_query($conex,'select*from operario') or die ("error".mysqli_error($conex));
        
            //invocar el arreglo
            while ($reg=mysqli_fetch_array($registro)) {
                
                echo '<tr><th>'.$reg['ID_OPE'].'</th>';
                $id_apr = $reg['FOT_OPE'];
                
                echo '<Th>'.$reg['NOM_OPE'].'</TD>';
                echo '<Th>'.$reg['APE_OPE'].'</TD>';
                echo '<Th>'.$reg['CAR_OPE'].'</TD>';
                echo '<Th>'.$reg['EMA_OPE'].'</TD>';
                echo '<Th>'.$reg['ARL_OPE'].'</TD>';

        
                $ff = $reg['FOT_OPE'];
                
                echo "<Th><img src=\"$ff\" width=50 height=50></TD>";
            }
            echo '</table>';

            mysqli_close($conex);
            
        ?>
        <br>
       




</body>
</html>