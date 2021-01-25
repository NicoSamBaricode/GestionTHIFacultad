<?php
  
  
$conexion = mysqli_connect("localhost", "root", "", "thi");

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    
    exit;
}




 
  // perform query
  // change the query to one relevant to your database
  
  
 
  // encode data to json format
  //echo json_encode($data);  

  // close connection
  
?>
<html>
<head>

  
</head>
<body>
  <div id="container">
  <table  >
		<tr>
			<td>Descripcion</td>
			<td>Estado</td>
			
		</tr>

		<?php 
		$sql="SELECT `column3`,`column8` FROM `wp_board`";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['column3'] ?></td>
			<td><?php echo $mostrar['column8'] ?></td>
			
		</tr>
	<?php 
    }
    mysqli_close($conexion)
	 ?>
	</table>
  </div>
  
</body>
</html>