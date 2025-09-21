
<?php
ob_start();
require_once "../controller/conexion_bd.php";
session_start();

if (isset($_SESSION['id_sup'])) {
    $id = $_SESSION['id_sup'];
    mysqli_query($conex, "UPDATE SUPERVISOR SET ses_sup = 0 WHERE ID_SUP = '$id'");
}

if (isset($_SESSION['id_ope'])) {
    $id = $_SESSION['id_ope'];
    mysqli_query($conex, "UPDATE OPERARIO SET ses_ope = 0 WHERE ID_OPE = '$id'");
}

// Destruye todas las variables de sesión
session_unset(); // borra los datos del la sesion 
session_destroy(); // cierra la conexion con la base de datos

// Redirige al login o a la página principal
header("Location: ../index.html");
exit();
?>
