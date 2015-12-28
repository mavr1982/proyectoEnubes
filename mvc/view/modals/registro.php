<!-- modal de registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalRegistroLabel">Registro de usuario</h4>
      </div>
      <div class="modal-body">
        <form action="?c=index&a=registro" method="post" enctype="multipart/form-data" id="formRegistro">
          <div class="form-group">
            <label for="usuario" class="control-label">Usuario: *(Deberá ser una cuenta de correo electrónico)</label>
            <input type="email" class="form-control" id="usuario" name="usuario">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="apellidos" class="control-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
          </div>
        </form>
        <div class="g-recaptcha" data-sitekey="6LfR8BMTAAAAALBti9MAxu766k_FedcQP3xvZdyU"></div>
        <?php
          // tu clave secreta
          $secret = "6LfR8BMTAAAAAIshuyGkLrLTV_b2siXHya5O4e_6";
   
          // respuesta vacía
          $response = null;
           
          // comprueba la clave secreta
          $reCaptcha = new ReCaptcha($secret);

          // si se detecta la respuesta como enviada
          if ($_POST["g-recaptcha-response"]) {
          $response = $reCaptcha->verifyResponse(
                  $_SERVER["REMOTE_ADDR"],
                  $_POST["g-recaptcha-response"]
              );
        } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formRegistro" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div><!-- fin del modal de registro -->