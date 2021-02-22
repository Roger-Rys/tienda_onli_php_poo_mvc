<!--Aside-->
<div id="aside" class="col-md-3">
    <form role="form">
        <div class="padding-little">
            <h3>Mis compras</h3>
            <?php $stats = Utils::statsCarrito(); ?>
            <a href="<?= base_url ?>Carrito/index">Producto (<?= $stats["count"] ?>)</a><br>
            <a href="<?= base_url ?>Carrito/index">Total: <?= $stats["total"] ?> $</a><br>
            <a href="<?= base_url ?>Carrito/index">Ver el carrito</a>
        </div>
        <hr>

        <div id="login" class="form-group">
            <?php if (!isset($_SESSION['identity'])): ?>
                <h3>Iniciar sesion</h3>
                <form action="<?= base_url ?>Usuario/login" method="POST">
                    <label for="email1">Email</label>
                    <input type="text" class="form-control" id="email1" placeholder="Write your email address">

                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password">

                    <div class="text-center">
                        <button type="submit" class="language btn btn btn-outline-warning btn-lg">
                            Ingresar
                        </button>
                    </div>
                </form>
            <?php else: ?>
                <h2>Bienvenido <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></h2>
            <?php endif; ?>

            <?php if (isset($_SESSION['admin'])): ?>
                <li><a href="<?= base_url ?>Categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>Producto/gestion">Gestionar productos</a></li>
                <li><a href="<?= base_url ?>Pedido/gestion">Gestionar pedidos</a></li>

            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>
                <li><a href="<?= base_url ?>Pedido/mis_pedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>Usuario/logout">Cerrar Sesion</a></li>
            <?php else: ?>
                <li><a href="<?= base_url ?>Usuario/registro">Registrarse</a></li>            
            <?php endif; ?>
        </div>
</div>
<!-----END SIDEBAR------>