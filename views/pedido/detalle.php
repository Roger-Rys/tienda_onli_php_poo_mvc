<h1>Detalle del pedido</h1>
 <?php if (isset($pedido) && isset($productos)): ?>
    <?php if(isset($_SESSION["admin"])):?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=base_url?>Pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == "confirm"?"selected":""?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == "preparation"?"selected":""?>>Preparacion</option>
                <option value="ready" <?=$pedido->estado == "ready"?"selected":""?>>Para enviar</option>
                <option value="sended" <?=$pedido->estado == "sended"?"selected":""?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>        
        <br>
        
        <h3>Informacion de Usuario</h3>
        Usuario: <?=$usuario->nombre." ".$usuario->apellido?><br>
        Correo: <?=$usuario->email?><br><br>
    <?php endif;?>   
        
        <h3>Direccion de envio</h3>
        Estado:    <?= Utils::showStatus($pedido->estado);?><br>
        Provincia: <?=$pedido->provincia?><br>
        Cuidad:    <?=$pedido->localidad?><br>
        Direccion: <?=$pedido->direccion?><br><br>

        <h3>Datos del pedidos</h3>
        Numero de pedido: <?= $pedido->id; ?><br>
        Total a pagar:    <?= $pedido->coste; ?> $<br>
        Producto:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Unidades</th>
                <th>Precio</th>
            </tr>            
            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>                    
                        <?php $imagen = isset($producto->imagen) ? base_url . "upload/images/" . $producto->imagen : base_url . "assets/img/camiseta.png"; ?>
                    <td><img src="<?= $imagen ?>" class="img_carrito"></td>
                    <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a></td>

                    </td>
                    <td>
                        <?= $producto->unidades ?> uni.
                    </td>
                    <td>
                        <?= $producto->precio ?> $
                    </td>
                </tr> 
            <?php endwhile; ?>
        </table>
    <?php else: ?>
    <?php endif; ?>
