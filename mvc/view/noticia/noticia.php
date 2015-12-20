<h1 class="page-header">Noticias</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Noticia&a=Crud">Nueva noticia</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria ID</th>
            <th style="width:180px;">Titular</th>
            <th>Contenido</th>
            <th style="width:60px;">imagen</th>
            <th style="width:60px;">Publicada</th>
            <th style="width:60px;">Privada</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->categoria_id; ?></td>
            <td><?php echo $r->titular; ?></td>
            <td><?php echo $r->contenido; ?></td>
            <td><?php echo $r->imagen; ?></td>
            <td><?php echo $r->Publicada; ?></td>
            <td><?php echo $r->Privada; ?></td>
            <td>
                <a href="?c=Noticia&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Noticia&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
