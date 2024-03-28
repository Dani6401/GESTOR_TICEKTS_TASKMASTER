<?php
/* Conexion con Config Conexion.php con la sesion de la base de datos */
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
  <!DOCTYPE html>
  <html>
  <?php require_once("../MainHead/head.php"); ?> <!-- contenido del archivo Head en el archivo MainHead -->
  <title>DETALLE TICKET</title>
  </head>

  <body class="with-side-menu">

    <?php require_once("../MainHeader/header.php"); ?> <!-- contenido del archivo de header parte superior de la pagina en el archivo Header de la carpeta mainheader -->

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php"); ?> <!-- Barra de navegacion de la pagina en el archivo nav de la carpeta mainheader -->

    <!-- Contenido -->
    <div class="page-content">
      <div class="container-fluid">

        <header class="section-header">
          <div class="tbl">
            <div class="tbl-row">
              <div class="tbl-cell">
                <h3 id="lblnomidticket">Detalle Ticket</h3>
                <div id="lblestado"></div>
                <span class="label label-pill label-primary" id="lblnomusuario"></span>
                <span class="label label-pill label-default" id="lblfechcrea"></span>
                <ol class="breadcrumb breadcrumb-simple">
                  <li><a href="#">Home</a></li>
                  <li class="active">Detalle Ticket</li>
                </ol>
              </div>
            </div>
          </div>
        </header>

        <div class="box-typical box-typical-padding">
          <div class="row">

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="cat_nom">Categoria</label>
                  <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Titulo</label>
                  <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descripusu">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descripusu" name="tickd_descripusu" class="summernote" name="name"></textarea>
                  </div>

                </fieldset>
              </div>

          </div>
        </div>

        <section class="activity-line" id="lbldetalle">

        </section>

        <div class="box-typical box-typical-padding" id="pnldetalle">
          <p>
            Ingrese su duda o consulta
          </p>
          <div class="row">
              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descrip">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descrip" name="tickd_descrip" class="summernote" name="name"></textarea>
                  </div>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <button type="button" id="btnenviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                <button type="button" id="btncerrarticket" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
              </div>
          </div>
			  </div>

      </div>
    </div>
    <!-- Contenido -->

    <?php require_once("../MainJs/js.php"); ?> <!-- contenido de JS en el archivo de js.php en la carpeta de MainJS  -->

    <script type="text/javascript" src="detalleticket.js"></script>

  </body>

  </html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>