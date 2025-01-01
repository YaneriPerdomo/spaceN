function validateBirthDate() {
    // Obtiene el elemento de entrada donde se introduce la fecha de nacimiento
    const birthDateInput = document.querySelector('[name="date"]');
  
    // Obtiene la fecha actual
    const currentDate = new Date();
  
    // Convierte la fecha de nacimiento ingresada por el usuario en un objeto Date
    const selectedBirthDate = new Date(birthDateInput.value);
  
    // Calcula la edad en años
    let age = currentDate.getFullYear() - selectedBirthDate.getFullYear();
  
    // Valida si la fecha de nacimiento es posterior a la fecha actual
    if (selectedBirthDate > currentDate) {
      alert('Por favor, seleccione una fecha válida.');
      birthDateInput.value = ''; // Limpia el campo de entrada
      return; // Detenemos la función aquí si la fecha no es válida
    }
  
    // Valida si la edad está dentro del rango permitido (7 a 12 años)
    if (age < 7 || age > 12) {
      alert("La edad del niño debe estar entre 7 y 12 años.");
      birthDateInput.value = ''; // Limpia el campo de entrada
      return; // Detenemos la función aquí si la edad no es válida
    }
}