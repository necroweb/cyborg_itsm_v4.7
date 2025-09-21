<?php
require_once "../../controller/conexion_bd.php";
session_start();

$id_ope = isset($_SESSION['id_ope']) ? intval($_SESSION['id_ope']) : 0;

$registro = mysqli_query($conex, "
  SELECT r.*, o.NOM_OPE, o.APE_OPE, o.FOT_OPE
  FROM REGISTROS r
  INNER JOIN OPERARIO o ON r.DOC_REG = o.NRO_OPE
  WHERE o.ID_OPE = $id_ope
") or die("error: " . mysqli_error($conex));

wwhile ($reg = mysqli_fetch_array($registro)) {
    echo '<tr>';
    echo '<td>' . $reg['ID_REG'] . '</td>';
    echo '<td>' . $reg['NOM_REG'] . '</td>';
    echo '<td>' . $reg['APE_REG'] . '</td>';
    echo '<td>' . $reg['FEC_REG'] . '</td>';
    echo '<td>' . $reg['HOR_REG'] . '</td>';
    echo '<td>' . ucfirst($reg['ACCION']) . '</td>';
    echo '</tr>';

<?php
}
?>
