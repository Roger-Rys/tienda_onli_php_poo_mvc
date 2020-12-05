<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "complete"): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que 
        realices la transferencias bancaria a la cuenta  987656778DAC con el coste del
        pedido, sera procesado y enviado.    
    </p>
    <br/>
    <?php if (isset($pedido) && isset($productos)): ?>
        <h3>Datos del pedidos</h3>
        Numero de pedido: <?= $pedido->id; ?><br>
        Total a pagar: <?= $pedido->coste; ?> $<br>
        Producto:
        <table>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Unidades</th>
            <th>Precio</th>
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




<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "failed"): ?>
    <h1>Tu pedido no ha podido completarse</h1>

<?php endif; ?>
