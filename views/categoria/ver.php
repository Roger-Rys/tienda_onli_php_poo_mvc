<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>

<?php if (isset($cat)): ?>
    <div id="products" class="col-md-9">
        <h3 class="text-center padding-little">
            <?= $cat->nombre ?>
        </h3>
        <?php if ($productos->num_rows == 0): ?>
            <h3 class="text-center padding-little">
                No hay productos por mostrar
            </h3>    
        <?php else: ?>    
            <?php while ($pr = $productos->fetch_object()): ?>
                <?php $cont++;
                if (($cont % 3) == 0 || $cont == 1): ?>
                    <div class="row text-center">
                <?php endif; ?>
                    <div class="col-md-4 product">
                        <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>">
            <?php $imagen = isset($pr->imagen) ? base_url . "upload/images/" . $pr->imagen : base_url . "assets/img/camiseta.png"; ?>
                            <img alt="t-shirt" src="<?= $imagen ?>">
                            <h3 class="text-center">
                                <?= $pr->nombre; ?>
                            </h3>
                            <p class="text-center">
                                <a href="#">Cost <?= $pr->precio; ?></a>
                            </p>
                        </a>
                        <p class="descripcion"><?= $pr->descripcion; ?></p>
                        <a href="<?= base_url . 'producto/ver&id=' . $pr->id ?>" class="button">Comprar</a>
                    </div> 
                <?php if (($cont % 3) == 0): ?>      
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>    
        <?php endif; ?>
    </div>
<?php else: ?>
    <div id="products" class="col-md-9">
        <h3 class="text-center padding-little">
            La categoria no existe
        </h3>
    </div>
<?php endif; ?>