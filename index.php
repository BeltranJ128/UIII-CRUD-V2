<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="number" name="idc" class="form-control" placeholder="ID CLIENTE" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="ide" class="form-control" placeholder="ID EMPLEADO"></input>
          </div>
          <div class="form-group">
            <input type="number" name="idp" class="form-control" placeholder="ID PRODUCTO"></input>
          </div>
          <div class="form-group">
            <input type="text" name="nom" class="form-control" placeholder="NOMBRE PRODUCTO"></input>
          </div>
          <div class="form-group">
            <input type="text" name="hr" class="form-control" placeholder="HORA"></input>
          </div>
          <div class="form-group">
            <input type="number" name="cost" class="form-control" placeholder="COSTO"></input>
          </div>
          <div class="form-group">
            <input type="number" name="iva" class="form-control" placeholder="IVA"></input>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Id Cliente</th>
            <th>Id Empleado</th>
            <th>Id Producto</th>
            <th>Nombre Producto</th>
            <th>Hora</th>
            <th>Costo</th>
            <th>IVA</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM mantenimiento";
          $resultado = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $row['id_mantenimiento']; ?></td>
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['id_empleado']; ?></td>
            <td><?php echo $row['id_producto']; ?></td>
            <td><?php echo $row['nom_producto']; ?></td>
            <td><?php echo $row['hora']; ?></td>
            <td><?php echo $row['costo']; ?></td>
            <td><?php echo $row['iva']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_mantenimiento']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id_mantenimiento']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
