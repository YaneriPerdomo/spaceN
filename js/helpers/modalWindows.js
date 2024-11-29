    let $containerDeleteChild = document.querySelector(".containerDeleteChild");
    let $containerSendNotification = document.querySelector(".containerSendNotification");
    let $contentSend = document.querySelector(".containerSendNotification > .content");
    let $contentDelete = document.querySelector(".containerDeleteChild > .content");
    let $htmlIdChild = document.querySelector('.id_child');
    let $idChildDelete = document.querySelector("[name='id_childC']")
    let $nameChildS = document.querySelector(".nameChildS");
    let $idChildD = document.querySelector(`[name="id_childU"]`)
    document.addEventListener("click", e => {

        if (e.target.matches(".CanceSendN")) {
            $containerSendNotification.style.display = "none";
        }
        if (e.target.matches(".OpenDeleteChild > i")) {
            $containerDeleteChild.removeAttribute("style");
            $contentDelete.classList.add("openModal");
            $idChildDelete.value = e.target.getAttribute("data-idc");
            $idChildD.value = e.target.getAttribute("data-idu");
        }

        if (e.target.matches(".CancelModalDelet")) {
            $containerDeleteChild.style.display = "none";
        }

        if (e.target.matches(".OpenSendNotificationChild > i")) {
            $containerSendNotification.removeAttribute("style");
            $contentSend.classList.add("openModal")
            $nameChildS.innerHTML = e.target.getAttribute("data-nameS")
            $htmlIdChild.value = e.target.getAttribute("data-idS");
        }
        if (e.target.matches(`.sendNotificationChild`)) {
            setTimeout(() => {
                alert("hol")
                console.log(`hola ${e.target.getAttribute("data-id")}`);
                $htmlIdChild.value = `${e.target.getAttribute("data-id")}`;
            }, 1000);
        }

    })
