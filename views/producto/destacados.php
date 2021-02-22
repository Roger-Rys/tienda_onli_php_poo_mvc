<div id="productstop"></div>
<div id="products" class="col-md-9">
    <h3 class="text-center padding-little">
        Productos Destacados
    </h3>
    <!--product-->
    <?php if (isset($productos) && is_object($productos)): ?>
    <?php while ($pr = $productos->fetch_object()): ?>
    <?php $cont++; if(($cont%3)==0 || $cont==1):?>
        <div class="row text-center">
    <?php endif;?>
        <div class="col-md-4">
            <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>">
                <?php $imagen = isset($pr->imagen) ? base_url . "upload/images/" . $pr->imagen : base_url . "assets/img/camiseta.png"; ?>
                <img alt="t-shirt" src="<?=$imagen?>">
                <h3 class="text-center">
                    <?= $pr->nombre; ?>
                </h3>
                <p class="text-center">
                    <a href="#">Cost <?= $pr->precio; ?></a>
                </p>
            </a>
            <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>" class="btn">Comprar</a>
        </div> 
    <?php if(($cont%3)==0): ?>      
        </div>
    <?php endif;?>
    <?php endwhile; endif; ?>
</div>