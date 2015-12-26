<!-- modal de crear usuarios-->
  <div class="modal fade" id="modelCreateUser" tabindex="-1" role="dialog" aria-labelledby="modelCreateUserLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelCreateUserLabel">Crear usuario</h4>
      </div>
      <div class="modal-body">
        <form action="?c=index&a=login" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="usuario" class="control-label">Usuario</label>
            <input type="email" class="form-control" id="usuario">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Contraseña</label>
            <input type="email" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="titular" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="titular">
          </div>
          <div class="form-group">
            <label for="entradilla" class="control-label">Apellidos</label>
            <input type="text" class="form-control" id="titular">
          </div>
          <div class="form-group">
            <label for="acceso_privado" class="control-label">Acceso a parte privada</label>
            <input type="radio" value='0' name="acceso_privado" id="acceso_privado">No
            <input type="radio" value='1' name="acceso_privado" id="acceso_privado">Sí
          </div>
          <div class="form-group">
            <label for="is_admin" class="control-label">Administrador</label>
            <input type="radio" value='0' name="is_admin" id="is_admin">No
            <input type="radio" value='1' name="is_admin" id="is_admin">Sí
          </div>          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de crear -->