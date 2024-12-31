    let $containerDeleteChild = document.querySelector(".containerDeleteChild");
    let $containerSendNotification = document.querySelector(".containerSendNotification");
    let $contentSend = document.querySelector(".containerSendNotification > .content");
    let $contentDelete = document.querySelector(".containerDeleteChild > .content");
    let $htmlIdChild = document.querySelector('.id_child');
    let $idChildDelete = document.querySelector("[name='id_childC']")
    let $nameChildS = document.querySelector(".nameChildS");
    let $idChildD = document.querySelector(`[name="id_childU"]`);
    let $modalSearchChilds =document.querySelector(".OpenSearchChilds");
    let $containerSearchChilds = document.querySelector(".containerSearchChilds");
    let $contentDeleteAccount =  document.querySelector(".containerDeleteAccount  > .content");
    let $contentSearch = document.querySelector(".containerSearchChilds > .content");
    let $searchInputS = document.querySelector("#searchS");
    let $resultsChilds =document.querySelector(".resultsChilds")
    let $containerDeleteAccount = document.querySelector(".containerDeleteAccount");
    let $btnDeleteAccount = document.querySelector(".btnDeleteAccount");
    document.addEventListener("click", e => {

        if (e.target.matches(".OpenSearchChilds")) {
            $containerSearchChilds.removeAttribute("style");
            $contentSearch.classList.add("openModal")
        }

        if(e.target.matches(".btnDeleteAccount")){
            $contentDeleteAccount.classList.add("openModal")
            $containerDeleteAccount.removeAttribute("style");
        }

        if(e.target.matches(".CancelModalDeletAccount")){
             $containerDeleteAccount.style.display = "none";
        }

        if (e.target.matches(".containerSearchChilds") || e.target.matches(".cancelSearch")) {
            $containerSearchChilds.style.display = "none"
        }
        if(e.target.matches(".OpenSearchChilds")){
            $containerSearchChilds.removeAttribute("style");
        }
        if (e.target.matches(".CancelSendN")) {
            $containerSendNotification.style.display = "none";
        }

        if(e.target.matches(".yesButtonDeleteAccount")){

        }
        if (e.target.matches(".OpenDeleteChild")) {
            $containerDeleteChild.removeAttribute("style");
            $contentDelete.classList.add("openModal");
            $idChildDelete.value = e.target.getAttribute("data-idc");
            $idChildD.value = e.target.getAttribute("data-idu");
        }

        if (e.target.matches(".CancelModalDelet")) {
            $containerDeleteChild.style.display = "none";
        }

        if (e.target.matches(".OpenSendNotificationChild")) {
            $containerSendNotification.removeAttribute("style");
            $contentSend.classList.add("openModal")
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

 