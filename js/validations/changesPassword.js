 import { $spanValidation2,
    $oldPassword, $newPassword, $passwordAgain, $inputGroupAll,
    $form, arrayFormChangesPassword
  } from "./variables.js";
 
    let $spanValidation = document.querySelector(".validations > .one");

 // Evento de envío del formulario
 $form.addEventListener("submit", e => {
     e.preventDefault();

     // Eliminar clases de error anteriores
     for (let i = 0; i < arrayFormChangesPassword.length; i++) {
         arrayFormChangesPassword[i].classList.remove("notValid");
         $inputGroupAll[i].classList.remove("notValid")
     }
     $spanValidation.innerHTML = "";
     $spanValidation2.innerHTML = "";

     let error = false;
     let messageValidation = "";
     let messageValidation2 = "";
     let count = 0;
     let newAgainNew = false;
     let oldNewPassword = false;


     // Validar contraseña antigua
     if ($oldPassword.value == "") {
         messageValidation += "Ingrese la contraseña actual. <br>";
         error = true;
         count++;
         $oldPassword.classList.add("notValid");
         $inputGroupAll[0].classList.add("notValid")
     }
     // Validar nueva contraseña
     if ($passwordAgain.value == "") {
         messageValidation += "Ingrese la nueva contraseña <br>";
         error = true;
         count++;
         $passwordAgain.classList.add("notValid");
         $inputGroupAll[1].classList.add("notValid")
     }

     // Validar confirmación de contraseña
     if ($newPassword.value == "") {
         messageValidation += "Confirme la nueva contraseña <br>";
         error = true;
         count++;
         $newPassword.classList.add("notValid");
         $inputGroupAll[2].classList.add("notValid")
     }

     // Validar que las contraseñas coincidan
     if ($oldPassword.value == $newPassword.value) {
         messageValidation2 += "La nueva contraseña no puede ser igual a la actual. <br>";
         error = true;
         $passwordAgain.classList.add("notValid");
         $newPassword.classList.add("notValid");
         oldNewPassword = true;
         $inputGroupAll[0].classList.add("notValid")
         $oldPassword.classList.add("notValid")
         $newPassword.classList.add("notValid")
         $inputGroupAll[1].classList.add("notValid")
     }

     // Validar que la nueva contraseña sea diferente a la antigua
     if ($newPassword.value != $passwordAgain.value) {
         messageValidation2 += "No coinciden las contraseñas <br>";
         error = true;
         $newPassword.classList.add("notValid");
         $passwordAgain.classList.add("notValid");
         newAgainNew = true;
         $inputGroupAll[1].classList.add("notValid")
         $newPassword.classList.add(".notValid");
         $passwordAgain.classList.add("notValid")
         $inputGroupAll[2].classList.add("notValid")
     }

     // Mostrar mensajes de error
     if (count == 3) {
         // Si hay tres campos vacíos, marcar todos los grupos de entrada como no válidos
         // y mostrar mensaje de error general
         $inputGroupAll.forEach(input => {
             input.classList.add("notValid");
         });
         $spanValidation.removeAttribute("style"); // Mostrar el mensaje de error
         $spanValidation.innerHTML = "Complete todos los campos";
     } else if (error) {
         // Si hay errores, mostrar mensajes de error específicos:
         if (count == 1) {
             // Si hay un campo vacío:
             if (oldNewPassword) {
                 // Si la contraseña antigua y nueva son iguales, mostrar mensaje específico
                 return $spanValidation.innerHTML = "Por su seguridad, no utilice la misma contraseña. <br>";
             } else if (newAgainNew) {
                 // Si las contraseñas nuevas no coinciden, mostrar mensaje específico
                 return $spanValidation.innerHTML = messageValidation2;
             }
             $spanValidation2.innerHTML = "Complete el campo que falta <br>"; // Mostrar mensaje de campo faltante
             $spanValidation.innerHTML = messageValidation2; // Mostrar mensaje de error específico
         } else if (count == 2) {
             // Si hay dos campos vacíos:
             if (oldNewPassword) {
                 // Si la contraseña antigua y nueva son iguales, mostrar mensaje específico
                 return $spanValidation.innerHTML = "Por su seguridad, no utilice la misma contraseña. <br>";
             } else if (newAgainNew) {
                 // Si las contraseñas nuevas no coinciden, mostrar mensaje específico
                 return $spanValidation.innerHTML = messageValidation2;
             }
             $spanValidation2.innerHTML = "Complete los campos que faltan <br>"; // Mostrar mensaje de campos faltantes
             $spanValidation.innerHTML = messageValidation2; // Mostrar mensaje de error específico
         } else {
             // Si hay errores pero no campos vacíos, mostrar mensaje de error específico
             $spanValidation.innerHTML = messageValidation2;
         }
     }

     //Si no hay algun error entonces se enviara los datos al servidor(PHP) pero mas que todo la contraseña nueva
     if (!error) {
         $form.submit();
     }
 });