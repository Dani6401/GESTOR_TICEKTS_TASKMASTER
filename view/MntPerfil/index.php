<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["usu_id"])){ 
        require_once("../../models/Usuario.php");
        $usuario = new Usuario();

        $usu_id = $_SESSION["usu_id"]; // Obtener el usu_id de la sesión

        $datos_usuario = $usuario->get_usuario_perfil_x_id($usu_id);
        $output = array();
        foreach($datos_usuario as $row) {
            $output["usu_correo"] = $row["usu_correo"];
            $output["usu_pass"] = $row["usu_pass"];
        }
    echo json_encode($output);
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>PERFIL</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Perfil Usuario</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Perfil</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<h5 class="m-t-lg with-border">Informacion de Usuario</h5>
                
                <div class="row">
                    <form method="post" id="usuario_form" action="usuario.php">

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_nom">Nombres</label>
                                <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="<?php echo $_SESSION['usu_nom']; ?>" readonly>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_ape">Apellidos</label>
                                <input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="<?php echo $_SESSION['usu_ape']; ?>" readonly>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_correo">Correo Electronico</label>
                                <input type="text" class="form-control" id="usu_correo" name="usu_correo" placeholder="<?php echo $output["usu_correo"]; ?>" data-correo="<?php echo $output["usu_correo"]; ?>" readonly>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_nuevo_correo">Cambair Correo Electronico</label>
                                <input type="text" class="form-control" id="usu_nuevo_correo" name="usu_nuevo_correo" placeholder="Ingrese Su Correo Electronico Nuevo">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_pass">Contraseña</label>
                                <input type="text" class="form-control" id="usu_pass" name="usu_pass" placeholder="<?php echo $output["usu_pass"]; ?>" data-pass="<?php echo $output["usu_pass"]; ?>" readonly>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="usu_nuevo_pass">Cambiar Contraseña</label>
                                <input type="password" class="form-control" id="usu_nuevo_pass" name="usu_nuevo_pass" placeholder="Ingrese Su Contraseña Nueva">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                        <button type="button" id="btnactualizar" name="action" class="btn btn-rounded btn-inline btn-primary">Realizar Cambios</button>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="mntperfil.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>