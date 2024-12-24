import { $spanValidation, $formUser, $formPassword, $inputGroupAll, arrayFormLogin, $form} 
from "./variables.js";

$spanValidation.style.display = "none";

$form.addEventListener("submit", (e) => {
    e.preventDefault();
    let formData = new FormData($form);
    formData.forEach(element => {
        console.info(element)
    });
    for (let i = 0; i < arrayFormLogin.length; i++) {
        arrayFormLogin[i].classList.remove("notValid");
        $inputGroupAll[i].classList.remove("notValid")
    }
    let error = false;
    let messageValidation = "";
    let count = 0;
    
    if ($formUser.value.length == 0) {
        messageValidation += "Ingrese su nombre de usuario  <br>";
        error = true;
        count++;
        $inputGroupAll[0].classList.add("notValid")
        $formUser.classList.add("notValid");
    }
   
    if ($formPassword.value.length == 0) {
        messageValidation += "Ingrese su contraseña  <br>";
        error = true;
        count++;
        $inputGroupAll[1].classList.add("notValid")
        $formPassword.classList.add("notValid");
    }
    if (count == 2) {
        error = true;
        $spanValidation.removeAttribute("style");
        $spanValidation.innerHTML = "Complete todos los campos";
    }else if (error == true) {
        $spanValidation.removeAttribute("style")
        $spanValidation.innerHTML = messageValidation;
    }else if(!error){
        $form.submit();
    }
});