export let $gem = document.querySelector(".gem > div > span")
export let $time = document.querySelector(".time > div > span");
export let $wrongSelection = 0;
export let $containerPlayer = document.querySelector(".containerPlayer");
export let $containerResultsLesson = document.querySelector(".containerResultsLesson")
export let $contentResultsLesson = document.querySelector(".containerResultsLesson > .content")
export let $ButtonsNum = document.querySelectorAll(".ButtonsNum > button");
export let acceptedPoints = 0;
export const searchParams = new URLSearchParams(window.location.search);
export let failed = 0;
export let $strongFromOneToThree = document.querySelector(".FromOneToThree > strong > h2");
export let $FromOneToThree = document.querySelector(".FromOneToThree")
export let $endOfLessonMp3 = document.querySelector(".endOfLessonMp3");
export let $incorrectMp3 = document.querySelector(".incorrectMp3");
export let randomNumber = 0;
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

export let count = 0;

export let timer;
export let seconds = 0,
    minutes = 0,
    hours = 0;

    export const urlParams = new URLSearchParams(window.location.search);
    export const id = urlParams.get('statu');



    export function FromOneToThree() {
    $FromOneToThree.removeAttribute("style")
    let count = 3;
    $strongFromOneToThree.innerHTML = 3;
    voiceExercise(3);
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

 
export function updateDisplay() {
    document.getElementById('time').innerText =
        (hours < 10 ? '0' : '') + hours + ':' +
        (minutes < 10 ? '0' : '') + minutes + ':' +
        (seconds < 10 ? '0' : '') + seconds;
}

export function start() {
    if (!timer) {
        timer = setInterval(() => {
            seconds++;
            if (seconds == 60) {
                seconds = 0;
                minutes++;
                if (minutes == 60) {
                    minutes = 0;
                    hours++;
                }
            }
            updateDisplay();
        }, 1000);
    }
}


