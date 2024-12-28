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
    $showNumberSpan,
    countUp,
    $selects,
    advancedOperations1,
    $showNumberStrong,
    $ButtonsNum2,
    $ButtonsNumMain,
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
    let randomNumber10 = Math.floor(Math.random() * 10);
    switch ($containerPlayer.getAttribute("data-part")) {
        case "1":
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
            break;
        case "2":
            switch (randomNumber10) {
                case 0:
                    let multiplication1 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 5',
                        numbers: [25, 2, 10, 45, 30, 5, 20, 40, 15, 35, 50],
                        answer: 2
                    }
                    advancedOperations1(multiplication1.question, multiplication1.numbers, multiplication1.answer, 2);
                    break;
                case 1:
                    let multiplication2 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 2',
                        numbers: [4, 14, 7, 16, 18, 2, 10, 6, 12, 8, 20],
                        answer: 7
                    }
                    advancedOperations1(multiplication2.question, multiplication2.numbers, multiplication2.answer, 2);
                    break;
                case 2:

                    let multiplication3 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 3',
                        numbers: [9, 6, 18, 3, 2, 15, 12, 21, 24, 27, 0],
                        answer: 2
                    }
                    advancedOperations1(multiplication3.question, multiplication3.numbers, multiplication3.answer, 2);
                    break;
                case 3:
                    let multiplication4 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 3',
                        numbers: [16, 4, 28, 12, 36, 24, 8, 20, 32, 10, 0],
                        answer: 10
                    }
                    advancedOperations1(multiplication4.question, multiplication4.numbers, multiplication4.answer, 2);
                    break;
                case 4:

                    let multiplication5 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 4',
                        numbers: [16, 4, 28, 12, 36, 24, 8, 20, 32, 10, 0],
                        answer: 10
                    }
                    advancedOperations1(multiplication5.question, multiplication5.numbers, multiplication5.answer, 2);
                    break;
                case 5:
                    let multiplication6 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 5',
                        numbers: [25, 5, 35, 15, 54, 20, 10, 30, 40, 45, 0],
                        answer: 54
                    }
                    advancedOperations1(multiplication6.question, multiplication6.numbers, multiplication6.answer, 2);
                    break;
                case 6:
                    let multiplication7 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 6',
                        numbers: [94, 6, 42, 18, 30, 24, 12, 36, 48, 54, 0],
                        answer: 94
                    }
                    advancedOperations1(multiplication7.question, multiplication7.numbers, multiplication7.answer, 2);
                    break;
                case 7:
                    let multiplication8 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 7',
                        numbers: [49, 33, 35, 21, 9, 28, 14, 42, 63, 56, 0],
                        answer: 33
                    }
                    advancedOperations1(multiplication8.question, multiplication8.numbers, multiplication8.answer, 2);
                    break;
                case 8:
                    let multiplication9 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 8',
                        numbers: [64, 8, 40, 24, 11, 32, 16, 56, 72, 48, 0],
                        answer: 11
                    }
                    advancedOperations1(multiplication9.question, multiplication9.numbers, multiplication9.answer, 2);
                    break;
                case 9:
                    let multiplication10 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 9',
                        numbers: [81, 9, 45, 27, 0, 36, 18, 54, 72, 63, 10],
                        answer: 10
                    }
                    advancedOperations1(multiplication10.question, multiplication10.numbers, multiplication10.answer, 2);
                    break;
                case 10:
                    let multiplication11 = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 10',
                        numbers: [100, 10, 70, 30, 13, 20, 50, 80, 90, 40, 0],
                        answer: 13
                    }
                    advancedOperations1(multiplication11.question, multiplication11.numbers, multiplication11.answer, 2);
                    break;
                default:
                    break;
            }
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
        count++;
        console.log(1);
        if (`${e.target.textContent}` == `${$containerPlayer.getAttribute("data-num")}`) {
            acceptedPoints++;
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
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
        if (count == 11) {
            setTimeout(() => {
                $containerPlayer.removeChild($containerPlayer.children[1]);
                top();
                FromOneToThree()
                voiceExercise("Seleccione el elemento que tiene mas cuadrados");
                setTimeout(() => {
                    start();
                    $ButtonsNumMain.classList.remove("d-none");
                    let multiplication = {
                        question: 'UNO de estos numeros No corresponde a la tabla de 5',
                        numbers: [25, 7, 10, 45, 30, 5, 20, 40, 15, 35, 50],
                        answer: 2
                    }
                    advancedOperations1(multiplication.question, multiplication.numbers, multiplication.answer, 2);
                    $containerPlayer.setAttribute("data-part", 2)
                }, 3000);
            }, 2000);
        }
    }

    if (e.target.matches(".ButtonsNum2 > button")) {
        console.log(1);
        count++;
        if (`${e.target.textContent}` == `${$containerPlayer.getAttribute("data-num")}`) {
            acceptedPoints++;
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
            e.target.classList.add("correct");
            $ButtonsNum2.forEach((element) => {
                element.disabled = true;
            });
            $showNumberStrong.classList.add("correct")
            setTimeout(() => {
                $ButtonsNum2.forEach((element) => {
                    element.removeAttribute("disabled");
                });
                randomNumber10();
                $showNumberStrong.classList.remove("correct")
                e.target.classList.remove("correct");
            }, 2000);
        } else {
            failed++;
            e.target.classList.add("incorrect");
            $correctMp3.pause();
            $incorrectMp3.play();
            $ButtonsNum2.forEach(element => {
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
                $ButtonsNum2.forEach((element) => {
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
        $containerPlay.removeChild($containerPlay.children[5]);
        $containerPlay.removeChild($containerPlay.children[2]);
        $beginMp3.play();
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Seleccione el elemento que tiene mas cuadrados");
            setTimeout(() => {
                start();
                let operationD = {
                    operation: "3 / 3 =",
                    numbers: [0, 5, 10],
                    answer: 0,
                };
                advancedOperations1(
                    operationD.operation,
                    operationD.numbers,
                    operationD.answer,
                    1
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
            accessLevel: "desarrollo_numerico",
            statu: searchParams.get("statu"),
            id_lesson: 9,
            modulo: "Desarrollo de Habilidades Numéricas",
            tema: "Operaciones avanzadas ",
            lesson: "Multiplicación y división ",
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
