import {
    $gem,
    $time,
    $containerPlay,
    $containerResultsLesson,
    $contentResultsLesson,
    $ButtonsNum,
    searchParams,
    $endOfLessonMp3,
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
    $showNumberSpan,
    advancedOperations1,
    $showNumberStrong,
    actualizarPuntaje,
    reproducirSonido,
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

function randomNumber10() {
    let randomNumber10 = Math.floor(Math.random() * 29);
    switch (randomNumber10) {
        case 0:
            let operationD1 = {
                operation: "4 * 4 + 1 =",
                numbers: [2, 72, 17],
                answer: 17,
            };
            advancedOperations1(
                operationD1.operation,
                operationD1.numbers,
                operationD1.answer
            );
            break;
        case 1:
            let operationD2 = {
                operation: "5 * 5 / 5 =",
                numbers: [5, 10, 62],
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
                operation: "27 / 3 + 1 =",
                numbers: [11, 10, 9],
                answer: 10,
            };
            advancedOperations1(
                operationD3.operation,
                operationD3.numbers,
                operationD3.answer
            );
            break;
        case 3:
            let operationD4 = {
                operation: "3 + 3 * 8 =",
                numbers: [17, 17, 27],
                answer: 27,
            };
            advancedOperations1(
                operationD4.operation,
                operationD4.numbers,
                operationD4.answer
            );
            break;
        case 4:
            let operationD5 = {
                operation: "9 + 9 - 3 =",
                numbers: [32, 15, 55],
                answer: 15,
            };
            advancedOperations1(
                operationD5.operation,
                operationD5.numbers,
                operationD5.numbers,
                operationD5.answer
            );
            break;
        case 5:
            let operationD6 = {
                operation: "4 * 8 / 4 =",
                numbers: [7, 6, 5],
                answer: 7,
            };
            advancedOperations1(
                operationD6.operation,
                operationD6.numbers,
                operationD6.answer
            );
            break;
        case 6:
            let operationD7 = {
                operation: "7 + 4 * 8 =",
                numbers: [39, 29, 40],
                answer: 39,
            };
            advancedOperations1(
                operationD7.operation,
                operationD7.numbers,
                operationD7.answer
            );
            break;
        case 7:
            let operationD8 = {
                operation: "35 / 5 + 3 =",
                numbers: [10, 29, 32],
                answer: 10,
            };
            advancedOperations1(
                operationD8.operation,
                operationD8.numbers,
                operationD8.answer
            );
            break;
        case 8:
            let operationD9 = {
                operation: "18 / 3 - 5 =",
                numbers: [7, 6, 5],
                answer: 5,
            };
            advancedOperations1(
                operationD9.operation,
                operationD9.numbers,
                operationD9.answer
            );
            break;
        case 9:
            let operationD10 = {
                operation: "18 / 18 + 4 =",
                numbers: [5, 10, 1],
                answer: 5,
            };
            advancedOperations1(
                operationD10.operation,
                operationD10.numbers,
                operationD10.answer
            );
            break;
        case 10:
            let operationD11 = {
                operation: "81 / 9 - 4 =",
                numbers: [9, 4, 5],
                answer: 5,
            };
            advancedOperations1(
                operationD11.operation,
                operationD11.numbers,
                operationD11.answer
            );
            break;
        case 11:
            let operationD12 = {
                operation: "6 * 3 - 2 =",
                numbers: [16, 12, 8],
                answer: 16,
            };
            advancedOperations1(
                operationD12.operation,
                operationD12.numbers,
                operationD12.answer
            );
            break;
        case 12:
            let operationD13 = {
                operation: "20 / 4 + 5 =",
                numbers: [7, 10, 3],
                answer: 10,
            };
            advancedOperations1(
                operationD13.operation,
                operationD13.numbers,
                operationD13.answer
            );
            break;
        case 13:
            let operationD14 = {
                operation: "7 + 7 - 3 =",
                numbers: [11, 5, 9],
                answer: 11,
            };
            advancedOperations1(
                operationD14.operation,
                operationD14.numbers,
                operationD14.answer
            );
            break;
        case 14:
            let operationD15 = {
                operation: "3 * 9 / 3 =",
                numbers: [6, 9, 3],
                answer: 9,
            };
            advancedOperations1(
                operationD15.operation,
                operationD15.numbers,
                operationD15.answer
            );
            break;
        case 15:
            let operationD16 = {
                operation: "5 + 4 * 2 =",
                numbers: [13, 7, 1],
                answer: 13,
            };
            advancedOperations1(
                operationD16.operation,
                operationD16.numbers,
                operationD16.answer
            );
            break;
        case 16:
            let operationD17 = {
                operation: "42 / 7 + 2 =",
                numbers: [8, 4, 1],
                answer: 8,
            };
            advancedOperations1(
                operationD17.operation,
                operationD17.numbers,
                operationD17.answer
            );
            break;
        case 17:
            let operationD18 = {
                operation: "8 - 3 * 1 =",
                numbers: [5, 2, 9],
                answer: 5,
            };
            advancedOperations1(
                operationD18.operation,
                operationD18.numbers,
                operationD18.answer
            );
            break;
        case 18:
            let operationD19 = {
                operation: "16 / 2 - 5 =",
                numbers: [3, 1, 7],
                answer: 3,
            };
            advancedOperations1(
                operationD19.operation,
                operationD19.numbers,
                operationD19.answer
            );
            break;
        case 19:
            let operationD20 = {
                operation: "25 / 5 + 1 =",
                numbers: [6, 2, 4],
                answer: 6,
            };
            advancedOperations1(
                operationD20.operation,
                operationD20.numbers,
                operationD20.answer
            );
            break;
        case 20:
            let operationD = {
                operation: "12 / 2 * 3 =",
                numbers: [18, 9, 6],
                answer: 18,
            };
            advancedOperations1(
                operationD.operation,
                operationD.numbers,
                operationD.answer
            );
            break;
        case 21:
            let operationD21 = {
                operation: "5 + 5 * 5 =",
                numbers: [30, 25, 15],
                answer: 30,
            };
            advancedOperations1(
                operationD21.operation,
                operationD21.numbers,
                operationD21.answer
            );
            break;
        case 22:
            let operationD22 = {
                operation: "20 - 4 * 3 =",
                numbers: [8, 12, 4],
                answer: 8,
            };
            advancedOperations1(
                operationD22.operation,
                operationD22.numbers,
                operationD22.answer
            );
            break;
        case 23:
            let operationD23 = {
                operation: "36 / 6 + 2 =",
                numbers: [8, 6, 10],
                answer: 8,
            };
            advancedOperations1(
                operationD23.operation,
                operationD23.numbers,
                operationD23.answer
            );
            break;
        case 24:
            let operationD24 = {
                operation: "7 * 2 - 3 =",
                numbers: [11, 9, 5],
                answer: 11,
            };
            advancedOperations1(
                operationD24.operation,
                operationD24.numbers,
                operationD24.answer
            );
            break;
        case 25:
            let operationD25 = {
                operation: "15 / 3 * 2 =",
                numbers: [10, 5, 15],
                answer: 10,
            };
            advancedOperations1(
                operationD25.operation,
                operationD25.numbers,
                operationD25.answer
            );
            break;
        case 26:
            let operationD26 = {
                operation: "8 + 4 - 2 =",
                numbers: [10, 12, 6],
                answer: 10,
            };
            advancedOperations1(
                operationD26.operation,
                operationD26.numbers,
                operationD26.answer
            );
            break;
        case 27:
            let operationD27 = {
                operation: "9 * 3 / 3 =",
                numbers: [9, 3, 27],
                answer: 9,
            };
            advancedOperations1(
                operationD27.operation,
                operationD27.numbers,
                operationD27.answer
            );
            break;
        case 28:
            let operationD28 = {
                operation: "24 / 4 + 5 =",
                numbers: [11, 9, 13],
                answer: 11,
            };
            advancedOperations1(
                operationD28.operation,
                operationD28.numbers,
                operationD28.answer
            );
            break;
        case 29:
            let operationD29 = {
                operation: "6 + 6 - 3 =",
                numbers: [9, 12, 3],
                answer: 9,
            };
            advancedOperations1(
                operationD29.operation,
                operationD29.numbers,
                operationD29.answer
            );
            break;
        default:
            break;
    }
}
setTimeout(() => {
    $begin.removeChild($begin.children[7]);
}, 2000);


document.addEventListener("click", async (e) => {
    if (e.target.matches(".ButtonsNum > button")) {
        count++;
        console.log(1);
        if (`${e.target.textContent}` == `${$containerPlayer.getAttribute("data-num")}`) {
            acceptedPoints++;
            reproducirSonido(true)
            actualizarPuntaje()
            e.target.classList.add("correct");
            $ButtonsNum.forEach((element) => {
                element.disabled = true;
            });
            $showNumberSpan[1].innerHTML = e.target.textContent;
            $showNumberStrong.classList.add("correct")
            setTimeout(() => {
                $ButtonsNum.forEach((element) => {
                    element.removeAttribute("disabled");
                });
                randomNumber10();
                $showNumberStrong.classList.remove("correct")
                e.target.classList.remove("correct");
            }, 2000);
        } else {
            failed++;
            e.target.classList.add("incorrect");
            reproducirSonido(false)
            $ButtonsNum.forEach(element => {
                element.disabled = true;
                if (element.textContent == $containerPlayer.getAttribute("data-num")) {
                    element.classList.add("correct");
                    setTimeout(() => {
                        element.classList.remove("correct");
                    }, 2000);
                }
            });
            $showNumberStrong.classList.add("incorrect")
            setTimeout(() => {
                $ButtonsNum.forEach((element) => {
                    element.removeAttribute("disabled");
                });
                randomNumber10();
                $showNumberStrong.classList.remove("incorrect")
                e.target.classList.remove("incorrect");
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
        $containerPlay.removeChild($containerPlay.children[5])
        $begin.classList.add("animationDeleteLabel");
        $beginMp3.play();
        setTimeout(() => {
            $containerPlay.removeChild($containerPlay.children[2])
        }, 1000);
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Pendiente y selecciona el número que verás en el recuadro")
            setTimeout(() => {
                start();
                let operationD = {
                    operation: "4 * 4 + 1 =",
                    numbers: [17, 71, 7],
                    answer: 17,
                };
                advancedOperations1(
                    operationD.operation,
                    operationD.numbers,
                    operationD.answer,
                    1
                );
            }, 3000);
        }, 1000);
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
            accessLevel: "desarrollo_numerico",
            statu: searchParams.get("statu"),
            id_lesson: 10,
            modulo: "Desarrollo de Habilidades Numéricas",
            tema: "Operaciones avanzadas",
            lesson: "Problemas mas complejos ",
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
