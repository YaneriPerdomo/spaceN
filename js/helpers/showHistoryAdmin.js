import { $results, $show } from "./variables.js";
$show.addEventListener('click', e => {
    e.preventDefault()
    fetch("./../../php/admin/showHistorysButton.php", {
        method: 'POST',
        body: new URLSearchParams({
            inicio: $results.getAttribute("data-limit")
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

            console.info(data)
            if (data.statu == true) {
                return $show.outerHTML = ''
            } else {
                for (let i = 0; i < 3; i++) {
                    let $div = document.createElement("div");
                    $div.innerHTML = `<div class='d-flex gap-1'>
                               <div style='flex-grow: 1;'>
                                   <p class='m-0'>${data[i].mensaje}</p>
                                   <small style='color: #6f6f6f;'>${data[i].fecha_hora}</small>
                               </div>
                               <div>
                                   <a href='./../../php/admin/deleteHistory.php?id="${data[i].id_historial}' class='deteleHistory'>
                                       <i class='bi bi-x-lg'></i>
                                   </a>
                               </div>
                           </div>
                           <hr>`
                    $results.setAttribute('data-limit', parseInt($results.getAttribute("data-limit")) + 1)
                    $results.appendChild($div)
                }
            }

        })
        .catch(error => {
            console.error('Error:', error);
        });

})
