<?

$DB_HOST=$_ENV["DB_HOST"];
$DB_USER=$_ENV["DB_USER"];
$DB_PASSWORD=$_ENV["DB_PASSWORD"];
$DB_NAME=$_ENV["DB_NAME"];
$DB_PORT=$_ENV["DB_PORT"]; 
//Crear la conexion
$conn = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");

//Verificar si la conexion es exitosa

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error );
}


if ($result = $conn -> query("SELECT * FROM tbl_Registro")) {
  //echo "Returned rows are: " . $result -> num_rows;
  // Free result set
  $result -> free_result();
}

$numempleado=$_GET['usuarioid'];
$nombre=$_GET['nombreactividad'];
$categoria=$_GET['categoria'];
$hora=$_GET['hora'];
$diasemana=$_GET['diasemana'];
$repetitiva=$_GET['repetitiva'];
$lugar=$_GET['lugar'];
$esvirtual=$_GET['esvirtual'];
$usuarioalta=$_GET['usuarioalta'];
$date = date('Y-m-d H:i:s');
 

$sql="INSERT INTO tbl_Registro (UsuarioId, NombreActividad, 
Categoria, Hora, DiaSemana, Repetitiva, 
Lugar, EsVirtual, FechaAlta, UsuarioAlta) ".
"VALUES('$numempleado', '$nombre', '$categoria', '$hora', 
'$diasemana', '$repetitiva', '$lugar', '$esvirtual','$date','$usuarioalta');";
 

$resultado=$conn->query( $sql);
 
$conn -> close();
?>

 