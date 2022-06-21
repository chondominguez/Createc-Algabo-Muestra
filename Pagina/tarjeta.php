	<?php
	$servidor="localhost";
	$bd = "CreaTecAlgabo";
	$user="root";
	$pass="";
	$conexion=mysqli_connect($servidor,$user,$pass,$bd);

	if ($conexion===false) {
		die("error de conexion".mysqli_connect_error());
	}
	$sql = "select * from Empleado where (id_tarjeta = '".$_POST['IdTarjeta']."')";
	$sqli1 ="insert into lecturasRFID (uid, idlector, fecha, hora) values ('".$_POST['IdTarjeta']."','".$_POST['IdLector']."',Curdate(),Curtime())";
	$sqli2 ="insert into accesoPersonal (uid, idmolinete, sentido, fecha, hora ) values ('".$_POST['IdTarjeta']."','".$_POST['IdMolinete']."','".$_POST['Sentido']."',Curdate(),Curtime())";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) == 1){
		mysqli_query($conexion,$sqli1);
		mysqli_query($conexion,$sqli2);
		header('Location: holas.html');
	}
	?>
