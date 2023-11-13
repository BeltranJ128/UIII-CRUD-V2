<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $idc = $_POST['idc'];
  $ide = $_POST['ide'];
  $idp = $_POST['idp'];
  $np = $_POST['nom'];
  $hr = $_POST['hr'];
  $cost = $_POST['cost'];
  $iva = $_POST['iva'];
  $query = "INSERT INTO mantenimiento(id_cliente, id_empleado, id_producto, nom_producto, hora, costo, iva) VALUES ('$idc', '$ide', '$idp', '$np', '$hr', '$cost', '$iva')";
  $resultado = mysqli_query($conn, $query);
  if(!$resultado) {
    die("Consulta Fallida.");
  }

  $_SESSION['message'] = 'Tarea Guardada Exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
