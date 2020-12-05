<h1>Gestion de productos</h1>
<a href="<?=base_url?>Producto/crear" class="button button-small">
    Crear producto</a>
<!--Notificacion de producto-->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=="complete"):?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=="failed"):?>
        <strong class="alert_red">El producto no se ha guardado correctamente</strong>
        <?php endif;
        Utils::deleteSeccion("producto");?>

<!--Notificacion de delete-->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=="complete"):?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=="failed"):?>
        <strong class="alert_red">El producto no se ha borrado correctamente</strong>
        <?php endif;
        Utils::deleteSeccion("delete");?>

<table>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>PRECIO</th>
    <th>STOCK</th>
    <th>ACCIONES</th>
    
    <?php while($pro = $productos->fetch_object()):?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->stock;?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-small">editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-small button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>