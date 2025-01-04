let $searchInputS = document.querySelector("#searchS") ;

$searchInputS.addEventListener("input", e => {
    console.info(e.target.value)
    fetch("./../../php/admin/searchChild.php", {
        method: "POST",
        body: new URLSearchParams({
            search: e.target.value,
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
            document.querySelector('.resultsChilds').innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
})