<h1>Registrarse</h1>

<?php
if(isset($_SESSION['register']) && $_SESSION['register'] == "complete"):?>
    <strong class="alert_green">Registro guardado exitosamente!!!</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"):?>
    <strong class="alert_red">Registro fallido, introducir los datos corectamente</strong>    
<?php endif; ?>
<?php Utils::deleteSeccion('register');?>

<form action="<?=base_url?>Usuario/saveUsuario" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"required="required"/>
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" required="required"/>
    
    <label for="email">Email</label>
    <input type="email" name="email" required="required"/>
    
    <label for="password">Contraseña</ label>
    <input type="password" name="password"required="required"/>
    
    <input type="submit" value="Registrarse"/>
</form>