<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php
session_start();
require_once "conexion_bd.php";

if(isset($_POST['ing'])) {
    $rol = $_POST['rol']; // recoge variable selecct con rol supervisor u operador

    if ($rol == 'supervisor') {
        
        if (!empty($_POST['use']) && !empty($_POST['pas'])) {
            $use = $_POST['use'];
            $pas = $_POST['pas'];
        
            $ing = mysqli_query($conex, "SELECT * FROM SUPERVISOR WHERE use_sup = '$use' AND pas_sup = '$pas'")
                or die("error: " . mysqli_error($conex));

            if ($fila = mysqli_fetch_assoc($ing)) {
                    $_SESSION['id_sup'] = $fila['ID_SUP'];
                    $_SESSION['apellido'] = $fila['APE_SUP'];
                    $_SESSION['nombre'] = $fila['NOM_SUP'];
                    $_SESSION['use_sup'] = $fila['USE_SUP'];
                    $_SESSION['pas_sup'] = $fila['PAS_SUP'];
                    $_SESSION['car_sup'] = $fila['CAR_SUP'];
                    $_SESSION['fot_sup'] = $fila['FOT_SUP'];

                    mysqli_query($conex, "UPDATE SUPERVISOR SET ses_sup = 1 WHERE ID_SUP = '{$fila['ID_SUP']}'");

                echo "<script language='JavaScript'>
                    location.assign('dashboard.php');
                </script>";
                exit();
            } else {
                echo "<script language='JavaScript'>
                    alert('Usuario o contraseña incorrectos');
                    location.assign('../index.html');
                </script>";
                
            }
        } else {
            echo "<script language='JavaScript'>
            alert('El nombre de usuario o la contraseña no han sido ingresados');
            location.assign('../index.html');
            </script>"; 
        }
    } elseif ($rol == 'operario') {
       
            if (!empty($_POST['use']) && !empty($_POST['pas'])) {
                $use = $_POST['use'];
                $pas = $_POST['pas'];

                $ing = mysqli_query($conex, "SELECT * FROM OPERARIO WHERE nom_ope = '$use' AND nro_ope = '$pas'")
                    or die("error: " . mysqli_error($conex));

                if ($fila = mysqli_fetch_assoc($ing)) {
                    // Guardar todos los campos en variables de sesión
                    $_SESSION['nom_ope'] = $fila['NOM_OPE'];
                    $_SESSION['ape_ope'] = $fila['APE_OPE'];
                    $_SESSION['car_ope'] = $fila['CAR_OPE'];
                    $_SESSION['eps_ope'] = $fila['EPS_OPE'];
                    $_SESSION['arl_ope'] = $fila['ARL_OPE'];
                    $_SESSION['fot_ope'] = $fila['FOT_OPE'];
                    $_SESSION['tdo_ope'] = $fila['TDO_OPE']; // ← Asegúrate de que esta columna exista en la BD
                    $_SESSION['nro_ope'] = $fila['NRO_OPE'];
                    $_SESSION['dir_ope'] = $fila['DIR_OPE'];
                    $_SESSION['tel_ope'] = $fila['TEL_OPE'];
                    $_SESSION['rh_ope']  = $fila['RH_OPE'];
                    $_SESSION['ema_ope'] = $fila['EMA_OPE'];
                    $_SESSION['id_ope']  = $fila['ID_OPE'];


                    mysqli_query($conex, "UPDATE OPERARIO SET ses_ope = 1 WHERE ID_OPE = '{$fila['ID_OPE']}'");
                     

                    echo "<script >
                            location.assign('vista_ope/ini_ope.php'); 
                          </script>";
                } else {
                echo "  <script>
                        alert('Usuario o contraseña incorrectos');
                        location.href = '../index.html';
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Debe ingresar usuario y contraseña');
                    location.href = '../index.html';
                    </script>";
            
                }
               
    } else {
        echo "<script language='JavaScript'>
        alert('Seleccione un rol');
        location.assign('../index.html');
        </script>"; 
    }
}
?>

