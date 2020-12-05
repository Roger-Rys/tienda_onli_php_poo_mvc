<?php if (isset($pro) && is_object($pro)): ?>
    <h1><?= $pro->nombre ?></h1>
    <div id='detail-product'>
        <div class="image">
            <?php $imagen = isset($pro->imagen) ? base_url . "upload/images/" . $pro->imagen : base_url . "assets/img/camiseta.png"; ?>
            <img src="<?= $imagen ?>">
        </div>
        <div class="data">
            <h2><?= $pro->nombre; ?></h2>
            <p><strong>Descripcion</strong></p>
            <p class="descripcion"><?= $pro->descripcion; ?></p>
            <p><strong>Precio</strong> <?= $pro->precio;?>$</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h2>El producto no existe</h2>
<?php endif; ?>
