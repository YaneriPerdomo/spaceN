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
    fractions,
    fraccion2,
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

    switch (randomNumber10) {
        case 0:
            let fraction = {
                imgMain: './../../../../../img/fractions/1-9.png',
                span: [1, 9, 3, 9,2,10],
                answer: 1
            }
            fractions(fraction.imgMain, fraction.span, fraction.answer);
            break;
        case 1:
            let fraction1 = {
                imgMain: './../../../../../img/fractions/3-12.png',
                span: [2, 2, 2,10,3, 12],
                answer: 3
            }
            fractions(fraction1.imgMain, fraction1.span, fraction1.answer);
            break;
        case 3:
            let fraction2 = {
                imgMain: './../../../../../img/fractions/2-9.png',
                span: [2, 10, 2, 9, 10,12],
                answer: 2
            }
            fractions(fraction2.imgMain, fraction2.span, fraction2.answer);
            break;
        case 4:
            let fraction3 = {
                imgMain: './../../../../../img/fractions/2-3.png',
                span: [2, 3, 2, 4, 2,5],
                answer: 1
            }
            fractions(fraction3.imgMain, fraction3.span, fraction3.answer);
            break;
        case 5:
            let fraction4 = {
                imgMain: './../../../../../img/fractions/3-4.png',
                span: [3, 4,3,20, 2, 3],
                answer: 2
            }
            fractions(fraction4.imgMain, fraction4.span, fraction4.answer);
            break;
        case 6:
            let fraction5 = {
                imgMain: './../../../../../img/fractions/1-4.png',
                span: [1, 4, 3,5, 2, 3],
                answer: 1
            }
            fractions(fraction5.imgMain, fraction5.span, fraction5.answer);
            break;
        case 7:
            let fraction6 = {
                imgMain: './../../../../../img/fractions/3-4.png',
                span: [1, 4, 30,2, 3, 4],
                answer: 3
            }
            fractions(fraction6.imgMain, fraction6.span, fraction6.answer);
            break;
        case 8:
            let fraction7 = {
                imgMain: './../../../../../img/fractions/5-7.png',
                span: [5, 7, 3, 5,3,5],
                answer: 1
            }
            fractions(fraction7.imgMain, fraction7.span, fraction7.answer);
            break
        case 9:
            let fraction8 = {
                imgMain: './../../../../../img/fractions/3-9.png',
                span: [3, 7, 3, 9,4,8],
                answer: 2
            }
            fractions(fraction8.imgMain, fraction8.span, fraction8.answer);
            break
        case 10:
            let fraction10 = {
                imgMain: './../../../../../img/fractions/6-8.png',
                span: [6, 8, 7,8,3, 5],
                answer: 3
            }
            fractions(fraction10.imgMain, fraction10.span, fraction10.answer);
            break
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
        if (e.target.getAttribute('data-answer') == 'true') {
            acceptedPoints++;
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
            e.target.classList.add("correct");
            $ButtonsNum.forEach((element) => {
                element.disabled = true;
            });
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
                if (element.getAttribute('data-answer') == 'true') {
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
        $containerPlay.removeChild($containerPlay.children[5]);
        $containerPlay.removeChild($containerPlay.children[2]);
        $beginMp3.play();
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Seleccione el elemento que tiene mas cuadrados");
            setTimeout(() => {
                start()
                let fraccionImg = {
                    main: [2,3], 
                    img: '', 
                    answer:2
                }
                fraccion2(fraccionImg.main, fraccionImg.img, fraccionImg.answer);
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
            id_lesson: 12,
            modulo: "Desarrollo de Habilidades Numéricas",
            tema: "Fracciones",
            lesson: "Concepto de fraccion 2",
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
