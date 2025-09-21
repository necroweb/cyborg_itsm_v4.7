<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=cent, initial-scale=1.0">
    <title>Prueba</title>
  
    <!-- CSS Files -->
    <!-- CSS Files -->
     <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<style>
  
</style>
<body>


        
    <?php
        //conexion php con mysql
        session_start();
        require_once "conexion_bd.php";

        move_uploaded_file($_FILES['foto']['tmp_name'],'../imagenes/'.$_FILES['foto']['name']);
        $nomf = '../imagenes/'.$_FILES['foto']['name'];
        // insertar registro ewn la tabla

        mysqli_query ($conex, "INSERT INTO SUPERVISOR (NOM_SUP, APE_SUP, USE_SUP, PAS_SUP, CAR_SUP, FOT_SUP) values
        ('$_REQUEST[nom]','$_REQUEST[ape]','$_REQUEST[use]','$_REQUEST[pas]','$_REQUEST[car]','$nomf')") or die ("error".mysqli_error($conex));

            
       
    // Aquí va la lógica para guardar los datos
    // ...

    // Mostrar mensaje después de guardar
    echo "<script>
            alert('¡Datos guardados exitosamente.!');
            location.href = '../vista/dashboard.php';
        </script>";
    
   

    



        mysqli_close($conex);
    ?>

</body>
</html>