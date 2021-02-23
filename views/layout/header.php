<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Store Shirt!</title>

        <meta name="description" content="website store shirt">
        <meta name="author" content="LayoutIt!">

        <!--FONT-->
        <!--bodoni-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@1,600&display=swap" rel="stylesheet"> 
        <!--poppins-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@1,600&family=Poppins:wght@300&display=swap" rel="stylesheet"> 
        <!--montserrat-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@1,600&family=Montserrat:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet"> 


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
            
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <!--Header-->
            <div id="header" class="row">
                <div id="title" class="col-md-3">
                    <h3 class="text-center">
                        Shirt Store
                    </h3>
                </div>

                <!--Menu-->
                <div id="menu" class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url?>#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url?>#productstop">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url?>#aboutustop">Nosotros</a>
                        </li>
                        <!--MENU-->
                        <?php $categorias = Utils::showCategorias();?>
                        <li class="nav-item dropdown ml-md-auto">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                Categoria
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <?php while ($cat = $categorias->fetch_object()): ?>
                                    <a class="dropdown-item" href="<?= base_url ?>Categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
                                <?php endwhile; ?> 

                                <!--<a class="dropdown-item" href="#">Categoria1</a>--> 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Image header-->
            <div id="imagefond" class="row">
                <div class="col-md-12">
                    <img alt="Image Preview" src="assets/img/fondoshirt.jpeg">
                </div>
            </div>
            <!------END HEADER.php-------->
            
             <!--Content center-->
            <div id="content-center" class="row">
