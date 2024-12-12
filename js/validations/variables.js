//Variables
export const $form = document.querySelector("form"); //Formulario
export const $spanValidation = document.querySelector(".validations > span");
export const $formUser = document.querySelector("[name='user']");
export const $formPassword = document.querySelector("[name='password']");
export const $inputGroupAll = document.querySelectorAll(".input-group-text");

//Arreglos
export let arrayFormLogin = [$formUser, $formPassword, ];

//Expresiones regulares
export let alphabeticalExpression = new RegExp(`^[A-Za-zÑñÁáÉéÍíÓóÚú]+(?: [A-Za-zÑñÁáÉéÍíÓóÚú]+)*$`);
