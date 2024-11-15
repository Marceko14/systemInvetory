<?php
// Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.php");
}
else
{
require 'escritorio.php';
if ($_SESSION['compras']==1)
{
?>
<!-- Contenido -->
<div class="content-wrapper">        
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                    <h1 class="box-title right-align">Proveedor</h1>
                    <!-- Mover el botón a la derecha -->
                    <div class="box-tools pull-right">
                      <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                          <i class="fa fa-plus-circle"></i> Agregar
                      </button>
                    </div>
              </div>
              <!-- /.box-header -->
              <!-- Centro -->
              <div class="panel-body table-responsive" id="listadoregistros">
                  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Número</th>
                      <th>Teléfono</th>
                      <th>Email</th>
                    </thead>
                    <tbody>                            
                    </tbody>
                    <tfoot>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Número</th>
                      <th>Teléfono</th>
                      <th>Email</th>
                    </tfoot>
                  </table>
              </div>
              <!-- Fin de tabla -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- Fin-Contenido -->
<?php
}
else
{
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
    text-align: right;
}

</style>
<script type="text/javascript" src="scripts/proveedor.js"></script>
<?php 
}
ob_end_flush();
?>
