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
  $staqueBlue,
  $showNumberSpan,
  simpleProblem,
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
      let content0 = {
        question:
          "En un aeropuerto antiguo salen 30 aviones durante en la mañana y 20 por la tarde. ¿Cuántos vuelos realiza en total durante el día?",
        icon: '<i class="bi bi-airplane fs-1"></i>',
        numbers: [50, 30, 20, 0],
        answer: 50,
      };
      simpleProblem(
        content0.question,
        content0.icon,
        content0.numbers,
        content0.answer
      );
      break;
    case 1:
      let content01 = {
        question:
          "El abuelo ha regalado 12 relojes a sus 3 nietos. ¿Cuántos relojes tiene cada nieto?",
        icon: '<i class="bi bi-alarm fs-1"></i>',
        numbers: [1, 2, 3, 4],
        answer: 4,
      };
      simpleProblem(
        content01.question,
        content01.icon,
        content01.numbers,
        content01.answer
      );
      break;
    case 2:
      let content02 = {
        question:
          "María le da 7 globos a Luis y ahora tiene 14 ¿Cuánto tenía Luis antes?",
        icon: '<i class="bi bi-people fs-1"></i> <i class="bi bi-balloon fs-1"></i>',
        numbers: [7, 14, 10, 6],
        answer: 7,
      };
      simpleProblem(
        content02.question,
        content02.icon,
        content02.numbers,
        content02.answer
      );
      break;
    case 3:
      let content03 = {
        question:
          "Hay 14 libros en el aula pero la maestra ha traído 10 libros más ¿Cuántos libros tiene ahora la maestra para sus alumnos?",
        icon: '<i class="bi bi-journal-bookmark-fill fs-1"></i>',
        numbers: [24, 14, 20, 23],
        answer: 24,
      };
      simpleProblem(
        content03.question,
        content03.icon,
        content03.numbers,
        content03.answer
      );
      break;
    case 4:
      let content04 = {
        question:
          "Hay 14 libros en el aula pero la maestra ha traído 10 libros más ¿Cuántos libros tiene ahora la maestra para sus alumnos?",
        icon: '<i class="bi bi-journal-bookmark-fill fs-1"></i>',
        numbers: [24, 14, 20, 23],
        answer: 24,
      };
      simpleProblem(
        content04.question,
        content04.icon,
        content04.numbers,
        content04.answer
      );
      break;
    case 5:
      let content05 = {
        question:
          "José tenía $35 en su billetera pero ya gastó $24. ¿Cuánto le queda ahora a José?",
        icon: '<i class="bi bi-currency-dolla fs-1"></i>',
        numbers: [11, 10, 15, 101],
        answer: 11,
      };
      simpleProblem(
        content05.question,
        content05.icon,
        content05.numbers,
        content05.answer
      );
      break;
    case 6:
      let content06 = {
        question:
          "Tres nubes grises de lluvia se acercaron a la casa de Anna, luego una hora después se fueron, ¿cuántas nubes grises había cerca de su casa de Anna?",
        icon: '<i class="bi bi-cloud-rain fs-1"></i>',
        numbers: [5, 2, 3, 32],
        answer: 3,
      };
      simpleProblem(
        content06.question,
        content06.icon,
        content06.numbers,
        content06.answer
      );
      break;
    case 7:
      let content07 = {
        question:
          "Dustin tiene un gallinero y recoge 8 huevos hoy. Si ahora tiene 16, ¿cuántos huevos tenía antes?",
        icon: '<i class="bi bi-egg fs-1"></i>',
        numbers: [8, 16, 7, 10],
        answer: 8,
      };
      simpleProblem(
        content07.question,
        content07.icon,
        content07.numbers,
        content07.answer
      );
      break;
    case 8:
      let content08 = {
        question:
          "María tiene una calculadora pero se la prestó a José. ¿Cuántas calculadoras le quedan?",
        icon: '<i class="bi bi-file-spreadsheet fs-1"></i>',
        numbers: [1, 2, 10, 0],
        answer: 0,
      };
      simpleProblem(
        content08.question,
        content08.icon,
        content08.numbers,
        content08.answer
      );
      break;
    case 9:
      let content09 = {
        question:
          "Ayer la señora Fanny tenía dos llaves de la puerta principal de su casa, pero hoy perdió una. ¿Cuántas llaves le quedan?",
        icon: '<i class="bi bi-key fs-1"></i>',
        numbers: [22, 2, 1, 0],
        answer: 1,
      };
      simpleProblem(
        content09.question,
        content09.icon,
        content09.numbers,
        content09.answer
      );
      break;
    case 10:
      let content10 = {
        question:
          "El vendedor tiene 5 lámparas pero su tío le trajo 12 más ¿cuantas lámparas tiene ahora?",
        icon: '<i class="bi bi-lamp fs-1"></i>',
        numbers: [22, 2, 17, 0],
        answer: 17,
      };
      simpleProblem(
        content10.question,
        content10.icon,
        content10.numbers,
        content10.answer
      );
      break;
    case 11:
      let content11 = {
        question:
          "Un vendedor de consolas Nintendo ha vendido 2 consolas Wii y 5 Wii U. ¿Cuántas unidades ha vendido en total hoy?",
        icon: '<i class="bi bi-nintendo-switch fs-1"></i>',
        numbers: [7, 2, 5, 6],
        answer: 7,
      };
      simpleProblem(
        content11.question,
        content11.icon,
        content11.numbers,
        content11.answer
      );
      break;
    case 12:
      let content12 = {
        question:
          "Lucía usa 15 lápices de colores y su compañera usa 7 menos. ¿Cuántos lápices de colores usa su compañera?",
        icon: '<i class="bi bi-pencil fs-1"></i>',
        numbers: [10, 4, 1, 8],
        answer: 8,
      };
      simpleProblem(
        content12.question,
        content12.icon,
        content12.numbers,
        content12.answer
      );
      break;
    case 13:
      let content13 = {
        question:
          "Diamantino sacó sus ahorros de 27 dólares para dividirlos entre su padre, su hermana, su madre. ¿Cuánto dinero tenía cada miembro de la familia?",
        icon: '<i class="bi bi-piggy-bank fs-1"></i>',
        numbers: [9, 12, 7, 0],
        answer: 9,
      };
      simpleProblem(
        content13.question,
        content13.icon,
        content13.numbers,
        content13.answer
      );
      break;
    case 14:
      let content14 = {
        question:
          "El vendedor de enrutadores tiene 3 enrutadores hoy. Poco después, un cliente vino y compró tres, y luego otro cliente, José, vino a comprar uno también. ¿Cuántos enrutadores el vendedor puede ofrecerle a José?",
        icon: '<i class="bi bi-router fs-1"></i>',
        numbers: [1, 2, 3, 0],
        answer: 0,
      };
      simpleProblem(
        content14.question,
        content14.icon,
        content14.numbers,
        content14.answer
      );
      break;
    case 15:
      let content15 = {
        question:
          "Al principio, Diamantino vio diez estrellas en el cielo. Una hora después, aparecieron veintitrés más. ¿Cuántas estrellas pudo ver en total?",
        icon: '<i class="bi bi-star fs-1"></i>',
        numbers: [1, 2, 3, 0],
        answer: 0,
      };
      simpleProblem(
        content15.question,
        content15.icon,
        content15.numbers,
        content15.answer
      );
      break;
    default:
      break;
  }
}

