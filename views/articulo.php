<?php
// Activamos el almacenamiento en el buffer
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
    <div class="row justify-content-center"> <!-- Alineamos la fila al centro -->
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border d-flex justify-content-between align-items-center">
            <h1 class="box-title right-align text-primary">Artículo</h1> <!-- Color del título -->
            <div class="text-right">
              <button class="btn btn-success btn-sm" id="btnagregar" onclick="mostrarform(true)">
                <i class="fa fa-plus-circle"></i> <span class="text-white">Agregar</span> <!-- Color del texto del botón -->
              </button>
              <a target="_blank" href="../reportes/rptarticulos.php">
                <button class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i> <span class="text-white">Reporte</span></button>
              </a>
            </div>
          </div>

          <!-- /.box-header -->

          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th class="text-success">Opciones</th>
                  <th class="text-info">Nombre</th>
                  <th class="text-info">Categoría</th>
                  <th class="text-info">Código</th>
                  <th class="text-info">Stock</th>
                  <th class="text-info">Imagen</th>
                  <th class="text-info">Estado</th>
                </tr>
              </thead>
              <tbody>
                <!-- Contenido dinámico -->
              </tbody>
              <tfoot>
                <tr>
                  <th class="text-success">Opciones</th>
                  <th class="text-info">Nombre</th>
                  <th class="text-info">Categoría</th>
                  <th class="text-info">Código</th>
                  <th class="text-info">Stock</th>
                  <th class="text-info">Imagen</th>
                  <th class="text-info">Estado</th>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- Formulario de registros -->
          <div class="panel-body" id="formularioregistros">
            <form name="formulario" id="formulario" method="POST">
              <div class="row justify-content-center"> <!-- Alineamos la fila al centro -->

                <!-- Primera columna: 3 campos -->
                <div class="col-md-6 offset-md-3"> <!-- Empuja la columna hacia la izquierda en vez de derecha -->
                  <div class="form-group">
                    <label class="text-primary">Nombre(*):</label> <!-- Color de la etiqueta -->
                    <input type="hidden" name="idarticulo" id="idarticulo">
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                  </div>

                  <div class="form-group">
                    <label class="text-primary">Categoría(*):</label> <!-- Color de la etiqueta -->
                    <select id="idcategoria" name="idcategoria" class="form-control form-control-sm selectpicker" data-live-search="true" required></select>
                  </div>

                  <div class="form-group">
                    <label class="text-primary">Stock(*):</label> <!-- Color de la etiqueta -->
                    <input type="number" class="form-control form-control-sm" name="stock" id="stock" required>
                  </div>
                </div>

                <!-- Segunda columna: 3 campos -->
                <div class="col-md-6 offset-md-3"> <!-- Empuja la columna hacia la izquierda en vez de derecha -->
                  <div class="form-group">
                    <label class="text-primary">Descripción:</label> <!-- Color de la etiqueta -->
                    <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                  </div>

                  <div class="form-group">
                    <label class="text-primary">Imagen:</label> <!-- Color de la etiqueta -->
                    <input type="file" class="form-control form-control-sm" name="imagen" id="imagen">
                    <input type="hidden" name="imagenactual" id="imagenactual">
                    <img src="" width="150px" height="120px" id="imagenmuestra">
                  </div>

                  <div class="form-group">
                        <label class="text-primary">Código:</label> <!-- Color de la etiqueta -->
                        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código Barras">
                        <!-- Usamos la clase btn-lg para hacer el botón más grande -->
                        <button class="btn btn-secondary btn-sm mt-2" type="button" onclick="generarbarcode()">Generar</button>
                        <button class="btn btn-primary btn-sm mt-2" type="button" onclick="imprimir()">Imprimir</button>
                        <div id="print">
                            <svg id="barcode"></svg> <!-- Contenedor para el código de barras -->
                        </div>
                  </div>

                  </div>

                </div> <!-- Fin de la fila -->

              <!-- Botones Guardar y Cancelar -->
              <div class="form-group col-12 mt-3 text-right"> <!-- Alineamos los botones a la derecha -->
                <button class="btn btn-primary btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> <span class="text-white">Guardar</span></button>
                <button class="btn btn-danger btn-sm" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> <span class="text-white">Cancelar</span></button>
              </div>
            </form>
          </div>
          <!--Fin centro -->
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
.right-align {
  position: relative;
  top: 10%;
  left: 74%;
    
  }
  .btn-success{
    position: relative;
    right: 20%;

  }
  .btn-info{
    position: relative;
    right: 15%;

  }
  .form-control {
    font-size: 1rem; /* Tamaño de texto más grande */
    width: 112%; /* Asegura que ocupen todo el ancho disponible */
  }

  



</style>

<script type="text/javascript" src="scripts/articulo.js"></script>

<!-- Agregar JsBarcode -->


<?php 
}
ob_end_flush();
?>
