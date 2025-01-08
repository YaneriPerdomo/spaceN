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
  MoreLessElements,
  reproducirSonido,
  actualizarPuntaje,
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

setTimeout(() => {
  $begin.removeChild($begin.children[7]);
}, 2500);

function randomNumber10() {
  let randomNumber10 = Math.floor(Math.random() * 10);
  console.info(randomNumber10);
  switch ($containerPlayer.getAttribute("data-moreLess")) {
    case "more":
      switch (randomNumber10) {
        case 0:
          let $elements0 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements0, 2);
          break;
        case 1:
          let $elements1 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements1, 2);
          break;
        case 2:
          let $elements2 = [
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements2, 3);
          break;
        case 3:
          let $elements3 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements3, 1);
          break;
        case 4:
          let $elements4 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements4, 1);
          break;
        case 5:
          let $elements5 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements5, 2);
          break;
        case 6:
          let $elements6 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements6, 1);
          break;
        case 7:
          let $elements7 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements7, 1);

          break;
        case 8:
          let $elements8 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements8, 3);
          break;
        case 9:
          let $elements9 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements9, 2);
          break;
        case 10:
          let $elements10 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>  <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements10, 3);
          break;
        default:
          break;
      }
      break;
    case "less":
      switch (randomNumber10) {
        case 0:
          let $elements0 = [
            '<i class="bi bi-square-fill"></i>  ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements0, 1);
          break;
        case 1:
          let $elements1 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements1, 3);
          break;
        case 2:
          let $elements2 = [
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements2, 3);
          break;
        case 3:
          let $elements3 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements3, 2);
          break;
        case 4:
          let $elements4 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements4, 3);
          break;
        case 5:
          let $elements5 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements5, 3);
          break;
        case 6:
          let $elements6 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i>  ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements6, 2);
          break;
        case 7:
          let $elements7 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> ',
          ];
          MoreLessElements($elements7, 2);

          break;
        case 8:
          let $elements8 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements8, 2);
          break;
        case 9:
          let $elements9 = [
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements9, 1);
          break;
        case 10:
          let $elements10 = [
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
            '<i class="bi bi-square-fill"></i> ',
            '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          ];
          MoreLessElements($elements10, 2);
          break;
        default:
          break;
      }
      break;
    default:
      break;
  }
}

document.addEventListener("click", async (e) => {
  if (e.target.matches(".ButtonsNum > button")) {
    count++;
    if (e.target.getAttribute("data-selection") == "true") {
      acceptedPoints++;
      reproducirSonido(true);
      actualizarPuntaje()
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
     reproducirSonido(false)
      $ButtonsNum.forEach((element) => {
        element.disabled = true;
        if (element.getAttribute("data-selection") == "true") {
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
      start();
    }
    if (count == 10) {
      pause();
      setTimeout(() => {
        $containerPlayer.setAttribute("data-moreLess", "less");
        FromOneToThree();
        voiceExercise("Seleccione el elemento que tiene menos cuadrados");
        setTimeout(() => {
          $containerPlay.removeChild($containerPlay.children[2]);
          start();
        }, 3000);
        randomNumber10();
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
        typeAccess: 2,
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
        let $elements = [
          '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
          '<i class="bi bi-square-fill"></i> <i class="bi bi-square-fill"></i>',
        ];
        MoreLessElements($elements, 2);
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
      id_lesson: 6,
      modulo: "Ampliando el Concepto de Número",
      tema: "Conteo",
      lesson: "Conteo hacia adelante/atras",
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

function pause() {
  if (timer) {
    clearInterval(timer);
    timer = null;
  }
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
