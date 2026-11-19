#  SISTEMA DE CONTROL DE BIBLIOTECA
---
**ESTA PÁGINA ES UN SISTEMA WEB PARA EL CONTROL Y GESTIÓN DE UNA BIBLIOTECA**
---
~~HECHA POR: DAVID LORENZO VASQUEZ~~
---
_GESTIÓN DE INVENTARIO Y PRÉSTAMOS DE LIBROS_
[link de la pagina](http://biblioteca01.atwebpages.com/index.php)
correo: <davidvasquezlova@gmail.com>

![Sistema de Control de Biblioteca](https://media.istockphoto.com/id/854284070/es/foto/port%C3%A1til-con-biblioteca.jpg?s=612x612&w=0&k=20&c=MgZL9uMqYvBJoOCEqduQJBPT4Wftg9lNNxoIDQRRzqE=)

### Funcionalidades principales:
- Registro de nuevos libros (Título, Autor e ISBN)
- Visualización de inventario en tiempo real
- Cambio de estado automático entre **Disponible** y **Prestado**

### Flujo de uso del sistema:
1. Llenar el formulario de **Registrar Nuevo Libro** con los datos correspondientes.
2. Verificar que el libro aparezca listado en la tabla **Inventario de Libros** con estado *Disponible*.
3. Utilizar el botón de acción (**Prestar** / **Devolver**) para actualizar su disponibilidad en la base de datos.

> Esta aplicación web fue diseñada para administrar el catálogo de libros de forma sencilla utilizando PHP, MySQL, HTML5, CSS3 y JavaScript con validación en el cliente.

# Estructura del proyecto y comandos Git

* `index.php` — Interfaz principal con el formulario de registro y la tabla de inventario.
* `guardar.php` — Procesa la inserción de nuevos libros en la base de datos MySQL.
* `cambiarEstado.php` — Alterna el estado de disponibilidad del libro (`1` Disponible / `0` Prestado).
* `script.js` — Valida los campos del formulario y la longitud del ISBN antes del envío.
* `styles.css` — Hoja de estilos responsiva con diseño basado en tarjetas y tabla dinámica.
Codigos
---
18/11/2026
---
```bash
mal
let n = "Juan";
function p(a) {
return a >= 18;
}
Bien
let nombreUsuario = "Juan";
function esMayorDeEdad(edadUsuario) {
return edadUsuario >= 18;
}
