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
  $showNumberStrong,
  $showNumberSpan,
  quantityAssociation,
  reproducirSonido,
  actualizarPuntaje,
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
    $clickMp3.play();
  }
});

setTimeout(() => {
  $begin.removeChild($begin.children[7]);
}, 2000);

function randomNumber15() {
  let randomNumber15 = Math.floor(Math.random() * 15);
  switch (randomNumber15) {
    case 0:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        3,
        '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>'
      );
      break;
    case 1:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> '
      );
      break;
    case 2:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        4,
        '<i class="bi bi-eyeglasses"></i> <i class="bi bi-eyeglasses"></i> <i class="bi bi-eyeglasses"></i> <i class="bi bi-eyeglasses"></i> '
      );
      break;
    case 3:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-pen"></i> <i class="bi bi-pen"></i> '
      );
      break;
    case 4:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        1,
        '<i class="bi bi-balloon-heart"></i>'
      );
      break;
    case 5:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        5,
        '<i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i> <i class="bi bi-airplane-engines"></i>'
      );
      break;
    case 6:
      quantityAssociation([1, 2, 3, 4, 5], 1, '<i class="bi bi-backpack"></i>');
      break;
    case 7:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-backpack"></i> <i class="bi bi-backpack"></i>'
      );
      break;
    case 8:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        3,
        '<i class="bi bi-backpack"></i> <i class="bi bi-backpack"></i> <i class="bi bi-backpack"></i>'
      );
      break;
    case 9:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-bicycle"></i> <i class="bi bi-bicycle"></i>'
      );

      break;
    case 10:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        3,
        '<i class="bi bi-bicycle"></i> <i class="bi bi-bicycle"></i> <i class="bi bi-bicycle"></i>'
      );
      break;
    case 11:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-box-seam"></i> <i class="bi bi-box-seam"></i>'
      );
      break;
    case 12:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-box-seam"></i> <i class="bi bi-box-seam"></i>'
      );
      break;
    case 13:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-brightness-high"></i> <i class="bi bi-brightness-high"></i>'
      );
      break;
    case 14:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        2,
        '<i class="bi bi-camera-reels"></i> <i class="bi bi-camera-reels"></i>'
      );
      break;
    case 15:
      quantityAssociation(
        [1, 2, 3, 4, 5],
        5,
        '<i class="bi bi-camera-reels"></i> <i class="bi bi-camera-reels"></i> <i class="bi bi-camera-reels"></i> <i class="bi bi-camera-reels"></i> <i class="bi bi-camera-reels"></i> '
      );
      break;
    default:
      break;
  }
}

document.addEventListener("click", async (e) => {
  if (e.target.matches(".ButtonsNum > button")) {
    count++;
    if (
      `${e.target.textContent}` ==
      `${$containerPlayer.getAttribute("data-num")}`
    ) {
      acceptedPoints++;
      console.info(e.target.textContent);
        reproducirSonido(true);
        actualizarPuntaje()
      e.target.classList.add("correct");
      $ButtonsNum.forEach((element) => {
        element.disabled = true;
      });
      $showNumberStrong.classList.add("correctShownNumber");
      setTimeout(() => {
        $ButtonsNum.forEach((element) => {
          element.removeAttribute("disabled");
        });
        $showNumberSpan.forEach((el) => {
          el.innerHTML = "?";
        });
        $showNumberStrong.classList.remove("correctShownNumber");
        randomNumber15();
        e.target.classList.remove("correct");
      }, 2000);
    } else {
      failed++;
      console.info(e.target.textContent);
      $showNumberStrong.classList.add("incorrectShowNumber");
      e.target.classList.add("incorrect");
       reproducirSonido(false)
      $ButtonsNum.forEach((element) => {
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
        randomNumber15();
        $showNumberStrong.classList.remove("incorrectShowNumber");
        e.target.classList.remove("incorrect");
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
        typeAccess: 1,
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
    $begin.classList.add("animationDeleteLabel");
    $beginMp3.play();
    setTimeout(() => {
      $containerPlay.removeChild($containerPlay.children[2]);
    }, 1000);
    setTimeout(() => {
      FromOneToThree();
      voiceExercise(
        "Pendiente y selecciona el número que verás en el recuadro"
      );
      setTimeout(() => {
        start();
        quantityAssociation(
          [1, 2, 3, 4, 5],
          3,
          '<i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i> <i class="bi bi-balloon"></i>'
        );
        $containerPlay.removeChild($containerPlay.children[2]);
      }, 3000);
    }, 1000);
  }
});

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
  $contentResultsLesson.classList.add("endOfLessonAnimation");
  await fetch("./../../../../../php/user/unlockUpdateLesson.php", {
    method: "POST",
    body: new URLSearchParams({
      accessLevel: "Pre_Numerico",
      statu: searchParams.get("statu"),
      id_lesson: 1,
      failed: failed,
      modulo: "Fundamentos Numéricos",
      tema: "Conceptos basicos",
      lesson: "Asociacion de cantidad",
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
