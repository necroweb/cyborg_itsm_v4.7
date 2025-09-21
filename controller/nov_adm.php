<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=cent, initial-scale=1.0">
    <title>Prueba</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    
</head>

<body>
    <center> 
    <?php
        //conexion php con mysql
        session_start(); 
        require_once "conexion_bd.php";
       
        // Verifica si la sesión tiene el ID_sup
        if (!isset($_SESSION['id_sup'])) {
            die("Error: No hay sesión activa o no se encuentra el ID del operario.");
        }
        
        
        $id_sup = $_SESSION['id_sup'];
        
        // Subir imagen
        $foto = $_FILES['foto'];
        $nombreFoto = $_FILES['foto']['name'];
        $rutaDestino = '../imagenes2/' . $nombreFoto;
        
        if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
        
            // Insertar en la base de datos
            $tip_nov = $_REQUEST['tip_nov'];
            $fec = $_REQUEST['fec'];
            $des = $_REQUEST['des'];
        
            $sql = "INSERT INTO NOVEDAD (TIP_NOV, FEC_NOV, DES_NOV, FOT_NOV, ID_SUP) 
                    VALUES ('$tip_nov', '$fec', '$des', '$rutaDestino', '$id_sup')";
        
            if (mysqli_query($conex, $sql)) {
                
                echo    "<script language='JavaScript'>
                        alert('¡Datos guardados exitosamente!');
                        location.assign('../pages/nov_sup.php'); 
                        </script>";
                
            } else {
                echo "Error al guardar: " . mysqli_error($conex);
            }
        
        } else {
            echo "<script language='JavaScript'>
                        alert('¡error al subir la imagen!');
                        location.assign('../pages/nov_sup.php');
                        </script>";
            
        }
        
        mysqli_close($conex);
        ?>
        

</body>
</html>