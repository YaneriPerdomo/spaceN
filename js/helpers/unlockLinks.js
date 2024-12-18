document.addEventListener("click", (e) => {
    const clickedElement = e.target.closest("[data-enter]");
    if (clickedElement && clickedElement.getAttribute("data-enter") === "false") {
        console.info(e.target);
        e.preventDefault();
    }
});