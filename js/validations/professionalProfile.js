 import { 
    $form, $user, $name, $lastname, $center, $mail,
    $spanValidation, $spanValidation2, $spanValidation3,
    patternEmail, patternLetters, patternUser,
    arrayFormLoginProfessionalProfile,
    

  } from "./variables.js";
 
 
 //Evento de JS para el formulario antes del envio de los datos al servidos (PHP)
 $form.addEventListener("submit", e => {
    // prevenir el envio del formulario
    e.preventDefault();

    // Eliminar clases de error anteriores
    for (let i = 0; i < arrayFormLoginProfessionalProfile.length; i++) {
        arrayFormLoginProfessionalProfile[i].classList.remove("notValid");
        $inputGroupAll[i].classList.remove("notValid")
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
    let invalidFields = []

    // Valida el campo de usuario
    if ($user.value == "") {
        messageValidation += "No puede dejar el campo de usuario vacío <br>";
        error = true;
        count++;
        $user.classList.add("notValid")
        $inputGroupAll[5].classList.add("notValid")
    } else if (!(patternUser.exec($user.value))) {// Si no cumple con el patrón del usuario
        $user.classList.add("notValid")
        $inputGroupAll[5].classList.add("notValid")
        count++;
        if ($user.value.length < 6) {
            messageValidation2 += "Tu usuario debe tener entre 6 y 30 caracteres. <br>"
            error = true;
        } else {
            messageValidation2 += "No debe contener caracteres especiales. <br> "
            error = true;
        }
    }

    //valida el campo nombre
    if ($name.value == "") {
        messageValidation += "No puede dejar el campo de name vacío <br>";
        error = true;
        count++;
        $name.classList.add("notValid")
        $inputGroupAll[0].classList.add("notValid")
    } else if (!(patternLetters.exec($name.value))) {// Si no cumple con el patrón del nombre
        error = true;
        count++;
        $inputGroupAll[0].classList.add("notValid")
        $name.classList.add("notValid")
        invalidFields.push("nombre");
        console.info('invalido')
    }

    //Valida el campo apellido
    if ($lastname.value == "") {
        $inputGroupAll[1].classList.add("notValid")

        messageValidation += "No puede dejar el campo de apellido vacío <br>";
        error = true;
        count++;
        $lastname.classList.add("notValid")
    } else if (!(patternLetters.exec($lastname.value))) { // Si no cumple con el patrón del apellido
        error = true;
        count++;
        $inputGroupAll[1].classList.add("notValid")
        invalidFields.push("apellido");
        $lastname.classList.add("notValid")
    }
    //Valida el campo correo electronico
    if ($mail.value == "") {
        messageValidation += "No puede dejar el campo de correo electrónico vacío <br>";
        error = true;
        count++;
        $mail.classList.add("notValid")
        $inputGroupAll[2].classList.add("notValid")
    } else if (!(patternEmail.exec($mail.value))) { // Si no cumple con el patrón del correo electronico
        error = true;
        $inputGroupAll[2].classList.add("notValid")
        invalidFields.push("correo electronico");
        count++;
        $mail.classList.add("notValid")
    }
    //Valida el campo de centro educativo
    if ($center.value == "") {
        messageValidation += "No puede dejar el campo de centro vacío <br>";
        error = true;
        count++;
        $center.classList.add("notValid")
        $inputGroupAll[4].classList.add("notValid")
    } else if (!(patternLetters.exec($center.value))) { // Si no cumple con el patrón, para el campo "contro educativo"
        count++;
        $inputGroupAll[4].classList.add("notValid")
        error = true;
        invalidFields.push("centro")
        $center.classList.add("notValid")
    }
    // Maneja los mensajes de error y la clase "notValid" para los campos del formulario
    if (count == 5) {
        // Si todos los campos están vacíos
        arrayFormLoginProfessionalProfile.forEach(e => {
            e.classList.add("notValid"); // Agrega la clase "notValid" a todos los elementos del formulario
        });
        $spanValidation.innerHTML = "Complete todos los campos"; // Muestra mensaje indicando que todos los campos son obligatorios
    } else if (error) {
        // Si hay errores de validación
        if (count == 1) {
            // Si solo hay un campo vacío
            $spanValidation.innerHTML = "Complete el campo que falta <br>"; // Muestra mensaje indicando que falta un campo
        } else if (count > 1) {
            // Si hay varios campos con errores
            console.info(invalidFields); // Imprime en la consola la lista de campos inválidos (solo para debug)
            $spanValidation.innerHTML = "Complete los campos que faltan correctamente <br>"; // Muestra mensaje indicando que faltan campos
            $spanValidation2.innerHTML = messageValidation2; // Muestra los mensajes de error específicos (por ejemplo, usuario corto o correo electrónico inválido)

            // Muestra un mensaje detallado dependiendo de la cantidad de campos inválidos
            switch (invalidFields.length) {
                case 0:
                    $spanValidation3.innerHTML = ""; // No hay mensaje adicional
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
        } else {
            // Si hay errores pero no campos vacíos (no debería ocurrir)
            $spanValidation2.innerHTML = messageValidation2; // Muestra los mensajes de error específicos
        }
    }

    // Si no hay errores, envía el formulario
    if (!error) {
        $form.submit();
    }
})
