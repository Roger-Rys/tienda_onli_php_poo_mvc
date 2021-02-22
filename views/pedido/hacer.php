<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <a href="<?= base_url ?>carrito/index">Ver los productos del pedido</a>
    <br/><br/>
    <h3>Direccion para el envio</h3>
    <hr/>
    <form action="<?=base_url?>Pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required>
        
        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" required>
        
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required>
        
        <input type="submit" value="Confirmar pedidos">
    </form>
        
<?php else: ?>
    <h1>Necesita identificarse</h1>
    <p>Necesitas iniciar sesion para realizar pedido</p>
<?php endif; ?>

