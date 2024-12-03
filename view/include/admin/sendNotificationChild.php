<div class="containerSendNotification" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modalTitleNotification fs-5 text-center" id="exampleModalLabel"><b>Enviar notificacion</b></h1>
                </div>
            </div>
            <form action="./../../php/admin/child.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="valueFunction" value="sendNotification">
                    <input type="hidden" name="id_child" class="id_child" value="">
                    <input type="hidden" name="id_profesional" value="<?php echo $_SESSION["id_profesional"] ?> ">
                    <p class="text-center">Permite que el niño reciba notificacion personalizado en tiempo real que lo anima a
                        alcanzar sus objetivos.</p>
                    <select name="messenger" class="form-select" aria-label="Default select example">
                        <option selected value="¡Felicidades! Has completado una leccion mas.">¡Felicidades! Has
                            completado una lección mas. </option>
                        <option value="¡Genial! Has ganado mas estrellas."> ¡Genial! Has ganado más estrellas. ✨
                        </option>
                        <option value="¡Lo lograste! Has superado la etapa 1."> ¡Lo lograste! Has superado la etapa 1.
                        </option>
                        <option value="¡Sigue asi! Has pasado a la etapa 2."> ¡Sigue así! Has pasado a la etapa 2.
                        </option>
                        <option value="¡Enhorabuena! Has completado todo el aprendizaje."> ¡Enhorabuena! Has completado
                            todo el aprendizaje. </option>
                        <option value="¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.">
                            ¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.
                        </option>
                        <option value="ranking_entered"> ¡Bienvenid@! Has entrado en la tabla de clasificación.
                        </option>
                    </select>
                </div>
                <div class="modal-footer d-flex justify-content-center gap-4 align-items-center"
                    style='  padding-top: 1rem;'>
                    <button type="button" class="btn btn-secondary CancelSendN">Cancelar</button>
                    <button type="submit" class="btn yesButtonSend">Si, enviar</button>
                </div>
            </form>
        </div>
    </div>