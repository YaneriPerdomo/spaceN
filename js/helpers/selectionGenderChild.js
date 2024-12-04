
let $dataChecked = document.querySelectorAll(".selectionGender > label > img");
document.addEventListener("click", e => {
    if (e.target.matches(".selectionGender > label > img")) {
        for (let i = 0; i < $dataChecked.length; i++) {
            $dataChecked[i].removeAttribute("data-checked");
            $dataChecked[i].classList.remove("checked")

        }
        e.target.classList.add("checked");
        e.target.setAttribute("data-checked", "true");

    }
})