<?php
date_default_timezone_set("America/Bogota");
require_once "conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $documento = $_POST["DOC_REG"];
    $accion = $_POST["accion"];
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    // Buscar el nombre en la tabla operario
    $sql = "SELECT NOM_OPE, APE_OPE, FOT_OPE FROM operario WHERE NRO_OPE = '$documento'";
    $resultado = $conex->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nombre = $fila["NOM_OPE"];
        $apellido = $fila["APE_OPE"];
        $ff = $fila["FOT_OPE"];

        // Verificar si ya existe un registro con la misma acción hoy
        $sql_check = "SELECT * FROM REGISTROS 
                      WHERE DOC_REG = '$documento' AND FEC_REG = '$fecha' AND ACCION = '$accion'";
        $res_check = $conex->query($sql_check);

        if ($res_check->num_rows > 0) {
            echo "<center><b>Ya existe un registro de $accion para $nombre $apellido hoy ($fecha).</b></center>";
        } else {
        // Registrar la entrada o salida
        $sql_insert = "INSERT INTO REGISTROS (DOC_REG, NOM_REG, APE_REG, FEC_REG, HOR_REG, ACCION) 
                       VALUES ('$documento', '$nombre', '$apellido', '$fecha', '$hora', '$accion')";

        if ($conex->query($sql_insert) === TRUE) {
            echo "
            <div class='text-center'>
              <h5 class='mb-3 text-success'>✅ Registro exitoso</h5>
              <p><strong>$nombre $apellido</strong> ha registrado su <strong>$accion</strong> correctamente.</p>
              <p><small>Fecha: $fecha | Hora: $hora</small></p>";
              $ff= "imagenes/" .$fila['FOT_OPE'];
                echo "<th colspan=4><img class='foto' src=\"$ff\" width=130 height=130></tr></th>
              <div class='mt-3'>
                
              </div>
            </div>";
        } else {
            echo "<div class='alert alert-danger'>❌ Error al registrar: " . $conex->error . "</div>";
        }
        }
    }else {
        echo "<div class='alert alert-warning'>⚠️ Empleado no encontrado.</div>";
    }
}

mysqli_close($conex);
?>