<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.php");
}
else
{
require 'escritorio.php';

if ($_SESSION['consultav'] == 1)
{
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title text-end">Consulta de Ventas por Fecha y Cliente</h1>
          </div>
          <!-- /.box-header -->
          <!-- Centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <!-- Filtros -->
            <div class="row mb-3">
              <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="idcliente">Cliente</label>
                <div class="d-flex">
                  <select name="idcliente" id="idcliente" class="form-control selectpicker me-2" data-live-search="true" required></select>
                  <button class="btn btn-success" onclick="listar()">Mostrar</button>
                </div>
              </div>
            </div>

            <!-- Tabla -->
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Comprobante</th>
                <th>Número</th>
                <th>Total Venta</th>
                <th>Impuesto</th>
                <th>Estado</th>
              </thead>
              <tbody>                            
              </tbody>
              <tfoot>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Comprobante</th>
                <th>Número</th>
                <th>Total Venta</th>
                <th>Impuesto</th>
                <th>Estado</th>
              </tfoot>
            </table>
          </div>
          <!-- Fin Centro -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}
?>
<script type="text/javascript" src="scripts/ventasfechacliente.js"></script>
<?php 
}
ob_end_flush();
?>
