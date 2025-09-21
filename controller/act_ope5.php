<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width, initial-scale=1.0">
        <title>act 5</title>
        <link rel="stylesheet" href="css/bg.css">
        <link rel="stylesheet" href="../css/mat_pri.css">
    
    </head>
    <body>
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
        <?php
        require_once 'conexion_bd.php';
        $uploadDir = '../imagenes/';
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){

            move_uploaded_file($_FILES['foto']['tmp_name'],'../imagenes/'.$_FILES['foto']['name']);
            $nomf = '../imagenes/'.$_FILES['foto']['name'];
        }
        
        $registro = mysqli_query($conex,"update operario set fot_ope='$nomf' where id_ope = '$_REQUEST[cod]' ") or die ("error".mysqli_error($conex));

        if($registro){
            echo "<script>
                alert('Actualización guardada');
                window.location.href = '../vista/dashboard.php';
                </script>";
                exit();
            }
        else{
            echo '<table align="center" width="50%" height="10%" border="1" bordercolor="black"><tr><th><center><font face=tahoma><h2>Foto No Actualizada';
        }

        ?>
        
    </table>

    </body>
</html>