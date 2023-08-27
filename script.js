document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que se envíe el formulario de forma predeterminada

    var formData = new FormData(event.target); // Obtener los datos del formulario
    fetch(event.target.action, {
        method: "POST",
        body: formData
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        console.log(data); // Manejar la respuesta del servidor

        // Ejemplo de cómo puedes redirigir al usuario a otra página después de un inicio de sesión exitoso
        if (data === "Login exitoso") {
            window.location.href = "dashboard.html"; // Cambia "dashboard.html" por la página de destino que desees
        }
    })
    .catch(function(error) {
        console.log("Error en la solicitud:", error); // Manejo de errores
    });
});
