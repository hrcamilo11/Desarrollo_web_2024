export function adjustFormIframe() {
  const iframe = document.querySelector(".form-container iframe");
  const iframeWidth = window.innerWidth <= 768 ? 300 : 680;
  const iframeHeight = window.innerWidth <= 768 ? 690 : 690;

  iframe.width = iframeWidth;
  iframe.height = iframeHeight;
}


export function visualizeForm() {

    const form = document.getElementById('contactForm');

    form.addEventListener('submit', (event) => {
      event.preventDefault(); // Evita el envío del formulario por defecto

      const nombre = document.getElementById('nombre').value;
      const email = document.getElementById('email').value;
      const telefono = document.getElementById('telefono').value;

      // Validaciones
      let isValid = true;

      // Nombre: Debe tener al menos 3 caracteres
      if (nombre.trim() === '' || nombre.length < 3) {
        alert('Por favor, ingresa un nombre válido.');
        isValid = false;
      }

      // Email: Debe tener un formato válido
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un correo electrónico válido.');
        isValid = false;
      }

      // Teléfono: Puede ser opcional, pero si se ingresa debe ser numérico
      if (telefono !== '' && isNaN(telefono)) {
        alert('El número de teléfono debe ser numérico.');
        isValid = false;
      }

      // Si todas las validaciones son correctas, enviar el formulario
      if (isValid) {
        // Aquí puedes enviar el formulario al servidor
        // ... (código para enviar los datos al servidor)
        console.log('Formulario enviado correctamente');
      }
    });

    document.getElementById('contactForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Evita el envío por defecto del formulario

      // Aquí puedes agregar tus validaciones

      // Enviar el formulario utilizando fetch o XMLHttpRequest
      fetch('enviar.php', {
        method: 'POST',
        body: new FormData(this)
      })
          .then(response => {
            if (!response.ok) {
              throw new Error('Error al enviar el formulario');
            }
            return response.text();
          })
          .then(data => {
            // Redirigir a la página de confirmación
            window.location.href = 'confirmacion.html';
          })
          .catch(error => {
            console.error('Error:', error);
            // Mostrar un mensaje de error al usuario
          });
    });

}


