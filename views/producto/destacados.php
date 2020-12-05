
<h1>Algunos de nuestros Productos Destacados</h1>

<?php if (isset($productos) && is_object($productos)): ?>

    <?php while ($pr = $productos->fetch_object()): ?>
        <div class="product">
            <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>">
                <?php $imagen = isset($pr->imagen) ? base_url . "upload/images/" . $pr->imagen : base_url . "assets/img/camiseta.png"; ?>
                <img src="<?= $imagen ?>">
                <h2><?= $pr->nombre; ?></h2>
                <p><?= $pr->precio; ?></p>
            </a>
            <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>" class="button">Comprar</a>
        </div>        
    <?php endwhile;
endif; ?>



