export let $gem = document.querySelector(".gem > div > span")
export let $time = document.querySelector(".time > div > span");
export let $wrongSelection = 0;
export let $containerPlayer = document.querySelector(".containerPlayer");
export let $containerResultsLesson = document.querySelector(".containerResultsLesson")
export let $contentResultsLesson = document.querySelector(".containerResultsLesson > .content")
export let $ButtonsNum = document.querySelectorAll(".ButtonsNum > button");
export const searchParams = new URLSearchParams(window.location.search);
export let $strongFromOneToThree = document.querySelector(".FromOneToThree > strong > h2");
export let $FromOneToThree = document.querySelector(".FromOneToThree")
export let $endOfLessonMp3 = document.querySelector(".endOfLessonMp3");
export let $incorrectMp3 = document.querySelector(".incorrectMp3");
export let $correctMp3 = document.querySelector(".correctMp3");
export let $beginMp3 =document.querySelector(".beginMp3");

//Ventana modal resultado 
export let $gemsResult = document.querySelector(".gemsResult > div > span");
export let $porcentageResult = document.querySelector(".porcentageResult > div > span");
export let $timeResult = document.querySelector(".timeResult > div > span");
export let $messageResult = document.querySelector(".messageResult")

export let $modalWindowBack = document.querySelector(".modalWindowBack");
export let $containerBack = document.querySelector(".containerBack");
export let $backContent = document.querySelector(".containerBack > .content")
export let $body = document.querySelector("body");
export let $buttonOpenModalGuide = document.querySelector(".OpenModalGuide")
export let $containerGuideModal = document.querySelector(".containerGuide")
export let $begin = document.querySelector(".begin");
export let $GuidaContent = document.querySelector(".containerGuide > .content")
export let $containerPlay = document.querySelector(".containerPlay");
export let $clickMp3 =document.querySelector(".clickMp3");
export let $resultUser = document.querySelector(".resultUser")
export let  $showNumberStrong = document.querySelector(".showNumber > strong");
export let $showNumber = document.querySelector(".showNumber");
    
export let $showNumberSpan = document.querySelectorAll(".showNumber > strong > span");
export let $showNumberSpan02 = document.querySelectorAll(".cuadroAzul > strong > span");
export let $squareBlue = document.querySelector(".cuadroAzul > strong ");
export let $staqueBlue = document.querySelector(".cuadroAzul");
let timer;
 let seconds = 0,
    minutes = 0,
    hours = 0;

    export const urlParams = new URLSearchParams(window.location.search);
    export const id = urlParams.get('statu');



    export function FromOneToThree() {
    $FromOneToThree.removeAttribute("style")
    let count = 3;
    $strongFromOneToThree.innerHTML = 3;
    let countdown = setInterval(() => {
        count--;
        $strongFromOneToThree.textContent = count;
        if (count === 0) {
            clearInterval(countdown);
        } setTimeout(() => {
            $FromOneToThree.style.display = "none";
        }, 3000);
    }, 1000);
}


export function voiceExercise(voz) {
    let text = voz;
    const speak = (text) =>
        speechSynthesis.speak(new SpeechSynthesisUtterance(text));
    return speak(text);
}


//Pre numerico
//Leccion 3
export function defineNumber01(similar01, similar02, mainNumber, c) {
    let contador = 0;
    let numeroR = [];
    $containerPlayer.setAttribute("data-num", mainNumber)
    for (let i = 0; i < $ButtonsNum.length; i++) {
        numeroR.push(Math.trunc(Math.random() * 4))
    }

    for (let i = 0; i < $ButtonsNum.length; i++) {
        contador += 1;
        if (c === contador) {
            $ButtonsNum[i].innerHTML = `${mainNumber}`;
            continue;
        } else if (numeroR[i] % 2 == 0) {
            $ButtonsNum[i].innerHTML = `${similar01}`;
        } else {
            $ButtonsNum[i].innerHTML = `${similar02}`;
        }
    }
    let use = false
    for (let i = 0; i < $ButtonsNum.length; i++) {
        if ($ButtonsNum[i].textContent == $containerPlayer.getAttribute("data-num") || $ButtonsNum[i] == "") {
            use = true
            break;
        } else {
            use = false
        }
    }
    if (use === false) {
        $ButtonsNum[0].innerHTML = mainNumber;
    }
    return true;
}
 
export let $showObjects = document.querySelector(".showObjects > strong");
export function quantityAssociation(array, mainNumber, Objects){

    $containerPlayer.setAttribute("data-num", mainNumber)
    
    $showObjects.innerHTML = Objects;

    for(let i = 0; i < $ButtonsNum.length; i++){
        $ButtonsNum[i].innerHTML = array[i]
    }
    

}  

export function identifyQuantities(array, mainNumber){

    $containerPlayer.setAttribute("data-num", mainNumber)

    $showNumberSpan[0].innerHTML = array[1];
    $showNumberSpan[1].innerHTML = "__"
    $showNumberSpan[2].innerHTML = array[0];
    console.info(array)
}
export async function checkNumber(operation, correctAnswers, one, two, there){
    $showNumberStrong.innerHTML = operation;
    let c = 0;
    await $ButtonsNum.forEach(element => {
        c++
        element.removeAttribute("data-res");
        if(c == correctAnswers){
            element.setAttribute("data-res", "true")
        }
    });

    $ButtonsNum[0].innerHTML = one;
    $ButtonsNum[1].innerHTML = two;
    $ButtonsNum[2].innerHTML = there;

  
}

