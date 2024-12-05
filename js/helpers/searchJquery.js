let $contentSearch = document.querySelector(".containerSearchChilds > .content");

let $searchInputS = document.querySelector("#searchS");

$searchInputS.addEventListener("input", e => {
    console.info(e.target.value)
    $.get('./../../php/admin/searchChild.php', function (mensaje, estado) {   
        document.querySelector('.resultsChilds').innerHTML = mensaje;
    })
})