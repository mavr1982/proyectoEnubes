<!-- modal de login -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form action="?c=index&a=login" method="post" enctype="multipart/form-data" id="formLogin">
          <div class="form-group">
            <label for="usuario" class="control-label">usuario:</label>
            <input type="email" class="form-control" id="usuario" name="usuario">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formLogin" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de login -->