document.addEventListener('DOMContentLoaded', () => { 
    const Form = document.getElementById('formLibro'); 
    
    // Validación interactiva antes de enviar los datos al servidor 
    /**
     * Valida los campos del formulario de libros antes de enviarlos.
     * 
     * @param {Event} E El evento de envío del formulario.
     * @param {string} Titulo El valor del campo título.
     * @param {string} Autor El valor del campo autor.
     * @param {string} Isbn El valor del campo ISBN.
     */
    Form.addEventListener('submit', (E) => { 
        const Titulo = document.getElementById('titulo').value.trim(); 
        const Autor = document.getElementById('autor').value.trim(); 
        const Isbn = document.getElementById('isbn').value.trim(); 
        
        if (Titulo === "" || Autor === "" || Isbn === "") { 
            E.preventDefault(); 
            alert('Por favor, rellena todos los campos antes de guardar.'); 
            return; 
        } 
        
        // Validación simple para que el formato ISBN no sea demasiado corto 
        if(Isbn.length < 10) { 
            E.preventDefault(); 
            alert('El campo ISBN parece demasiado corto o inválido.'); 
        } 
    }); 
    
    // Detectar si venimos de un registro exitoso mediante la URL 
    const UrlParams = new URLSearchParams(window.location.search); 
    if (UrlParams.get('success') === '1') { 
        window.history.replaceState({}, document.title, window.location.pathname); 
        alert('¡Libro registrado con éxito en el inventario!'); 
    } 
});