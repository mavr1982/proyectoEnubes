<!-- modal de editar usuarios-->
  <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalEditUserLabel">Editar usuario</h4>
      </div>
      <div class="modal-body">
        <form action="?c=usuario&a=editarUsuario" method="post" enctype="multipart/form-data" id="formEditUser">
          <div class="form-group">            
            <input type="hidden" class="form-control" id="edit-id" name="edit-id">
          </div>
          <div class="form-group">
            <label for="edit-usuario" class="control-label">Usuario</label>
            <input type="text" class="form-control" id="edit-usuario" name="edit-usuario" readonly="true">
          </div>
          <div class="form-group">
            <label for="edit-password" class="control-label">Contraseña</label>
            <input type="password" class="form-control" id="edit-password" name="edit-password">
          </div>
          <div class="form-group">
            <label for="edit-nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="edit-nombre" name="edit-nombre">
          </div>
          <div class="form-group">
            <label for="edit-apellidos" class="control-label">Apellidos</label>
            <input type="text" class="form-control" id="edit-apellidos" name="edit-apellidos">
          </div>
          <div class="form-group">
            <label for="edit-acceso_privado" class="control-label">Acceso a parte privada</label>
            <input type="radio" value='0' name="edit-acceso_privado" id="edit-acceso_privado">No
            <input type="radio" value='1' name="edit-acceso_privado" id="edit-acceso_privado">Sí
          </div>
          <div class="form-group">
            <label for="edit-is_admin" class="control-label">Administrador</label>
            <input type="radio" value='0' name="edit-is_admin" id="edit-is_admin">No
            <input type="radio" value='1' name="edit-is_admin" id="edit-is_admin">Sí
          </div>          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form='formEditUser' class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de editar -->