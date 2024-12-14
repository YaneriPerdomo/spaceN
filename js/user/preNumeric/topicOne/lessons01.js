import {$gem, $time, $wrongSelection, $containerPlay,$containerResultsLesson, 
    $contentResultsLesson, $ButtonsNum, acceptedPoints, searchParams, failed, $strongFromOneToThree, $FromOneToThree, $endOfLessonMp3, $incorrectMp3, random, $correctMp3, $beginMp3
    ,$gemsResult, $porcentageResult, $timeResult, $messageResult, $modalWindowBack, $containerBack, $backContent,
    $body, $buttonOpenModalGuide, $containerGuideModal, $begin, $GuidaContent, $containerPlayer, 
    $clickMp3, count, timer, seconds, minutes, hours, urlParams, id , FromOneToThree, 
    voiceExercise, defineNumber01, updateDisplay, start

 } from "../../../helpers/lessons";

document.addEventListener("mousemove", (e) => {
    if(e.target.matches(".ButtonsNum > button") ){
        $clickMp3.play()
    }
})

(function deletePantallaBlack ( ) {
    setTimeout(() => {
    $begin.removeChild($begin.children[7]);
}, 2500);
})();

document.addEventListener("click", e => {

    if (e.target.matches(".ButtonsNum > button")) {
        count++;
        randomNumber = Math.floor(Math.random() * 4);
        if (e.target.textContent == $containerPlayer.getAttribute("data-num")) {
            acceptedPoints++;
            $correctMp3.play();
            $gem.innerHTML = `${1 + Number.parseInt($gem.textContent)}`;
            e.target.classList.add("correct");
            $ButtonsNum.forEach(element => {
                element.disabled = true;
            });
            setTimeout(() => {
                $ButtonsNum.forEach(element => {
                    element.removeAttribute("disabled")
                });
                defineNumber01("6", "9", "3", randomNumber)
                e.target.classList.remove("correct")
            }, 2000);
        } else {
            failed++;
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
                defineNumber01("6", "9", "3", randomNumber)
                e.target.classList.remove("incorrect")
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
            FromOneToThree()
            setTimeout(() => {
                start();
                $containerPlay.removeChild($containerPlay.children[2])
            }, 3000);
        }, 1000);

    }

})

async function endOfLesson() {
    function top() {
        clearInterval(timer);
        timer = null;
    }
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
            typeAccess: "Pre_Numerico",
            statu: searchParams.get("statu"),
            id_lesson: 1,
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