document.addEventListener("click", async (e) => {
  if (e.target.matches(".ButtonsNum > button")) {
    count++;
    if (`${e.target.textContent}` ==
      `${$containerPlayer.getAttribute("data-num")}`) {
      acceptedPoints++;
      console.info(e.target.textContent);
     reproducirSonido(true);
     actualizarPuntaje()
      e.target.classList.add("correct");
      $ButtonsNum.forEach((element) => {
        element.disabled = true;
      });
      $staqueBlue.classList.add("correctShownNumber");
      setTimeout(() => {
        $ButtonsNum.forEach((element) => {
          element.removeAttribute("disabled");
        });
        $showNumberSpan.forEach((el) => {
          el.innerHTML = "?";
        });
        $staqueBlue.classList.remove("correctShownNumber");
        randomNumber15();
        e.target.classList.remove("correct");
      }, 2000);
    } else {
      failed++;
      console.info(e.target.textContent);
      $staqueBlue.classList.add("incorrectShowNumber");
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
        $staqueBlue.classList.remove("incorrectShowNumber");
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
        randomNumber15();
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
      accessLevel: "Numerico_emergente",
      statu: searchParams.get("statu"),
      id_lesson: 8,
      failed: failed,
      modulo: "Ampliando el Concepto de Número",
      tema: "Operaciones basicas",
      lesson: "Problemas sencillos",
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
