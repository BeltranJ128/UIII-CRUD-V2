<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM mantenimiento WHERE id_mantenimiento=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $idc = $row['id_cliente'];
    $ide = $row['id_empleado'];
    $idp = $row['id_producto'];
    $np = $row['nom_producto'];
    $hr = $row['hora'];
    $cost = $row['costo'];
    $iva = $row['iva'];
  }
}

if (isset($_POST['editar'])) {
  $id = $_GET['id'];
  $idc = $_POST['idc'];
  $ide = $_POST['ide'];
  $idp = $_POST['idp'];
  $np = $_POST['np'];
  $hr = $_POST['hr'];
  $cost = $_POST['cost'];
  $iva = $_POST['iva'];

  $query = "UPDATE mantenimiento set id_cliente = '$idc', id_empleado = '$ide', id_producto = '$idp', nom_producto = '$np', hora = '$hr', costo = '$cost', iva = '$iva' WHERE id_mantenimiento=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tarea Editada Exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="idc" type="text" class="form-control" value="<?php echo $idc; ?>" placeholder="ID Cliente">
        </div>
        <div class="form-group">
          <input name="ide" type="text" class="form-control" value="<?php echo $ide; ?>" placeholder="ID Empleado">
        </div>
        <div class="form-group">
          <input name="idp" type="text" class="form-control" value="<?php echo $idp; ?>" placeholder="ID Producto">
        </div>
        <div class="form-group">
          <input name="np" type="text" class="form-control" value="<?php echo $np; ?>" placeholder="Nombre Producto">
        </div>
        <div class="form-group">
          <input name="hr" type="text" class="form-control" value="<?php echo $hr; ?>" placeholder="Hora">
        </div>
        <div class="form-group">
          <input name="cost" type="text" class="form-control" value="<?php echo $cost; ?>" placeholder="Costo">
        </div>
        <div class="form-group">
          <input name="iva" type="text" class="form-control" value="<?php echo $iva; ?>" placeholder="IVA">
        </div>
        <button class="btn-success" name="editar">
          Editar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
