	<?php
	$servidor="localhost";
	$bd = "CreaTecAlgabo";
	$user ="root";
	$pass = "";
	$conexion=mysqli_connect($servidor,$user,$pass,$bd);

	if ($conexion===false) {
		die("error de conexion".mysqli_connect_error());
	}
	$nombrecompleto = $_POST['nombre'].$_POST['apellido'];
	$sql = "insert into Empleado (dni,nombre, apellido, puesto, usuario, pass) values ('".$_POST['DNI']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['puesto']."','".$nombrecompleto."','".$nombrecompleto."123')";
	if(mysqli_query($conexion,$sql))
		header('Location: login.html');
	?>