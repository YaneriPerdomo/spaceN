import {
    $gem, $time, $containerPlay, $containerResultsLesson,
    $contentResultsLesson, $ButtonsNum, searchParams, $endOfLessonMp3,
    $incorrectMp3, $correctMp3, $beginMp3, $gemsResult, $porcentageResult, $timeResult, $messageResult, $containerBack, $backContent,
    $containerGuideModal, $begin, $GuidaContent, $containerPlayer, $clickMp3, FromOneToThree,
    voiceExercise,
    $squareBlue,
    $showNumberSpan,
     $showNumberSpan02,
    countUp,
    $selects,
} from "../../../helpers/lessons.js";

let count = 0;
 let acceptedPoints = 0;
let failed = 0;

let timer;
let seconds = 0,
    minutes = 0,
    hours = 0;

document.addEventListener("mousemove", (e) => {
    if (e.target.matches(".containerPlayer > select")) {
        $clickMp3.play()
    }
})

setTimeout(() => {
    $begin.removeChild($begin.children[7]);
}, 2000);


document.addEventListener("change", async e => {
    count++;
    if (e.target.value == e.target.getAttribute("data-answer")) {
        acceptedPoints++;
        $correctMp3.play();
        $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
        e.target.classList.add("correct");
        e.target.disabled = true;
    } else {
        failed++;
        $selects.forEach(el =>{
            el.disabled = true;
        })
        e.target.disabled = true
        await e.target.classList.add("incorrect");
        $incorrectMp3.play()
        setTimeout(async () => {
            $selects.forEach(el => {
                el.removeAttribute("disabled");
            })
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
        let $answers = [12, 13, 14, 15, 16, 17, 18, 19, 20, 21,22]
        countUp($answers, $html, 12);
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

})
document.addEventListener("click", async e => {


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
        $begin.classList.add("animationDeleteLabel");
        $beginMp3.play();
        setTimeout(() => {
            $containerPlay.removeChild($containerPlay.children[2])
        }, 1000);
        setTimeout(() => {
            FromOneToThree();
            voiceExercise("Seleccione el elemento que tiene mas cuadrados");
            let $html = `
                        <option value="_" selected>_</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>`;
                let $answers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11]
                countUp($answers, $html, 1);
            setTimeout(() => {
                start();
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