<?php 
// Conexión a la base de datos en AwardSpace
$host = "fdb1029.awardspace.net"; 
$usuario = "4794857_pruebadb"; 
$password = "I'mtuxkart10"; 
$base_datos = "4794857_pruebadb";

$Conexion = mysqli_connect("fdb1029.awardspace.net", "4794857_pruebadb", "I'mtuxkart10", "4794857_pruebadb");
if (!$Conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

/**
 * Obtiene los libros existentes en orden descendente por ID.
 *
 * @param mysqli $Conexion La conexión activa a la base de datos.
 * @return mysqli_result El conjunto de resultados con los libros de la base de datos.
 */
$Resultado = $Conexion->query("SELECT * FROM libros ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Biblioteca</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Control de Biblioteca</h1>
    </header>
    <main class="container">
        <!-- Formulario para agregar libros -->
        <section class="card">
            <h2>Registrar Nuevo Libro</h2>
            
            <?php
            /**
             * Formulario para registrar un nuevo libro en el sistema.
             *
             * @param string $Titulo El título del libro a registrar.
             * @param string $Autor El autor del libro.
             * @param string $Isbn El código ISBN único del libro.
             */
            ?>
            <form id="formLibro" action="guardar.php" method="POST">
                <div class="form-group">
                    <label for="titulo">Título del Libro:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" id="isbn" name="isbn" required>
                </div>
                <button type="submit" class="btn">Guardar Libro</button>
            </form>
        </section>
       
        <!-- Tabla de libros en la Base de Datos -->
        <section class="card table-container">
            <h2>Inventario de Libros</h2>
            <table id="tablaLibros">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($Resultado && $Resultado->num_rows > 0): ?>
                        <?php while($Fila = $Resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $Fila['id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($Fila['titulo']); ?></strong></td>
                                <td><?php echo htmlspecialchars($Fila['autor']); ?></td>
                                <td><?php echo htmlspecialchars($Fila['isbn']); ?></td>
                                <td>
                                    <span class="badge <?php echo $Fila['disponible'] ? 'dispo' : 'prestado'; ?>">
                                        <?php echo $Fila['disponible'] ? 'Disponible' : 'Prestado'; ?>
                                    </span>
                                </td>
                                <td>
                                    <!-- Formulario para cambiar el estado (Prestar / Devolver) -->
                                    <form action="cambiarEstado.php" method="POST" style="margin:0;">
                                        <input type="hidden" name="id" value="<?php echo $Fila['id']; ?>">
                                        <input type="hidden" name="actual" value="<?php echo $Fila['disponible']; ?>">
                                        <button type="submit" class="btn-action <?php echo $Fila['disponible'] ? 'btn-prestar' : 'btn-devolver'; ?>">
                                            <?php echo $Fila['disponible'] ? 'Prestar' : 'Devolver'; ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">No hay libros registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
<?php $Conexion->close(); ?>