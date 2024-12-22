import {
    $gem, $time, $containerPlay, $containerResultsLesson,
    $contentResultsLesson, $ButtonsNum, searchParams, $endOfLessonMp3,
    $incorrectMp3, $correctMp3, $beginMp3, $gemsResult, $porcentageResult, $timeResult, $messageResult, $containerBack, $backContent,
    $containerGuideModal, $begin, $GuidaContent, $containerPlayer, $clickMp3, FromOneToThree,
    voiceExercise, identifyQuantities,
    $squareBlue,
    $showNumberSpan,
    subtractionAddition,
    $showNumberSpan02,
    $resultUser,
} from "../../../helpers/lessons.js";

let count = 0;
let randomNumber = 0;
let acceptedPoints = 0;
let failed = 0;



let timer;
let seconds = 0,
    minutes = 0,
    hours = 0;




document.addEventListener("mousemove", (e) => {
    if (e.target.matches(".ButtonsNum > button")) {
        $clickMp3.play()
    }
})

setTimeout(() => {
    $begin.removeChild($begin.children[7]);
}, 2000);

function randomNumber10() {
    let randomNumber10 = Math.floor(Math.random() * 10);
    console.info(randomNumber10)
    switch ($containerPlayer.getAttribute("data-moreLess")) {
        case '+':
            switch (randomNumber10) {
                case 0:
                    let $numbers = [5, 2, 1];
                    let $operation = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "+",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation, $numbers, 1)
                    break;
                case 1:
                    let $numbers1 = [3, 2, 9];
                    let $operation1 = ['<i class="bi bi-airplane-engines"></i>',
                        "+",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation1, $numbers1, 3)
                    break;
                case 2:
                    let $numbers2 = [3, 6, 9];
                    let $operation2 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "+",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation2, $numbers2, 6)
                    break;
                case 3:
                    let $numbers3 = [1, 5, 2];
                    let $operation3 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "+",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation3, $numbers3, 5)
                    break;
                case 4:
                    let $numbers4 = [1, 3, 2];
                    let $operation4 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "+",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation4, $numbers4, 3)
                    break;
                case 5:
                    let $numbers5 = [1, 2, 3];
                    let $operation5 = ['<i class="bi bi-airplane-engines"></i> ',
                        "+",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation5, $numbers5, 2)
                    break;
                case 6:
                    let $numbers6 = [1, 2, 7];
                    let $operation6 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> ',
                        "+",
                        '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>'];
                    subtractionAddition($operation6, $numbers6, 7)
                    break;
                case 7:
                    let $numbers7 = [4, 7, 3];
                    let $operation7 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> ',
                        "+",
                        '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>  '];
                    subtractionAddition($operation7, $numbers7, 4)
                    break;
                case 8:
                    let $numbers8 = [4, 83, 3];
                    let $operation8 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> ',
                        "+",
                        '<i class="bi bi-balloon"></i> '];
                    subtractionAddition($operation8, $numbers8, 3)
                    break;
                case 9:
                    let $numbers9 = [33, 23, 3];
                    let $operation9 = ['<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> ',
                        "+",
                        '<i class="bi bi-brightness-high"></i>'];
                    subtractionAddition($operation9, $numbers9, 3)
                    break;
                case 10:
                    let $numbers10 = [88, 3, 8];
                    let $operation10 = ['<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i>',
                        "+",
                        '<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i>'];
                    subtractionAddition($operation10, $numbers10, 8)
                    break;
                default:
                    break;
            }
            break;
        case '-':
            switch (randomNumber10) {
                case 0:
                    let $numbers = [1, 2, 4];
                    let $operation = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "-",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation, $numbers, 1)
                    break;
                case 1:
                    let $numbers1 = [3, 1, 11];
                    let $operation1 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "-",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation1, $numbers1, 1)
                    break;
                case 2:
                    let $numbers2 = [2, 44, 4];
                    let $operation2 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "-",
                        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation2, $numbers2, 2)
                    break;
                case 3:
                    let $numbers3 = [33, 333, 3];
                    let $operation3 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "-",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation3, $numbers3, 3)
                    break;
                case 4:
                    let $numbers4 = [1, 5, 2];
                    let $operation4 = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                        "-",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation4, $numbers4, 1)
                    break;
                case 5:
                    let $numbers5 = [1, 2, 0];
                    let $operation5 = ['<i class="bi bi-airplane-engines"></i> ',
                        "-",
                        ' <i class="bi bi-airplane-engines"></i>'];
                    subtractionAddition($operation5, $numbers5, 0)
                    break;
                case 6:
                    let $numbers6 = [1, 2, 3];
                    let $operation6 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> </i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>',
                        "-", '<i class="bi bi-balloon"></i> <i class="bi bi-balloon">'];
                    subtractionAddition($operation6, $numbers6, 3)
                    break;
                case 7:
                    let $numbers7 = [10, 7, 0];
                    let $operation7 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> ',
                        "-",
                        '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>  '];
                    subtractionAddition($operation7, $numbers7, 0)
                    break;
                case 8:
                    let $numbers8 = [4, 2, 1];
                    let $operation8 = ['<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> ',
                        "-",
                        '<i class="bi bi-balloon"></i> '];
                    subtractionAddition($operation8, $numbers8, 1)
                    break;
                case 9:
                    let $numbers9 = [2, 1, 2];
                    let $operation9 = ['<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> ',
                        "-",
                        '<i class="bi bi-brightness-high"></i>'];
                    subtractionAddition($operation9, $numbers9, 1)
                    break;
                case 10:
                    let $numbers10 = [88, 0, 10];
                    let $operation10 = ['<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i>',
                        "-",
                        '<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i>'];
                    subtractionAddition($operation10, $numbers10, 0)
                    break;
                default:
                    break;
            }
            break
        default:
            break;
    }
}

