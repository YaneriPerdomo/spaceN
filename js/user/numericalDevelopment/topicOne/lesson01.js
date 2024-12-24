import {
    $gem,
    $time,
    $containerPlay,
    $containerResultsLesson,
    $contentResultsLesson,
    $ButtonsNum,
    searchParams,
    $endOfLessonMp3,
    $incorrectMp3,
    $correctMp3,
    $beginMp3,
    $gemsResult,
    $porcentageResult,
    $timeResult,
    $messageResult,
    $containerBack,
    $backContent,
    $containerGuideModal,
    $begin,
    $GuidaContent,
    $containerPlayer,
    $clickMp3,
    FromOneToThree,
    voiceExercise,
    $squareBlue,
    $showNumberSpan,
    $showNumberSpan02,
    countUp,
    $selects,
    advancedOperations1,
} from "../../../helpers/lessons.js";

let count = 0;
let acceptedPoints = 0;
let failed = 0;

let timer;
let seconds = 0,
    minutes = 0,
    hours = 0;

document.addEventListener("mousemove", (e) => {
    if (e.target.matches(".ButtonsNum > button")) {
        $clickMp3.play();
    }
});

function randomNumber10(){
        let randomNumber10 = Math.floor(Math.random() * 10);
        switch (randomNumber10) {
            case 0:
                let operationD1 = {
                    operation: "3 / 3 =",
                    numbers: [6, 5, 1],
                    answer: 1,
                };
                advancedOperations1(
                    operationD1.operation,
                    operationD1.numbers,
                    operationD1.answer
                );
            break;
            case 1:
                let operationD2 = {
                    operation: "15 / 3 =",
                    numbers: [5, 15, 55],
                    answer: 5,
                };
                advancedOperations1(
                    operationD2.operation,
                    operationD2.numbers,
                    operationD2.answer
                );
            break;
            case 2:
              
                let operationD3 = {
                    operation: "27 / 3 =",
                    numbers: [3, 9, 33],
                    answer: 9,
                };
                advancedOperations1(
                    operationD3.operation,
                    operationD3.numbers,
                    operationD3.answer
                );
            break;
            case 3:
                let operationD4 = {
                    operation: "18 / 2 =",
                    numbers: [9, 7, 1],
                    answer: 9,
                };
                advancedOperations1(
                    operationD4.operation,
                    operationD4.numbers,
                    operationD4.answer
                );
            break;
            case 4:

            let operationD5 = {
                operation: "36 / 4 =",
                numbers: [7, 6, 9],
                answer: 9,
            };
            advancedOperations1(
                operationD5.operation,
                operationD5.numbers,
                operationD5.answer
            );
            break;
            case 5: 
            let operationD6 = {
                operation: "48 / 6 =",
                numbers: [9, 8, 7],
                answer: 8,
            };
            advancedOperations1(
                operationD6.operation,
                operationD6.numbers,
                operationD6.answer
            );
            break;
            case 6:
                let operationD7 = {
                    operation: "64 / 8 =",
                    numbers: [8, 9, 2],
                    answer: 8,
                };
                advancedOperations1(
                    operationD7.operation,
                    operationD7.numbers,
                    operationD7.answer
                );
            break;
            case 7:
                let operationD8 = {
                    operation: "35 / 5 =",
                    numbers: [7, 9, 2],
                    answer: 7,
                };
                advancedOperations1(
                    operationD8.operation,
                    operationD8.numbers,
                    operationD8.answer
                );
            break;
            case 8:
                let operationD9 = {
                    operation: "18 / 3 =",
                    numbers: [7, 6, 9],
                    answer: 6,
                };
                advancedOperations1(
                    operationD9.operation,
                    operationD9.numbers,
                    operationD9.answer
                );
            break;
            case 9:
                let operationD10 = {
                    operation: "18 / 18 =",
                    numbers: [0, 10, 1],
                    answer: 1,
                };
                advancedOperations1(
                    operationD10.operation,
                    operationD10.numbers,
                    operationD10.answer
                );
            break;
            case 10:
                let operationD11 = {
                    operation: "81 / 9 =",
                    numbers: [9, 10, 99],
                    answer: 9,
                };
                advancedOperations1(
                    operationD11.operation,
                    operationD11.numbers,
                    operationD11.answer
                );
            break;
            default:
                break;
        }
}
setTimeout(() => {
    $begin.removeChild($begin.children[7]);
}, 2000);

