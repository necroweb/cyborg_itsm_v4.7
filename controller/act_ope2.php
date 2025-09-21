<html>
    <head>
        <title>act_ope2</title>
           <!--fuente roboto-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
            <!--fondo de imagen-->
            <link rel="stylesheet" href="css/bg.css">
            <link rel="stylesheet" href="../css/act_ope.css">
            <link rel="stylesheet" href="../css/mat_pri.css">
   
    
    <style>

      

        .foto {
        width: 130px;
        height: 130px;
        border-radius: 50%; /* Esto la hace redonda */
        border: 3px solid gray;
        padding: 1px;   
        object-fit: cover; /* Ajusta la imagen dentro del círculo */
        }

        .logo{
            margin-left: 8%;
        }


    </style>
    </head>
    <body>
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
        <?php
            require_once 'conexion_bd.php';
            if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
                move_uploaded_file($_FILES['foto']['temp_name'],'imagenes/'.$_FILES['foto']['name']);
                $nomf = 'imagenes/'.$_FILES['foto']['name'];
            }

            $registro = mysqli_query($conex,"select * from operario where id_ope = '$_REQUEST[cod]' ") or die ("error:".mysqli_error($conex));

            if($reg = mysqli_fetch_array($registro)){
        ?>
        <center>
        <font face=tahoma size=2><br><br>
            <form action="act_ope3.php" method="post" enctype="multipart/form-data">
                <table border=1 width = 50% height=60%>
                        <tr height=35% >
                            <th colspan=2> Datos a actualizar</th>
                        </tr>
                        <tr>
                            <td align=center>
                                Actualizar Nombre:<br>
                                <input type="text"      name="nom_n" value="<?php echo $reg["NOM_OPE"]?>"><br>
                                <input type="hidden"    name="nom_v" value="<?php echo $reg["NOM_OPE"]?>"><br>

                                Actualizar Apellido:<br>
                                <input type="text"      name="ape_n" value="<?php echo $reg["APE_OPE"]?>"><br>
                                <input type="hidden"    name="ape_v" value="<?php echo $reg["APE_OPE"]?>"><br>

                                Actualizar Tipo de Documento:<br>
                                <input type="text"      name="tdo_n" value="<?php echo $reg["TDO_OPE"]?>"><br>
                                <input type="hidden"    name="tdo_v" value="<?php echo $reg["TDO_OPE"]?>"><br>

                                Actualizar Documento:<br>
                                <input type="text"      name="nro_n" value="<?php echo $reg["NRO_OPE"]?>"><br>
                                <input type="hidden"    name="nro_v" value="<?php echo $reg["NRO_OPE"]?>"><br>

                                Actualizar Cargo:<br>
                                <input type="text"      name="car_n" value="<?php echo $reg["CAR_OPE"]?>"><br>
                                <input type="hidden"    name="car_v" value="<?php echo $reg["CAR_OPE"]?>"><br>

                                Actualizar Direccion:<br>
                                <input type="text"      name="dir_n" value="<?php echo $reg["DIR_OPE"]?>"><br>
                                <input type="hidden"    name="dir_v" value="<?php echo $reg["DIR_OPE"]?>"><br>

                                Actualizar Telefono:<br>
                                <input type="text"      name="tel_n" value="<?php echo $reg["TEL_OPE"]?>"><br>
                                <input type="hidden"    name="tel_v" value="<?php echo $reg["TEL_OPE"]?>"><br>

                                Actualizar RH:<br>
                                <input type="text"      name="rh_n" value="<?php echo $reg["RH_OPE"]?>"><br>
                                <input type="hidden"    name="rh_v" value="<?php echo $reg["RH_OPE"]?>"><br>

                                Actualizar Email:<br>
                                <input type="text"      name="ema_n" value="<?php echo $reg["EMA_OPE"]?>"><br>
                                <input type="hidden"    name="ema_v" value="<?php echo $reg["EMA_OPE"]?>"><br>
                            
                                Actualizar EPS:<br>
                                <input type="text"      name="eps_n" value="<?php echo $reg["EPS_OPE"]?>"><br>
                                <input type="hidden"    name="eps_v" value="<?php echo $reg["EPS_OPE"]?>"><br>

                                Actualizar ARL:<br>
                                <input type="text"      name="arl_n" value="<?php echo $reg["ARL_OPE"]?>"><br>
                                <input type="hidden"    name="arl_v" value="<?php echo $reg["ARL_OPE"]?>"><br>

                                <input type="submit" value="Actualizar Datos">

                            </td>

                    </form>
    <?php
        $ff = $reg['FOT_OPE'];
        echo "<td><center><img class='foto' src=\"$ff\" width=150 height=150>";
        }
        else
            echo"<br><br><br><center><font face=tahoma color=blue><h2>No Existe este registro";

        mysqli_close($conex);
    ?>
            <br><br/>
            <form method="post" action="Act_ope4.php">
                        <input type="hidden" name="cod" value="<?php echo $_REQUEST['cod']?>">
                        <input  type="submit" value="Actualizar foto">
                    </td>
                </tr>
            </form>
        </table>
            
            <form method="post" action="../vista/act_ope.php">
                <input type="submit" value="Otro operario">
            </form>
            <form method="post" action="../vista/mat_pri.html">
                <input type="submit" value="Menu Principal">
            </form>
    </body>
</html>