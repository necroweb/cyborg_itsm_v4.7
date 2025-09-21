<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicial</title>
    
    
    <link rel="stylesheet" href="../css/mat_pri.css">

    <!--Bootstrap5-->
   
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!--javascript-->
    
</head>
<body>
    <nav class="nav nav-bar">
        <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
        <form action="mat_pri.html" class="logo"> 
            <input type="submit" value="Volver">
        </form>
    </nav>
    <br><br>

       <div class="table-lista"> 
        <table  align="center" width="80%" height="100%" border="1" bordercolor="black" >
            
          
     <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Descripción</th>
        <th>Foto</th>
        <th>Operario</th>
      </tr>



        <?php
            //conexion php mysql
            require_once "conexion_bd.php";

            //mostrar los registros
            $registro = mysqli_query($conex,"SELECT n.*, o.NOM_OPE, o.APE_OPE FROM NOVEDAD n
                    INNER JOIN operario o ON n.ID_OPE = o.ID_OPE
                    ") or die ("error".mysqli_error($conex));

                        
            //invocar el arreglo

       

            while ($reg = mysqli_fetch_array($registro)) {
                echo '<tr>';
                echo '<th>'.$reg['ID_NOV'].'</th>';
                echo '<th>'.$reg['TIP_NOV'].'</th>';
                echo '<th>'.$reg['FEC_NOV'].'</th>';
                echo '<th>'.$reg['DES_NOV'].'</th>';
                
                // Mostrar imagen
                echo '<th><img src="'.$reg['FOT_NOV'].'" width="50" height="50"></th>';
            
                // Mostrar nombre y apellido del operario relacionado
                echo '<th>'.$reg['NOM_OPE'].' '.$reg['APE_OPE'].'</th>';
                echo '</tr>';
            }
            
            echo '</table>';

            mysqli_close($conex);
            
        ?>
        <br>
     


</body>
</html>