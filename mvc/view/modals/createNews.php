<!-- modal de crear noticias-->
  <div class="modal fade" id="modelCreate" tabindex="-1" role="dialog" aria-labelledby="modelCreateLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelCreateLabel">Crear noticia</h4>
      </div>
      <div class="modal-body">
        <form action="?c=noticia&a=crearNoticia" method="post" enctype="multipart/form-data" id="formCreateNews">
          <div class="form-group">
            <label for="categoria_id" class="control-label">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id">
              <option value="1">Cine</option>
              <option value="2">Música</option>
              <option value="3">Libros</option>
              <option value="4">Deporte</option>
            </select>
          </div>
          <div class="form-group">
          <label for="autor" class="control-label">Categoria</label>
            <select class="form-control" id="autor" name="autor">
              <?php foreach ($usuarios as $item): ?>
              <option value="<?php print $item->id; ?>"><?php print $item->nombre; ?></option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="titular" class="control-label">Titular</label>
            <input type="text" class="form-control" id="titular" name="titular">
          </div>
          <div class="form-group">
            <label for="entradilla" class="control-label">Entradilla</label>
            <textarea class="form-control" rows="2" id="entradilla" name="entradilla"></textarea>
          </div>
          <div class="form-group">
            <label for="contenido" class="control-label">Contenido</label>
            <textarea class="form-control" rows="6" id="contenido" name="contenido"></textarea>
          </div>                  
          <div class="form-group">
            <label for="imagen" class="control-label">Imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen">
          </div>
          <div class="form-group">
            <label for="published" class="control-label">¿Publicar?</label><br>
            <input type="radio" value='0' name="published" id="published">No
            <input type="radio" value='1' name="published" id="published">Sí
          </div>
          <div class="form-group">
            <label for="public" class="control-label">¿Pública?</label><br>
            <input type="radio" value='0' name="public" id="public">No
            <input type="radio" value='1' name="public" id="public">Sí
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formCreateNews" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de crear noticias-->