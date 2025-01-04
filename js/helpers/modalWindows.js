    let $containerDeleteChild = document.querySelector(".containerDeleteChild") || 0;
    let $containerSendNotification = document.querySelector(".containerSendNotification") || 0;
    let $contentSend = document.querySelector(".containerSendNotification > .content") || 0;
    let $contentDelete = document.querySelector(".containerDeleteChild > .content") || 0;
    let $htmlIdChild = document.querySelector('.id_child') || 0;
    let $idChildDelete = document.querySelector("[name='id_childC']") || 0
    let $nameChildS = document.querySelector(".nameChildS") || 0;
    let $idChildD = document.querySelector(`[name="id_childU"]`) || 0;
    let $modalSearchChilds =document.querySelector(".OpenSearchChilds") || 0;
    let $containerSearchChilds = document.querySelector(".containerSearchChilds") || 0;
    let $contentDeleteAccount =  document.querySelector(".containerDeleteAccount  > .content") || 0;
    let $contentSearch = document.querySelector(".containerSearchChilds > .content") || 0;
    let $searchInputS = document.querySelector("#searchS") ;
    let $resultsChilds =document.querySelector(".resultsChilds") ;
    let $containerDeleteAccount = document.querySelector(".containerDeleteAccount") || 0;
    let $btnDeleteAccount = document.querySelector(".btnDeleteAccount") || 0;
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

 