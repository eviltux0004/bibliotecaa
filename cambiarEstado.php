<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['actual'])) { 
    $host = "fdb1029.awardspace.net"; 
    $usuario = "4794857_pruebadb"; 
    $password = "Imtuxkart10"; 
    $base_datos = "4794857_pruebadb"; 
    
    $conexion = new mysqli($host, $usuario, $password, $base_datos); 
    if ($conexion->connect_error) { 
        die("Error de conexión: " . $conexion->connect_error); 
    } 
    
    $id = intval($_POST['id']); 
    $estado_actual = intval($_POST['actual']); 
    
    // Si estaba disponible (1), ahora será prestado (0). Si estaba prestado (0), será disponible (1). 
    $nuevo_estado = ($estado_actual === 1) ? 0 : 1;
    
    $sql = "UPDATE libros SET disponible = $nuevo_estado WHERE id = $id"; 
    
    if ($conexion->query($sql) === TRUE) { 
        header("Location: index.php?updated=1"); 
    } else { 
        echo "Error al actualizar el estado: " . $conexion->error; 
    } 
    
    $conexion->close(); 
} else { 
    header("Location: index.php"); 
} 
?>