export function hiddenKeyNumber(similar01, similar02, mainNumber, c){
    let contador = 0;
    let numeroR = [];
    $containerPlayer.setAttribute("data-num", mainNumber)
    $showNumberStrong.innerHTML = mainNumber;
    $showNumber.classList.add("correctShownNumber");
    $ButtonsNum.forEach(el => {
        el.innerHTML = "?";
        el.disabled = true;
    })
   setTimeout(() => {
    for (let i = 0; i < $ButtonsNum.length; i++) {
        numeroR.push(Math.trunc(Math.random() * 4))
    }
    $showNumber.classList.remove("correctShownNumber");
    $showNumberStrong.innerHTML = "?";
    for (let i = 0; i < $ButtonsNum.length; i++) {
        contador += 1;
        $ButtonsNum[i].removeAttribute("disabled");
        if (c === contador) {
            $ButtonsNum[i].innerHTML = `${mainNumber}`;
            continue;
        } else if (numeroR[i] % 2 == 0) {
            $ButtonsNum[i].innerHTML = `${similar01}`;
        } else {
            $ButtonsNum[i].innerHTML = `${similar02}`;
        }
    }
    let use = false
    for (let i = 0; i < $ButtonsNum.length; i++) {
        if ($ButtonsNum[i].textContent == $containerPlayer.getAttribute("data-num") || $ButtonsNum[i] == "") {
            use = true
            break;
        } else {
            use = false
        }
    }
    if (use === false) {
        $ButtonsNum[0].innerHTML = mainNumber;
    }
    return true;
   }, 3000);
}



export function MoreLessElements(moreLess, dataSelection){
    let count = 0

    $ButtonsNum.forEach(el => {
        el.removeAttribute("data-selection")
        el.removeAttribute("class")
    })

    for(let i = 0;i < $ButtonsNum.length; i++){
        count++
        $ButtonsNum[i].innerHTML = moreLess[i]
        if(count == dataSelection){
            $ButtonsNum[i].setAttribute("data-selection", true);
            continue;
        }
        $ButtonsNum[i].setAttribute("data-selection", false)
    }

}

export function subtractionAddition(array,numbers, mainNumber){
    $containerPlayer.setAttribute("data-num", mainNumber)

    for(let i = 0; i < $ButtonsNum.length; i++){
        $ButtonsNum[i].innerHTML = numbers[i];
    }

    $showNumberSpan02[0].innerHTML = array[0];
    $showNumberSpan02[1].innerHTML = array[1];
    $showNumberSpan02[2].innerHTML = array[2];
    $showNumberSpan02[3].innerHTML = "=";
    $showNumberSpan02[4].innerHTML = "__";
}
export let $operationsImg = document.querySelector(".operations > strong > span > img");

export function simpleProblem(question, icon, numbers, answer){
    $containerPlayer.setAttribute("data-num", answer)

    for(let i = 0; i < $ButtonsNum.length; i++){
        $ButtonsNum[i].innerHTML = numbers[i];
    }
    
    $showNumberSpan02[0].innerHTML = question;
    $showNumberSpan02[1].innerHTML = icon;
}
export let  $selects = document.querySelectorAll("select")
export function countUp(answers, html , begin){
    let c = 0

   for(let i = 0; i < $selects.length; i++){
        c++;
        if(c == 1){
            $selects[i].disabled = true;
            $selects[i].innerHTML = `<option value="">${begin}</option>`;
            continue;
        }
        $selects[i].removeAttribute("class");
        $selects[i].removeAttribute("disabled");
        $selects[i].setAttribute("data-answer", answers[i])  
        $selects[i].innerHTML = html;
    }
}
export let $ButtonsNumMain = document.querySelector(".ButtonsNum2");
export let $ButtonsNum2 = document.querySelectorAll(".ButtonsNum2 > button");
export function advancedOperations1(operation, array, answer, part = 1){
    $containerPlayer.setAttribute('data-num', answer)
    if(part == 1){
        $showNumberSpan[0].innerHTML = operation;
        $showNumberSpan[1].innerHTML = "__";
        for(let i = 0; i < $ButtonsNum.length; i++){
                $ButtonsNum[i].innerHTML = array[i]
        }
    }else{
        $showNumberSpan[0].innerHTML = operation;
        $showNumberSpan[1].style.display = "none";
        for(let i = 0; i < $ButtonsNum2.length; i++){
            $ButtonsNum2[i].innerHTML = array[i]
        }
    }
   

}

export let $imgFractions = document.querySelectorAll(".ButtonsNum > button > img");
export let $imgFractionsMain = document.querySelectorAll(".imgFractionsMain");

export function fractions(imgFractions, imgFractionsMain, answer){
    let count01 = 0;
    $imgFractionsMain.src = imgFractionsMain;
    for(let i = 0; $imgFractions.length; i++){
        count01++;
        $imgFractions[i].src = imgFractions[i];
        if(count01 == answer){
            $imgFractions[i].setAttribute("data-answer", true )   ;
            continue         
        }
        $imgFractions[i].setAttribute("data-answer", false)
    }
}
 