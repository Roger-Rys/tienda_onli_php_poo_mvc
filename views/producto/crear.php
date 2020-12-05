<?php if(isset($editar) && isset($pro) && is_object($pro)):?>
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url."Producto/save&id=".$pro->id;?>
<?php else:?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url."Producto/save"?>
<?php endif;?>
    
    
<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=isset($pro->nombre)?$pro->nombre:"";?>"/>
    
    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion"><?=isset($pro->descripcion)?$pro->descripcion:"";?></textarea>
    
    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?=isset($pro->precio)?$pro->precio:"";?>"/>

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($pro->stock)?$pro->stock:"";?>"/>
    
    <label for="categoria">Categoria</label>
    <select name="categoria">
        <?php $categorias = Utils::showCategorias();
               while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id === $pro->categoria_id ?"selected":''?>>
                   <?=$cat->nombre?></option>
        <?php endwhile;?>        
    </select>
    
    <label for="image">Imagen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
    <img src="<?=base_url?>upload/images/<?=$pro->imagen?>" title="imagen" class="thumb"/>
    <?php endif;?>
    <input type="file" name="imagen"/>
    
    <input type="submit" value="Guardar"/>
    
</form>