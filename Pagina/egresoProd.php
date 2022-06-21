<?php
	$servidor="localhost";
	$bd = "CreaTecAlgabo";
	$user ="root";
	$pass = "";
	$conexion=mysqli_connect($servidor,$user,$pass,$bd);

	if ($conexion===false) {
		die("error de conexion".mysqli_connect_error());
	}

	require "vendor/autoload.php";

	$archivo = "sesion.txt";
	$sesion = fopen($archivo, "r");
	$idtarjeta = fread($sesion, filesize($archivo));

	$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
	$text = $qrcode->text();


	$sqli = "delete from Producto where codigo = ('".$text."')";
	$sqli1 = "insert into egreso (id_empleado, id_producto, fecha, hora) values ('".$idtarjeta."','".$text."',Curdate(),Curtime())";
	if(mysqli_query($conexion, $sqli))
	{
		mysqli_query($conexion,$sqli1);
		header('Location: egresoProd.html');
	}
	else
		echo "error al egresar el producto";

	fclose($sesion)

?>