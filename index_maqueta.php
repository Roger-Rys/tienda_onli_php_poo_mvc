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
                            <a class="nav-link active" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#productstop">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#aboutustop">Nosotros</a>
                        </li>
                        <!--MENU-->
                        <?php $categorias = Utils::showCategorias();?>
                        <li class="nav-item dropdown ml-md-auto">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Categoria</a>
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
                <!--Aside-->
                <div id="aside" class="col-md-3">
                    <form role="form">
                        <div class="padding-little">
                            <h3>Mis compras</h3>
                            <?php $stats = Utils::statsCarrito(); ?>
                            <a href="<?= base_url ?>Carrito/index">Producto (<?= $stats["count"] ?>)</a><br>
                            <a href="<?= base_url ?>Carrito/index">Total: <?= $stats["total"] ?> $</a><br>
                            <a href="<?= base_url ?>Carrito/index">Ver el carrito</a>
                        </div>
                        <hr>

                        <div id="login" class="form-group">
                            <?php if (!isset($_SESSION['identity'])): ?>
                                <h3>Iniciar sesion</h3>
                                <form action="<?= base_url ?>Usuario/login" method="POST">
                                    <label for="email1">Email</label>
                                    <input type="email" class="form-control" id="email1" placeholder="Write your email address">

                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password">

                                    <div class="text-center">
                                        <button type="submit" class="language btn btn btn-outline-warning btn-lg">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <h2>Bienvenido <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></h2>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['admin'])): ?>
                                <li><a href="<?= base_url ?>Categoria/index">Gestionar categorias</a></li>
                                <li><a href="<?= base_url ?>Producto/gestion">Gestionar productos</a></li>
                                <li><a href="<?= base_url ?>Pedido/gestion">Gestionar pedidos</a></li>

                            <?php endif; ?>
                            <?php if (isset($_SESSION['identity'])): ?>
                                <li><a href="<?= base_url ?>Pedido/mis_pedidos">Mis pedidos</a></li>
                                <li><a href="<?= base_url ?>Usuario/logout">Cerrar Sesion</a></li>
                            <?php else: ?>
                                <li><a href="<?= base_url ?>Usuario/registro">Registrarse</a></li>            
                            <?php endif; ?>
                        </div>
                </div>
                <!-----END SIDEBAR------>



                <div id="productstop"></div>
                <div id="products" class="col-md-9">
                    <h3 class="text-center padding-little">
                        Productos Destacados
                    </h3>
                    <!--product-->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="assets/img/camiseta.png">
                            <h3 class="text-center">
                                Title
                            </h3>
                            <p class="text-center">
                                Cost 32.23
                            </p>
                            <a href="#">Comprar</a>
                        </div>
                    </div>
                </div>
                
            </div>

            <!--About us-->
            <div id="aboutustop"></div>
            <div id="aboutus" class="row">
                <div class="col-md-12">
                    <h3 class="text-center padding-little">
                        Acerca de nosotros
                    </h3>
                    <p class="text-center">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        Sección 1.10.32 de "de Finibus Bonorum et Malorum", escrito por Cicero en el 45 antes de Cristo
                        "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    </p>
                </div>
            </div>

            <!--footer-->
            <div id="footer" class="row">
                <div class="col-md-10">
                    <h3 class="text-center">
                        Todos los derechos reservados &copy;
                    </h3>
                </div>
                <div class="col-md-2">			 
                    <button id="upbtn" type="button" class="btn btn-block btn-warning">
                        Subir
                    </button>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>