<!-- modal de borrar usuarios-->
  <div class="modal fade" id="modelDeleteNews" tabindex="-1" role="dialog" aria-labelledby="modelDeleteNewsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelDeleteNewsLabel">Eliminar noticia</h4>
      </div>
      <div class="modal-body">
        <form action="?c=noticia&a=borrar" method="post" enctype="multipart/form-data" id="formDeleteNews">
          <div class="form-group">
            <input type="hidden" class="form-control" id="idForDel" name="idForDel" value="">
          </div>
          <div class="form-group">
         <p class="text-center">¿Está seguro de querer eliminar esta noticia?</p>           
         </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formDeleteNews" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de borrar usuarios -->

