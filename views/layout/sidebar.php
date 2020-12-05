<!--BARRA LATERAL-->
<aside id="lateral">
    <div id="carrito" class="block_aside">
        <h2>Mi carrito</h2>
        <div>
            <ul>
                <?php $stats = Utils::statsCarrito(); ?>
                <li><a href="<?= base_url ?>Carrito/index">Producto (<?= $stats["count"] ?>)</a></li>
                <li><a href="<?= base_url ?>Carrito/index">Total: <?= $stats["total"] ?> $</a></li>
                <li><a href="<?= base_url ?>Carrito/index">Ver el carrito</a></li>
            </ul>
        </div>
    </div>


    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h2>Entrar a la web</h2>
            <form action="<?= base_url ?>Usuario/login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email"/>             

                <label for="password">Contraseña</label>
                <input type="password" name="password"/>

                <input type="submit" value="Entrar"/>
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
            <li><a href="<?=base_url?>Pedido/mis_pedidos">Mis pedidos</a></li>
            <li><a href="<?= base_url ?>Usuario/logout">Cerrar Sesion</a></li>
        <?php else: ?>
            <li><a href="<?= base_url ?>Usuario/registro">Registrarse</a></li>            
        <?php endif; ?>
      
    </div>
</aside>

<!--CONTENIDO CENTRAL-->
<div id="central">
