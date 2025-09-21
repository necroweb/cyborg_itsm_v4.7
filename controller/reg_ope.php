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
            // mover la foto al directorio correcto
            move_uploaded_file($_FILES['foto']['tmp_name'],'../imagenes/'.$_FILES['foto']['name']);
            $nomf = '../imagenes/'.$_FILES['foto']['name'];
            // insertar registro ewn la tabla
            // Verificar si ya existe el nro_ope en la base de datos
            $nro_ope = $_REQUEST['nro'];
            $query = "SELECT COUNT(*) AS total FROM OPERARIO WHERE NRO_OPE = '$nro_ope'";
            $result = mysqli_query($conex, $query);
            $row = mysqli_fetch_assoc($result);


           
    // Insertar el nuevo registro si no está repetido
    if ($row['total'] > 0) {
    echo "<script>
            alert('¡Error! El número de operario ya está registrado.');
            history.back();
          </script>";
} else {
    // Insertar el nuevo registro si no está repetido
    mysqli_query($conex, "INSERT INTO OPERARIO (NOM_OPE, APE_OPE, TDO_OPE, NRO_OPE, CAR_OPE, DIR_OPE, TEL_OPE, RH_OPE, EMA_OPE, EPS_OPE, ARL_OPE, FOT_OPE) 
    VALUES ('$_REQUEST[nom]', '$_REQUEST[ape]', '$_REQUEST[tdo]', '$_REQUEST[nro]', '$_REQUEST[car]', '$_REQUEST[dir]', '$_REQUEST[tel]', '$_REQUEST[trh]', 
    '$_REQUEST[ema]', '$_REQUEST[eps]', '$_REQUEST[arl]', '$nomf')") or die ("error".mysqli_error($conex));

    echo "<script>
            alert('¡Datos guardados exitosamente!');
            location.href = '../vista/dashboard.php';
          </script>";
}

        
    

        



            mysqli_close($conex);
        ?>

    </body>
    </html>