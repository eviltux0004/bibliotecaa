<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $host = "fdb1029.awardspace.net"; 
    $usuario = "4794857_pruebadb"; 
    $password = "I'mtuxkart10"; 
    $base_datos = "4794857_pruebadb"; 
        
    $Conexion = mysqli_connect("fdb1029.awardspace.net", "4794857_pruebadb", "I'mtuxkart10", "4794857_pruebadb");
    if (!$Conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    // Limpiar variables para evitar inyecciones SQL básicas 
    $Titulo = $Conexion->real_escape_string($_POST['titulo']); 
    $Autor = $Conexion->real_escape_string($_POST['autor']); 
    $Isbn = $Conexion->real_escape_string($_POST['isbn']); 
    
    $Sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$Titulo', '$Autor', '$Isbn')"; 
    
    /**
     * Inserta un nuevo libro en la base de datos y redirige o muestra un error.
     *
     * @param mysqli $Conexion La conexión activa a la base de datos.
     * @param string $Sql La consulta SQL de inserción.
     * @return bool True si se insertó correctamente, false en caso contrario.
     */
    if ($Conexion->query($Sql) === TRUE) { 
        header("Location: index.php?success=1"); 
    } else { 
        echo "Error al guardar el libro: " . $Conexion->error; 
    } 
    
    $Conexion->close(); 
} 
?>