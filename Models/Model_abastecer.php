<?php 
	$mysqli = new mysqli("localhost", "root", "", "high_pro_hardware");

	/* verificar la conexión */
	if ($mysqli->connect_errno) {
	    printf("Conexión fallida: %s\n", $mysqli->connect_error);
	    exit();
	}

    $id= $_POST['ID_inv']; // id inventario
    $id_pr= $_POST['ID_pr']; // id producto
    $fecha = $_POST['Fecha']; // fecha
    $v1= $_POST['Stock']; // stock actual
    $v2= $_POST['C_abas']; // cantidad a agregar al stock
    
    $suma= $v1 + $v2; 

    $precio_c= $_POST['Precio']; // precio unitario actual
    

    $desc= $_POST['Descu']; // descuento
    $idorden = $_POST['IDto']; // orden id detalle 
    $n_precio = $_POST['Precio_n']; // precio unitario nuevo
    

    $operacion1 = $v2*$Precio_n;
    
    $operacion2 = $operacion1*$Desc;
    
    $operacion3 = $operacion1-$Operacion2;

	
		$query1 = "UPDATE productos SET precio_compra = '$Precio_n' WHERE ID_producto = '$ID_pr'";

		$result1 = $mysqli->query($query1) or die ("Error al consultar datos".mysqli_error($mysqli));


		$query2 = "UPDATE inventario_prod SET Stock_up = '$suma' WHERE ID_i_p = '$ID'";

		$result2 = $mysqli->query($query2) or die ("Error al consultar datos".mysqli_error($mysqli));



		$query3 = "INSERT INTO detalle_dorden_abastecimiento(ID_detalle_ab, ID_producto, Precio_unitario, Cantidad, Descuento, Total, Fecha_c) 
		   VALUES  ('$Idorden','$ID_pr', '$Precio_n','$V2', '$Desc', '$Operacion3', '$Fecha')";
		
		$result3 = $mysqli->query($query3) or die ("Error al consultar datos".mysqli_error($mysqli));

		if ($result1 and $result2 and $result3) 
		{
			echo "<script>
		  	 		 	alert('Producto Abastecido');
		    			window.location= '../Templates/Modulos/Reabastecer.php'
		    	</script>";
			return true;

		} 
		else 
		{
			echo "<script>
		  	 		 	alert('Error al Abastecer Producto');
		    			window.location= '../Templates/Modulos/Reabastecer.php'
		    	</script>";
			return false;
		}
	
  $mysqli->close();
?>