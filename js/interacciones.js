// Interacciones sencillas para explicar en clase.
// 1. Mostrar u ocultar un dato curioso al pulsar un botón.
const botonDato = document.getElementById('boton-dato');
const dato = document.getElementById('dato-curioso');
if (botonDato && dato) {
  botonDato.addEventListener('click', function () {
    const cerrado = dato.hasAttribute('hidden');
    if (cerrado) {
      dato.removeAttribute('hidden');
      botonDato.textContent = 'Ocultar dato';
      botonDato.setAttribute('aria-expanded', 'true');
    } else {
      dato.setAttribute('hidden', '');
      botonDato.textContent = 'Descubrir el dato';
      botonDato.setAttribute('aria-expanded', 'false');
    }
  });
}

// 2. Pequeña pregunta de repaso: se comprueba la respuesta sin recargar.
const botonesQuiz = document.querySelectorAll('[data-respuesta]');
const resultado = document.getElementById('resultado-quiz');
botonesQuiz.forEach(function (boton) {
  boton.addEventListener('click', function () {
    if (boton.dataset.respuesta === 'correcta') {
      resultado.textContent = '¡Correcto! La historia comienza en Pachacamilla, Lima.';
    } else {
      resultado.textContent = 'Casi. Vuelve a intentarlo: piensa en un barrio antiguo de Lima.';
    }
  });
});
