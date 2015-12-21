<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->titular : 'Nueva noticia'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Noticia">Noticias</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->titular : 'Nueva noticia'; ?></li>
</ol>

<form id="frm-noticia" action="?c=Noticia&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label for='categoria_id'>Categoría:</label>
        <select name="categoria_id" class="form-control">
            <option <?php echo $alm->categoria == 1 ? 'selected' : ''; ?> value="1">Cine</option>
            <option <?php echo $alm->categoria == 2 ? 'selected' : ''; ?> value="2">Música</option>
            <option <?php echo $alm->categoria == 3 ? 'selected' : ''; ?> value="2">Libros</option>
            <option <?php echo $alm->categoria == 4 ? 'selected' : ''; ?> value="2">Deportes</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for='titular'>Titular:</label>
        <input type="text" name="titular" value="<?php echo $alm->titular; ?>" class="form-control" placeholder="Titular de la noticia" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label for="contenido">Contenido</label>
        <input type="text" name="contenido" value="<?php echo $alm->contenido; ?>" class="form-control" placeholder="Contenido de la noticia" data-validacion-tipo="requerido|min:50" />
    </div>
    
    <div class="form-group">
        <label for='imagen'>Imagen</label>
        <input type="text" name="imagen" value="<?php echo $alm->imagen; ?>" class="form-control" placeholder="Imagen de la noticia" data-validacion-tipo="" />
    </div>
    
    <div class="form-group">
        <label for='published'>¿Publicada?</label>
        <input type="radio" name="published" value="1" <?php echo $alm->published == 1 ? 'checked' : ''; ?> >Sí
        <input type="radio" name="published" value="0" <?php echo $alm->published == 0 ? 'checked' : ''; ?> >No
    </div>

    <div class="form-group">
        <label for='public'>¿Privada?</label>
        <input type="radio" name="public" value="0" <?php echo $alm->public == 0 ? 'checked' : ''; ?> >Sí
        <input type="radio" name="public" value="1" <?php echo $alm->public == 1 ? 'checked' : ''; ?> >No
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Actualizar noticia</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>