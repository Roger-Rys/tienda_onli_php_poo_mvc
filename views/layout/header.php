<!--<!DOCTYPE html>-->
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de Camisas</title>

        <!--STYLE-->
        <link rel="stylesheet" href="<?=base_url?>assets/css/style.css"/>

    </head>
    <body>
        <!--Contenedor global-->
        <div id="container">


            <!-- CABECERA -->
            <header id="header">
                <div id="logo">
                    <img src='<?=base_url?>assets/img/camiseta.png' alt='camiseta'/>
                    <a href="index.php">
                        Tienda de camisetas
                    </a>
                </div>

            </header>
            <div id="clear"></div>

            <!--MENU-->
            <?php $categorias = Utils::showCategorias();?>
            <nav id="menu">
                <ul> 
                    <li><a href="<?=base_url?>">Inicio</a></li>
                    <?php while($cat = $categorias->fetch_object()):?>
                    <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                    <?php endwhile;?>
                </ul>
            </nav>

            <div id="content">