
<div class="containerDeleteAccount "  style="display:none">
    <div class="modal-content content">
        <div class="modal-header">
            <div class="text-center w-100">
                <h2 class="modal-title modalTitleDetele fs-5" id="exampleModalLabel"><b>Eliminar cuenta </b></h2>
                <p>
                ¿Estás seguro de que deseas eliminar tu cuenta Profesional en "Espacio N"?  
                Esta acción es irreversible y eliminará todos tus datos,
                incluyendo a las cuentas de los usuarios que hayas creado.  
            </p>
            </div>
        </div>
        <form action="./../../../php/admin/user.php" method="post">
            <div class="modal-body">
                <input type="hidden" name="valueFunction" value="deleteAccount">
            </div>
            <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                <button type="button" class="btn btn-secondary CancelModalDeletAccount">Cancelar</button>
                <button type="submit" class="btn yesButtonDeleteAccount">Si, eliminar</button>
            </div>
        </form>
    </div>
</div>
