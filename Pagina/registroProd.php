<?php
	$servidor="localhost";
	$bd = "CreaTecAlgabo";
	$user ="root";
	$pass = "";
	$conexion=mysqli_connect($servidor,$user,$pass,$bd);

	if ($conexion===false) {
		die("error de conexion".mysqli_connect_error());
	}


	$archivo = "sesion.txt";
	$sesion = fopen($archivo, "r");
	$idtarjeta = fread($sesion, filesize($archivo));


	$sqli = "insert into MateriaPrima (id_empleado, proveedor, fecha, hora, nom_mat, cant) values ('".$idtarjeta."','".$_POST['proveedor']."',Curdate(),Curtime(),'".$_POST['producto']."','".$_POST['cantidad']."')";
	if(mysqli_query($conexion, $sqli))
		header('Location: registroProd.html');
	else
		echo "error al registrar el producto";

	fclose($sesion)
?>