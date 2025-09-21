<?php
require_once "conexion_bd.php";

$doc = $_GET['doc'] ?? '';
$fecha_inicio = $_GET['fecha_inicio'] ?? '';
$fecha_fin = $_GET['fecha_fin'] ?? '';

if (!$doc || !$fecha_inicio || !$fecha_fin) exit("Faltan parámetros.");

// Consulta
$sql = "
  SELECT NOM_REG, FEC_REG, HOR_REG, ACCION
  FROM REGISTROS
  WHERE DOC_REG = ?
    AND FEC_REG BETWEEN ? AND ?
  ORDER BY FEC_REG ASC, HOR_REG ASC
";

$stmt = mysqli_prepare($conex, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $doc, $fecha_inicio, $fecha_fin);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$marcasPorFecha = [];

while ($row = mysqli_fetch_assoc($result)) {
    $fecha = $row['FEC_REG'];
    $marcasPorFecha[$fecha][] = $row;
}

$totalGeneralSegundos = 0;

echo "<h2>Operario: $doc</h2>";
echo "<h3>Desde $fecha_inicio hasta $fecha_fin</h3>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<thead>
        <tr>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Hora de Entrada</th>
          <th>Hora de Salida</th>
        </tr>
      </thead>
      <tbody>";

foreach ($marcasPorFecha as $fecha => $marcas) {
    $entrada = null;
    $nombre = $marcas[0]['NOM_REG'] ?? '';

    foreach ($marcas as $m) {
        if ($m['ACCION'] === 'ingreso') {
            $entrada = $m['HOR_REG'];
        } elseif ($m['ACCION'] === 'salida' && $entrada !== null) {
            $salida = $m['HOR_REG'];
            
            // Calcular tiempo trabajado
            $t1 = strtotime("$fecha $entrada");
            $t2 = strtotime("$fecha $salida");
            if ($t2 < $t1) $t2 += 24 * 3600;
            $duracion = $t2 - $t1;
            $totalGeneralSegundos += $duracion;

            // Mostrar fila
            echo "<tr>
                    <td>$nombre</td>
                    <td>$fecha</td>
                    <td>$entrada</td>
                    <td>$salida</td>
                  </tr>";

            $entrada = null;
        }
    }
}

echo "</tbody></table><br>";

$h_total = floor($totalGeneralSegundos / 3600);
$m_total = floor(($totalGeneralSegundos % 3600) / 60);
echo "<h3>🧾 Total general trabajado: <strong>$h_total h " . sprintf("%02d", $m_total) . " m</strong></h3>";
?>