document.addEventListener("click", async e => {

    if (e.target.matches(".ButtonsNum > button")) {
        count++;
        if (e.target.textContent == $containerPlayer.getAttribute("data-num")) {
            acceptedPoints++;
            console.info(e.target.textContent)
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
            e.target.classList.add("correct");
            $ButtonsNum.forEach(element => {
                element.disabled = true;
            });
            $squareBlue.classList.add("correctShownNumber");
            $showNumberSpan02[4].innerHTML = e.target.textContent;
            setTimeout(() => {
                $ButtonsNum.forEach(element => {
                    element.removeAttribute("disabled")
                });
                $showNumberSpan.forEach(el => {
                    el.innerHTML = "?";
                })
                $squareBlue.classList.remove("correctShownNumber")
                randomNumber10();
                e.target.classList.remove("correct")
            }, 2000);
        } else {
            failed++;
            console.info(e.target.textContent)
            $squareBlue.classList.add("incorrectShowNumber");
            e.target.classList.add("incorrect");
            $incorrectMp3.play()
            $ButtonsNum.forEach(element => {
                element.disabled = true;
                if (element.textContent == $containerPlayer.getAttribute("data-num")) {
                    element.classList.add("correct");
                    setTimeout(() => {
                        element.classList.remove("correct");
                    }, 2000);
                }
            });
            setTimeout(() => {
                $ButtonsNum.forEach(element => {
                    element.removeAttribute("disabled")
                });
                randomNumber10();
                $squareBlue.classList.remove("incorrectShowNumber");
                e.target.classList.remove("incorrect")
            }, 2000);
        }
        if (count == 10) {
            top();
            setTimeout(() => {
                $containerPlayer.setAttribute("data-moreLess", "-")
                FromOneToThree();
                voiceExercise("Seleccione el elemento que tiene menos cuadrados");
                setTimeout(() => {
                    $containerPlay.removeChild($containerPlay.children[2])
                    start();
                }, 3000);
                randomNumber10();
            }, 2000);
        }
        if (count === 20) {
            if (acceptedPoints == 0) {
                $messageResult.innerHTML = "¡Anímate! Todavía tienes oportunidades para mejorar.";
            } else if (acceptedPoints < 5) {
                $messageResult.innerHTML = "Has demostrado lo mejor de ti. Con un poco más de esfuerzo, alcanzarás tus metas.";
            } else if (acceptedPoints < 10) {
                $messageResult.innerHTML = "¡Has demostrado un gran potencial, sigue asi!";
            } else if (acceptedPoints < 15) {
                $messageResult.innerHTML = "¡Enhorabuena! Tu dedicación y esfuerzo han dado sus frutos. <br>  Sigue así y alcanzarás grandes logros. "
            } else if (acceptedPoints < 19) {
                $messageResult.innerHTML = "¡Felicidades! Tu dedicación y esfuerzo han dado grandes frutos. <br> Sigue asi! "
            }
            else if (acceptedPoints == 20) {
                $messageResult.innerHTML = "¡Felicidades! Has completado la lección con un 100% de aciertos. ¡Excelente trabajo!"
            }
            return endOfLesson()
        }
    }

    const $buttonPlay = e.target.closest(".btnPlay");

    if (e.target.matches(".loadPage")) {
        location.reload();
    }
    if (e.target.matches(".OpenModalGuide")) {
        $containerGuideModal.removeAttribute("style")
        $GuidaContent.classList.add("backInLeft")
    }

    if (e.target.matches(".modalWindowBack")) {
        $containerBack.removeAttribute("style");
        $backContent.classList.add("backInLeft")
    }

    if (e.target.matches(".showTableC")) {
        await fetch("./../../../../../php/user/showTableC.php", {
            method: 'POST',
            body: new URLSearchParams({
                typeAccess: 2,
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                let $resultTableC = document.querySelector(".resultTableC");
                let $footerResult = document.querySelector(".footerResult");
                let $buttonsEnd = document.querySelector(".buttonsEnd");
                $buttonsEnd.removeAttribute("style")
                $footerResult.removeChild($footerResult.children[0]);
                $resultTableC.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    if (e.target.matches(".exitButtonBlue")) { //Cerrar ventana modal de irse de la leccion
        $containerBack.style.display = "none";
    }

    if (e.target.matches(".exitButtonB")) { //Cerrar ventana modal de la guia de la leccion
        $containerGuideModal.style.display = "none";
    }
    if ($buttonPlay) {
        $containerPlay.removeChild($containerPlay.children[5])
        $containerPlay.removeChild($containerPlay.children[2])
        $beginMp3.play();
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Seleccione el elemento que tiene mas cuadrados");
            setTimeout(() => {
                start();
                let $numbers = [5, 1, 4];
                let $operation = ['<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>',
                    "+",
                    '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'];
                subtractionAddition($operation, $numbers, 1)
            }, 3000);
        }, 1000);


    }

})
 function top() {
        clearInterval(timer);
        timer = null;
    }
async function endOfLesson() {
   
    $endOfLessonMp3.play();
    await top();
    $gemsResult.innerHTML = $gem.textContent;
    $timeResult.innerHTML = $time.textContent;

    let resulFormuleP = parseInt(Math.round((acceptedPoints / 20) * 100));

    $porcentageResult.innerHTML = resulFormuleP + "%";
    $containerResultsLesson.removeAttribute("style");
    $contentResultsLesson.classList.add("endOfLessonAnimation")
    await fetch("./../../../../../php/user/unlockUpdateLesson.php", {
        method: 'POST',
        body: new URLSearchParams({
            accessLevel: "Numerico_emergente",
            statu: searchParams.get("statu"),
            id_lesson: 7,
            modulo: "Ampliando el Concepto de Número",
            tema: "Operaciones basicas ",
            lesson: "Suma y resta con objetos",
            failed: failed,
            gems: parseInt($gem.textContent),
            porcentage: resulFormuleP,
            time: $time.textContent,
        }),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

}


function updateDisplay() {
    document.getElementById('time').innerText =
        (hours < 10 ? '0' : '') + hours + ':' +
        (minutes < 10 ? '0' : '') + minutes + ':' +
        (seconds < 10 ? '0' : '') + seconds;
}


function start() {
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