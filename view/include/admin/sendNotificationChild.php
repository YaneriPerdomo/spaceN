<div class="modal fade" id="sendNotificationChild" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel"><b>Envio de notificacion</b></h1>
                    <small>Puedes enviarle una notificación para "nombre de usuario del niño"</small>
                </div>
            </div>
            <form action="./../../php/sendNotificationChild.php" method="post">
                <div class="modal-body">
                    <input type="text" name="id_child" class="id_child" value="">
                    <input type="text" name="id_profesional" value="<?php echo $_SESSION["id_profesional"]?> ">
                    <select name="messenger"class="w-100">
                        <option selected value="¡Felicidades! Has completado una leccion mas.">¡Felicidades! Has completado una lección mas. </option>
                        <option value="¡Genial! Has ganado mas estrellas."> ¡Genial! Has ganado más estrellas. ✨</option>
                        <option value="¡Lo lograste! Has superado la etapa 1."> ¡Lo lograste! Has superado la etapa 1. </option>
                        <option value="¡Sigue asi! Has pasado a la etapa 2."> ¡Sigue así! Has pasado a la etapa 2. </option>
                        <option value="¡Enhorabuena! Has completado todo el aprendizaje."> ¡Enhorabuena! Has completado todo el aprendizaje. </option>
                        <option value="¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.">¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.
                        </option>
                        <option value="ranking_entered"> ¡Bienvenid@! Has entrado en la tabla de clasificación.
                        </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" >Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>