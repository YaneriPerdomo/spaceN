import { $searchInputS, $resultsChilds } from "../helpers/modalWindows.js";
$searchInputS.addEventListener("input", (e) => {
  if (e.target.value.length < 0) {
    $resultsChilds.innerHTML = "";
  } else if (e.target.value.length > 0) {
    let $searchTerm = e.target.value;
    $.get(
      "./../../php/admin/searchChild.php",
      { search: $searchTerm },
      function (mensaje, estado) {
        $resultsChilds.innerHTML = mensaje;
      }
    );
  }
});
