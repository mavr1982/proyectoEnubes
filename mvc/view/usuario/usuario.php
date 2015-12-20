<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Usuario&a=Crud">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th style="width:180px;">Nombre</th>
            <th>Apellidos</th>
            <th style="width:60px;">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->usuario; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td>
                <a href="?c=Usuario&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
