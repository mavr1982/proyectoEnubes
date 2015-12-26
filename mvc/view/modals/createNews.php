<!-- modal de crear noticias-->
  <div class="modal fade" id="modelCreate" tabindex="-1" role="dialog" aria-labelledby="modelCreateLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelCreateLabel">Crear noticia</h4>
      </div>
      <div class="modal-body">
        <form action="?c=index&a=login" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="categoria_id" class="control-label">Categoria</label>
            <input type="text" class="form-control" id="categoria_id">
          </div>
          <div class="form-group">
            <label for="titular" class="control-label">Titular</label>
            <input type="text" class="form-control" id="titular">
          </div>
          <div class="form-group">
            <label for="entradilla" class="control-label">Entradilla</label>
            <textarea class="form-control" rows="2"  id="entradilla"></textarea>
          </div>
          <div class="form-group">
            <label for="contenido" class="control-label">Contenido</label>
            <textarea class="form-control" rows="6"  id="contenido"></textarea>
          </div>
          <div class="form-group">
            <label for="fecha" class="control-label">Fecha</label>
            <input type="datetime" class="form-control" id="fecha">
          </div>        
          <div class="form-group">
            <label for="imagen" class="control-label">Imagen</label>
            <input type="text" class="form-control" id="imagen">
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
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de crear noticias-->