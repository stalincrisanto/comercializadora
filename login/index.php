<?php

session_start();
if (isset($_SESSION['S_IDUSUARIO'])) {
	header('Location: ../vista/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Inciar Sesión | Test Visio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/fondo2.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<span class="login100-form-title p-b-49">
					Comercializadora
				</span>

				<div class="wrap-input100 validate-input m-b-23" data-validate="El nombre de usuario es requerido">
					<span class="label-input100">Usuario</span>
					<input class="input100" id="txt_usu" type="text" name="username" placeholder="Ingresar el nombre de usuario">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="La contraseña es requerida">
					<span class="label-input100">Contraseña</span>
					<input class="input100" id="txt_con" type="password" name="pass" placeholder="Ingresar la contraseña">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<div class="text-right p-t-8 p-b-31">
					<a href="#" onclick="AbrirModalRestablecer()">
						Olvidaste la contraseña?
					</a>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" onclick="VerificarUsuario();">
							Ingresar
						</button>
					</div>
				</div><br>

				<div class="flex-c-m">
					<p>
						Desarrollado por: Stalin Crisanto, Dany Lasso, Xavier Vaca
					</p>
				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<form autocomplete="FALSE" onsubmit="return false" action="">
		<div class="modal fade bd-example-modal-lg" id="modal_restablecer_contra" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header" style="text-align: left;">
						<h4 class="modal-title">Reestablecer contraseña</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="col-lg-12">
							<label for="">Ingrese el correo electrónico registrado del usuario para restablecer la contraseña</label>
							<input type="mail" class="form-control" id="txt_email" placeholder="Ingrese el correo electrónico">
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" onclick="RestablecerContra();"><i class="fa fa-check"></i>&nbsp;Enviar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../js/usuario.js?newversion"></script>

	<script src="vendor/sweetalert2/sweetalert.min.js"></script>
	<script src="vendor/sweetalert2/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

<script>
	txt_usu.focus();
</script>

</html>