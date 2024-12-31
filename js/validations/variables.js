//Variables
export const $form = document.querySelector("form"); //Formulario
export const $spanValidation = document.querySelector(".validations > span");
export const $spanValidation2 = document.querySelector(".validations > .two");

export const $formUser = document.querySelector("[name='user']");
export const $formPassword = document.querySelector("[name='password']");
export const $inputGroupAll = document.querySelectorAll(".input-group-text");

//Obtener referencias a los elementos del formulario: Cambiar contraseña
export let $oldPassword = document.querySelector("[name = 'oldPassword']");
export let $newPassword = document.querySelector("[name='newPassword'");
export let $passwordAgain = document.querySelector("[name='passwordAgain']")

//Arreglos
export let arrayFormLogin = [$formUser, $formPassword, ];
export  let arrayFormChangesPassword = [$oldPassword, $newPassword, $passwordAgain];

//Expresiones regulares
export let alphabeticalExpression = new RegExp(`^[A-Za-zÑñÁáÉéÍíÓóÚú]+(?: [A-Za-zÑñÁáÉéÍíÓóÚú]+)*$`);
