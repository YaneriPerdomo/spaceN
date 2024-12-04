
<div class="containerDeleteChild" style="display:none">
    <div class="modal-content content">
        <div class="modal-header">
            <div class="text-center w-100">
                <h2 class="modal-title modalTitleDetele fs-5" id="exampleModalLabel"><b>Eliminar Registro</b></h2>
                <p>
                    Antes de confirmar, tenga en cuenta que al eliminar este registro perderá el
                    acceso a su plan de aprendizaje, incluido su historial de aprendizaje.
                </p>
            </div>
        </div>
        <form action="./../../php/admin/child.php" method="post">
            <div class="modal-body">
                <input type="hidden" name="id_childC" value="">
                <input type="hidden" name="id_childU">
                <input type="hidden" name="valueFunction" value="delete">
            </div>
            <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                <button type="button" class="btn btn-secondary CancelModalDelet">Cancelar</button>
                <button type="submit" class="btn yesButtonDelete">Si, eliminar</button>
            </div>
        </form>
    </div>
</div>
