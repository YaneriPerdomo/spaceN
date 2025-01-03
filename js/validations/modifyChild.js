import {
  $form,
  $password,
  $user,
  $name,
  $lastname,
  $passwordAgain,
  $inputGroupAll,
  $spanValidation,
  $spanValidation2,
  $spanValidation3,
  arrayFormMOdifyChild,
  patternLetters,
  patternUser,
} from "./variables.js";

$form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Eliminar clases de error anteriores

  $password.classList.remove("notValid");
  $passwordAgain.classList.remove("notValid");
  for (let i = 0; i < arrayFormMOdifyChild.length; i++) {
    arrayFormMOdifyChild[i].classList.remove("notValid");
  }

  for (let i = 0; i < $inputGroupAll.length; i++) {
    $inputGroupAll[i].classList.remove("notValid");
  }
  // Limpia los mensajes de error previos
  $spanValidation.innerHTML = "";
  $spanValidation2.innerHTML = "";
  $spanValidation3.innerHTML = "";

  // Inicializa variables para la validación
  let error = false;
  let messageValidation = "";
  let messageValidation2 = "";
  let count = 0;
  let invalidFields = [];
  let vacio = 0;
  let iguales = true;
  // Valida el campo de usuario

  if ($user.value == "") {
    messageValidation += "No puede dejar el campo de usuario vacío <br>";
    error = true;
    count++;
    vacio++;
    $user.classList.add("notValid");
    $inputGroupAll[3].classList.add("notValid");
    console.info("usuario mal");
  } else if (!patternUser.exec($user.value)) {
    // Si no cumple con el patrón del usuario
    $user.classList.add("notValid");
    $inputGroupAll[3].classList.add("notValid");
    count = count + 1;
    console.info("usuario dos");
    invalidFields.push("usuario");
    error = true;
  }

  //valida el campo nombre
  if ($name.value == "") {
    messageValidation += "No puede dejar el campo de name vacío <br>";
    error = true;
    count++;
    vacio++;
    $name.classList.add("notValid");
    $inputGroupAll[0].classList.add("notValid");
    console.info("name 2");
  } else if (!patternLetters.exec($name.value)) {
    // Si no cumple con el patrón del nombre
    error = true;

    $inputGroupAll[0].classList.add("notValid");
    $name.classList.add("notValid");
    invalidFields.push("nombre");
    console.info(invalidFields);
    console.info("invalido el nombre");
    count++;
  }

  //Valida el campo apellido
  if ($lastname.value == "") {
    $inputGroupAll[1].classList.add("notValid");
    vacio++;
    messageValidation += "No puede dejar el campo de apellido vacío <br>";
    error = true;
    count++;
    $lastname.classList.add("notValid");
  } else if (!patternLetters.exec($lastname.value)) {
    // Si no cumple con el patrón del apellido
    error = true;
    count = count + 1;

    $inputGroupAll[1].classList.add("notValid");
    invalidFields.push("apellido");
    $lastname.classList.add("notValid");
  }

  if ($password.value != $passwordAgain.value) {
    messageValidation += "No coinciden las contraseñas <br>";
    error = true;
    iguales = false;
    $passwordAgain.classList.add("notValid");
    $password.classList.add("notValid");
    $password.classList.add("notValid");
    $passwordAgain.classList.add("notValid");
    $inputGroupAll[5].classList.add("notValid");
    $inputGroupAll[6].classList.add("notValid");
  }

  console.info(count + " count");
  // Maneja los mensajes de error y la clase "notValid" para los campos del formulario
  if (count === 3 && vacio == 3) {
    // Si todos los campos están vacíos
    arrayFormMOdifyChild.forEach((e) => {
      e.classList.add("notValid"); // Agrega la clase "notValid" a todos los elementos del formulario
    });
    $spanValidation.innerHTML = "Complete todos los campos"; // Muestra mensaje indicando que todos los campos son obligatorios
  } else if (error) {
    // Si hay errores de validación
    if (count >= 2) {
      $spanValidation.innerHTML =
        "Complete los campos que faltan correctamente <br>";
    } else if (count == 1) {
      $spanValidation2.innerHTML = messageValidation2; // Muestra los mensajes de error específicos (por ejemplo, usuario corto o correo electrónico inválido)
      $spanValidation.innerHTML =
        "Complete el campo que falta correctamente<br>"; // Muestra mensaje indicando que falta un campo
    }

    // Muestra un mensaje detallado dependiendo de la cantidad de campos inválidos
    switch (invalidFields.length) {
      case 0:
        $spanValidation3.innerHTML = "";
        break;
      case 1:
        $spanValidation3.innerHTML = `El campo ${invalidFields[0]} introducido no es válido`; // Indica el primer campo inválido
        break;
      case 2:
        $spanValidation3.innerHTML = `Los campos ${invalidFields[0]} y ${invalidFields[1]} introducidos no son válidos`; // Indica los dos primeros campos inválidos
        break;
      case 3:
        $spanValidation3.innerHTML = `Los campos ${invalidFields[0]}, ${invalidFields[1]} y ${invalidFields[2]} introducidos no son válidos`; // Indica los tres primeros campos inválidos
        break;
      case 4:
        $spanValidation3.innerHTML = `Los campos ${invalidFields[0]}, ${invalidFields[1]}, ${invalidFields[2]} y ${invalidFields[3]} introducidos no son válidos`; // Indica los tres primeros campos inválidos
        break;
      default:
        break; // No hay mensaje específico para más de 3 campos inválidos
    }
    if (!iguales) {
      $spanValidation2.innerHTML = `${$spanValidation2.textContent} No coinciden las contraseñas <br>`;
    }
  } else {
    // Si hay errores pero no campos vacíos (no debería ocurrir)
    $spanValidation2.innerHTML = messageValidation2; // Muestra los mensajes de error específicos
  }

  // Si no hay errores, envía el formulario
  if (!error) {
    $form.submit();
  }
});
