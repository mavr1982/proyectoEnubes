<!-- modal de borrar usuarios-->
  <div class="modal fade" id="modelDeleteUser" tabindex="-1" role="dialog" aria-labelledby="modelDeleteUserLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelDeleteUserLabel">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
        <form action="?c=usuario&a=borrar" method="post" enctype="multipart/form-data" id="formDeleteUser">
          <div class="form-group">
            <input type="hidden" class="form-control" id="idForDel" name="idForDel" value="">
          </div>
          <div class="form-group">
         <p class="text-center">¿Está seguro de querer eliminar este usuario?</p>           
         </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formDeleteUser" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de borrar usuarios -->

