<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['actual'])) { 
    $host = "fdb1029.awardspace.net"; 
    $usuario = "4794857_pruebadb"; 
    $password = "I'mtuxkart10"; 
    $base_datos = "4794857_pruebadb"; 
    
    $Conexion = mysqli_connect("fdb1029.awardspace.net", "4794857_pruebadb", "I'mtuxkart10", "4794857_pruebadb");
    if (!$Conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $Id = intval($_POST['id']); 
    $Estado_actual = intval($_POST['actual']); 
    
    // Si estaba disponible (1), ahora será prestado (0). Si estaba prestado (0), será disponible (1). 
    $Nuevo_estado = ($Estado_actual === 1) ? 0 : 1;
    
    $Sql = "UPDATE libros SET disponible = $Nuevo_estado WHERE id = $Id"; 
    
    /**
     * Ejecuta la consulta de actualización del estado del libro y redirige o muestra un error.
     *
     * @param mysqli $Conexion La conexión activa a la base de datos.
     * @param string $Sql La consulta SQL de actualización.
     * @return bool True si se actualizó correctamente, false en caso contrario.
     */
    if ($Conexion->query($Sql) === TRUE) { 
        header("Location: index.php?updated=1"); 
    } else { 
        echo "Error al actualizar el estado: " . $Conexion->error; 
    } 
    
    $Conexion->close(); 
} else { 
    header("Location: index.php"); 
} 
?>