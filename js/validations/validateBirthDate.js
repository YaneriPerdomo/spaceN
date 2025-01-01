function validateBirthDate() {
    const birthDateInput = document.querySelector('[name="date"]');

    const currentDate = new Date();
    const selectedBirthDate = new Date(birthDateInput.value);

    let age = currentDate.getFullYear() - selectedBirthDate.getFullYear();

    if (selectedBirthDate > currentDate) {
        alert('Por favor, seleccione una fecha válida.');
        birthDateInput.value = '';
        return;
    }

    if (age < 7 || age > 12) {
        alert("La edad del niño debe estar entre 7 y 12 años.")
        birthDateInput.value = '';
        return;
    }
}