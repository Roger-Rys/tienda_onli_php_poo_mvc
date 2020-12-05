<?php if (isset($cat)): ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if ($productos->num_rows == 0): ?>
        <h3>No hay productos por mostrar</h3>
    <?php else: ?>

        <?php while ($pr = $productos->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url.'producto/ver&id='.$pr->id?>">
                    <?php $imagen = isset($pr->imagen) ? base_url . "upload/images/" . $pr->imagen : base_url . "assets/img/camiseta.png"; ?>
                    <img src="<?= $imagen ?>">
                    <h2><?= $pr->nombre; ?></h2>
                    <p><?= $pr->precio; ?></p>
                </a>
                <p class="descripcion"><?= $pr->descripcion; ?></p>
                <a href="<?=base_url.'producto/ver&id='.$pr->id?>" class="button">Comprar</a>
            </div>        
        <?php endwhile; ?>

    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>


