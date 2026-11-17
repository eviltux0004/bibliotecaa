<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $host = "fdb1029.awardspace.net"; 
    $usuario = "4794857_pruebadb"; 
    $password = "Imtuxkart10"; 
    $base_datos = "4794857_pruebadb"; 
    
    $conexion = new mysqli($host, $usuario, $password, $base_datos); 
    if ($conexion->connect_error) { 
        die("Error de conexión: " . $conexion->connect_error); 
    } 
    
    // Limpiar variables para evitar inyecciones SQL básicas 
    $titulo = $conexion->real_escape_string($_POST['titulo']); 
    $autor = $conexion->real_escape_string($_POST['autor']); 
    $isbn = $conexion->real_escape_string($_POST['isbn']); 
    
    $sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$titulo', '$autor', '$isbn')"; 
    
    if ($conexion->query($sql) === TRUE) { 
        header("Location: index.php?success=1"); 
    } else { 
        echo "Error al guardar el libro: " . $conexion->error; 
    } 
    
    $conexion->close(); 
} 
?>