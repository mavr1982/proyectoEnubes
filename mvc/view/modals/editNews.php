<!-- modal de editar noticias-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalEditLabel">Editar noticia</h4>
      </div>
      <div class="modal-body">
        <form action="?c=noticia&a=editarNoticia" method="post" enctype="multipart/form-data" id='formEditNews'>
          <div class="form-group">            
            <input type="hidden" class="form-control" id="edit-id" name="edit-id">
          </div>
          <div class="form-group">
            <label for="edit-categoria_id" class="control-label">Categoria</label>
            <select class="form-control" id="edit-categoria_id" name="edit-categoria_id">
              <option value="1">Cine</option>
              <option value="2">Música</option>
              <option value="3">Libros</option>
              <option value="4">Deporte</option>
            </select>
          </div>          
          <div class="form-group">
            <label for="edit-titular" class="control-label">Titular</label>
            <input type="text" class="form-control" id="edit-titular" name="edit-titular">
          </div>
          <div class="form-group">
            <label for="edit-entradilla" class="control-label">Entradilla</label>
            <textarea class="form-control" rows="2" id="edit-entradilla" name="edit-entradilla"></textarea>
          </div>
          <div class="form-group">
            <label for="edit-contenido" class="control-label">Contenido</label>
            <textarea class="form-control" rows="6" id="edit-contenido" name="edit-contenido"></textarea>
          </div>                 
          <div class="form-group">
            <label for="edit-imagen" class="control-label">Imagen</label>
            <input type="text" class="form-control" id="edit-imagen" name="edit-imagen">
          </div>
          <div class="form-group">
            <label for="edit-published" class="control-label">¿Publicar?</label><br>
            <input type="radio" value='0' name="edit-published" id="edit-published">No
            <input type="radio" value='1' name="edit-published" id="edit-published">Sí
          </div>
          <div class="form-group">
            <label for="edit-public" class="control-label">¿Pública?</label><br>
            <input type="radio" value='0' name="edit-public" id="edit-public">No
            <input type="radio" value='1' name="edit-public" id="edit-public">Sí
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form='formEditNews' class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de editar noticias-->