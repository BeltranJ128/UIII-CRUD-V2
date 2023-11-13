<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM mantenimiento WHERE id_mantenimiento = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Tarea Removida Exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
