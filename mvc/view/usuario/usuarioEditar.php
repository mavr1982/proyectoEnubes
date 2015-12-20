<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label for='nombre'>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label for='apellidos'>Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $alm->apellidos; ?>" class="form-control" placeholder="Apellidos" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label for="usuario">Correo electrónico: *(Será su usuario para acceder)</label>
        <input type="text" name="usuario" value="<?php echo $alm->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    
    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo" class="form-control">
            <option <?php echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for='password'>Contraseña:</label>
        <input type="password" name="password" value="<?php echo $alm->password; ?>" class="form-control" placeholder="Contraseña" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Actualizar usuario</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>