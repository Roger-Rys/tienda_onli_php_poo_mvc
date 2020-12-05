<h1>Carrito de compra</h1>
<div id="carrito">
    <?php if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>=1):?>
    <table class="table">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Presio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($_SESSION["carrito"] as $indice => $producto): ?>
            <?php $valores = $producto["producto"]; ?>
            <tr>
                <?php $imagen = isset($valores->imagen) ? base_url . "upload/images/" . $valores->imagen : base_url . "assets/img/camiseta.png"; ?>
                <td><img src="<?= $imagen ?>" class="img_carrito"></td>
                <td><a href="<?= base_url ?>producto/ver&id=<?= $valores->id ?>"><?= $valores->nombre; ?></a></td>
                <td><?= $producto["precio"]; ?></td>
                <td>
                    <?= $producto["unidades"];?>
                    <a href="<?=base_url?>Carrito/up&index=<?=$indice?>" class="button button-updown">+</a>
                    <a href="<?=base_url?>Carrito/down&index=<?=$indice?>" class="button button-updown">-</a>
                </td>
                <td><a href="<?=base_url?>Carrito/remove&index=<?=$indice?>" class="button button-red button-carrito">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>El carrito esta vacio, agrega algun producto</p>
    <?php endif;?>
    <br>
    <div id="delete-carrito">
        <a href="<?=base_url?>Carrito/delete_all" class="button button-red button-delete">Vaciar carrito</a>    
    </div>
    
    <div id="total-carrito">
        <a href="<?=base_url?>Pedido/hacer" class="button">Hacer pedido</a>
        <h3>Precio total: <?= Utils::statsCarrito()["total"] ?> $</h3>
    </div>
    
</div>



