<?php
$servidor="localhost";
$bd = "CreaTecAlgabo";
$user="root";
$pass="";
$conexion=mysqli_connect($servidor,$user,$pass,$bd);

if ($conexion===false) {
	die("error de conexion".mysqli_connect_error());
}
$sql = "select * from Empleado where ((usuario = '".$_POST['user']."') and (pass = '".$_POST['pass']."'))";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) == 1){
	$fila = mysqli_fetch_array($resultado);

	$sesion = fopen("sesion.txt", "w");
	fwrite($sesion, $fila['id_tarjeta']);

	if($fila['puesto'] == 'OPERARIO DEPOSITO')
	{
		header('Location: registroProd.html');
	}
	else if($fila['puesto'] == 'OPERARIO PRODUCCION')
	{
		header('Location: egresoProd.html');
	}
	else
		header('Location: hola.html');
	
	fclose($sesion);
}
else{
	header('Location: adios.html');
}
?>
