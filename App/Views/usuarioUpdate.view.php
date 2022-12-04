<form action="" method="post" id="form_edit_users">
    <input type="hidden" name="id" id="id" value="<?= $parameters['usuario']['ID'] ?? '0'  ?>">
    <div class="group-input">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $parameters['usuario']['NOMBRE'] ?? ''  ?>">
    </div>

    <div class="group-input">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?= $parameters['usuario']['APELLIDO'] ?? ''  ?>">
    </div>

    <div class="group-input">
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass" value="<?= $parameters['usuario']['PASSWORD'] ?? ''  ?>">
    </div>

    <br>

    <input type="submit" name="Register_Usuario" value="Registrar Usuario">

</form>

<script src="/MVC/Public/asset/js/usuario_update.js"></script>