document.addEventListener("change", async (e) => {
    count++;
    if (e.target.value == e.target.getAttribute("data-answer")) {
        acceptedPoints++;
        $correctMp3.play();
        $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
        e.target.classList.add("correct");
        e.target.disabled = true;
    } else {
        failed++;
        $selects.forEach((el) => {
            el.disabled = true;
        });
        e.target.disabled = true;
        await e.target.classList.add("incorrect");
        $incorrectMp3.play();
        setTimeout(async () => {
            $selects.forEach((el) => {
                el.removeAttribute("disabled");
            });
            await e.target.removeAttribute("class");
            e.target.value = e.target.getAttribute("data-answer");
            e.target.classList.add("pause");
        }, 2000);
    }
    if (count == 10) {
        setTimeout(() => {
            let $html = `<option value="_" selected>_</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                         <option value="22">22</option>`;
            let $answers = [12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22];
            countUp($answers, $html, 12);
        }, 2000);
    }
    if (count === 20) {
        if (acceptedPoints == 0) {
            $messageResult.innerHTML =
                "¡Anímate! Todavía tienes oportunidades para mejorar.";
        } else if (acceptedPoints < 5) {
            $messageResult.innerHTML =
                "Has demostrado lo mejor de ti. Con un poco más de esfuerzo, alcanzarás tus metas.";
        } else if (acceptedPoints < 10) {
            $messageResult.innerHTML =
                "¡Has demostrado un gran potencial, sigue asi!";
        } else if (acceptedPoints < 15) {
            $messageResult.innerHTML =
                "¡Enhorabuena! Tu dedicación y esfuerzo han dado sus frutos. <br>  Sigue así y alcanzarás grandes logros. ";
        } else if (acceptedPoints < 19) {
            $messageResult.innerHTML =
                "¡Felicidades! Tu dedicación y esfuerzo han dado grandes frutos. <br> Sigue asi! ";
        } else if (acceptedPoints == 20) {
            $messageResult.innerHTML =
                "¡Felicidades! Has completado la lección con un 100% de aciertos. ¡Excelente trabajo!";
        }
        return endOfLesson();
    }
});

let countD = 0;
document.addEventListener("click", async (e) => {
    if (e.target.matches(".ButtonsNum > button")) {
        countD++;
        console.log(1)
        if (`${e.target.value}` == `${$containerPlayer.getAttribute("data-num")}`) {
            acceptedPoints++;
            console.info(true)
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
            e.target.classList.add("correct");
            $ButtonsNum.forEach((element) => {
                element.disabled = true;
            });
            setTimeout(() => {
                $ButtonsNum.forEach((element) => {
                    element.removeAttribute("disabled");
                });
                randomNumber10();
                e.target.classList.remove("correct");
            }, 2000);
        } else {
            failed++;
            e.target.classList.add("incorrect");
            $correctMp3.pause();
            $incorrectMp3.play();
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
                $ButtonsNum.forEach((element) => {
                    element.removeAttribute("disabled");
                });
                randomNumber10();
                e.target.classList.remove("incorrect");
            }, 2000);
        }
    }

    if (countD == 11) {
        $selects.forEach(el => {
            el.removeAttribute("style");
        })
    }
    const $buttonPlay = e.target.closest(".btnPlay");

    if (e.target.matches(".loadPage")) {
        location.reload();
    }
    if (e.target.matches(".OpenModalGuide")) {
        $containerGuideModal.removeAttribute("style");
        $GuidaContent.classList.add("backInLeft");
    }

    if (e.target.matches(".modalWindowBack")) {
        $containerBack.removeAttribute("style");
        $backContent.classList.add("backInLeft");
    }

    if (e.target.matches(".showTableC")) {
        await fetch("./../../../../../php/user/showTableC.php", {
            method: "POST",
            body: new URLSearchParams({
                typeAccess: 3,
            }),
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then((data) => {
                let $resultTableC = document.querySelector(".resultTableC");
                let $footerResult = document.querySelector(".footerResult");
                let $buttonsEnd = document.querySelector(".buttonsEnd");
                $buttonsEnd.removeAttribute("style");
                $footerResult.removeChild($footerResult.children[0]);
                $resultTableC.innerHTML = data;
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }

    if (e.target.matches(".exitButtonBlue")) {
        //Cerrar ventana modal de irse de la leccion
        $containerBack.style.display = "none";
    }

    if (e.target.matches(".exitButtonB")) {
        //Cerrar ventana modal de la guia de la leccion
        $containerGuideModal.style.display = "none";
    }
    if ($buttonPlay) {
        $containerPlay.removeChild($containerPlay.children[5]);
        $containerPlay.removeChild($containerPlay.children[2]);
        $beginMp3.play();
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Seleccione el elemento que tiene mas cuadrados");
            setTimeout(() => {
                start();
                let operationD = {
                    operation: "2 * 3 =",
                    numbers: [6, 5, 10],
                    answer: 6,
                };
                advancedOperations1(
                    operationD.operation,
                    operationD.numbers,
                    operationD.answer
                );
            }, 3000);
        }, 0);
    }
});
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
    $contentResultsLesson.classList.add("endOfLessonAnimation");
    await fetch("./../../../../../php/user/unlockUpdateLesson.php", {
        method: "POST",
        body: new URLSearchParams({
            accessLevel: "Numerico_emergente",
            statu: searchParams.get("statu"),
            id_lesson: 5,
            modulo: "Ampliando el Concepto de Número",
            tema: "Conteo ",
            lesson: "Conteo hacie adelante",
            failed: failed,
            gems: parseInt($gem.textContent),
            porcentage: resulFormuleP,
            time: $time.textContent,
        }),
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then((data) => {
            console.log(data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function updateDisplay() {
    document.getElementById("time").innerText =
        (hours < 10 ? "0" : "") +
        hours +
        ":" +
        (minutes < 10 ? "0" : "") +
        minutes +
        ":" +
        (seconds < 10 ? "0" : "") +
        seconds;
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
