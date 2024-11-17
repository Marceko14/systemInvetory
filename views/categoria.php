<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.php");
} else {
  require 'escritorio.php';
  if ($_SESSION['almacen'] == 1) {
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title right-align">Categoría 
              <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                <i class="fa fa-plus-circle"></i> Agregar
              </button>
            </h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
              </tfoot>
            </table>
          </div>
          <!-- Formulario de registros -->
          <div class="panel-body" style="height: 400px;" id="formularioregistros">
            <form name="formulario" id="formulario" method="POST">
              <!-- Input Nombre alineado a la derecha y pequeño -->
              <div class="form-group col-12 ml-auto">
                <label for="nombre">Nombre:</label>
                <input type="hidden" name="idcategoria" id="idcategoria">
                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
              </div>

              <!-- Input Descripción alineado a la derecha y pequeño -->
              <div class="form-group col-12 ml-auto">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
              </div>

              <!-- Botones alineados a la derecha -->
              <div class="form-group col-12 text-right">
                <button class="btn btn-primary btn-sm" type="submit" id="btnGuardar">
                  <i class="fa fa-save"></i> Guardar
                </button>
                <button class="btn btn-danger btn-sm" onclick="cancelarform()" type="button">
                  <i class="fa fa-arrow-circle-left"></i> Cancelar
                </button>
              </div>
            </form>
          </div>
          <!-- Fin centro -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<?php
  } else {
    require 'noacceso.php';
  }
  require 'footer.php';
?>

<style>
  /* Alineación del botón a la derecha */
  .box-tools {
    display: flex;
    justify-content: flex-end;
  }

  .box-tools .btn-success {
    margin-left: 10px; /* Ajuste del espacio si lo necesitas */
  }

  /* CSS para mover el título a la derecha */
  .right-align {
    position: absolute;
    left: 78%;
    top: -2%;

  }

  /* Reducir el tamaño de los inputs */
  .form-control {
    font-size: 1rem; /* Tamaño de texto más grande */
    width: 112%; /* Asegura que ocupen todo el ancho disponible */
  }

  /* Alineación de los inputs hacia la derecha */
  .ml-auto {
    margin-left: 30%;
    width:70%;
  }

  /* Alineación de botones a la derecha */
  .text-right {
    text-align: right;
  }
</style>

<script type="text/javascript" src="scripts/categoria.js"></script>

<?php 
}
ob_end_flush();
?>
