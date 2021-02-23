<div class="row">

    <div id="registro" class="col-md-12">
        <h3 class="padding-little">Registrarse</h3>
        <?php if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
            <h3>Registro guardado exitosamente!!!</h3>
        <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
            <h3>Registro fallido, introducir los datos corectamente</h3>    
        <?php endif; ?>
        <?php Utils::deleteSeccion('register'); ?>

        <form action="<?= base_url ?>Usuario/saveUsuario" method="POST" role="form">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresar su nombre" required="required">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingresar su apellido" required="required">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingresar email" required="required">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Ingresar contraseña" required="required">
            </div>                
            <div class="text-center">
                <button type="submit" class="language btn btn-warning btn-lg">
                    Registrarse
                </button>
            </div>
        </form>

    </div>
</div>


