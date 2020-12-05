<?php
require_once 'models/producto.php';

class CarritoController{
    public function index(){
       // var_dump($_SESSION["carrito"]);
        require_once 'views/carrito/index.php';           
    }
    
    public function add(){
        if(isset($_GET["id"])){
            $producto_id = $_GET["id"]; 
            
        }else{
            header("Location:".base_url);
        }
        if(isset($_SESSION["carrito"])){
            $conter = 0;
            foreach ($_SESSION["carrito"] as $indice => $elemento){
                if($elemento["id_producto"] == $producto_id){
                    $_SESSION["carrito"][$indice]["unidades"]++; 
                    $conter++;
                }
            }
        }
        if(!isset($conter) || $conter==0){
            //Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $produc = $producto->getOne();
            
            //Añadir al carrito
            if(is_object($produc)){                
                $_SESSION["carrito"][] = array(
                    "id_producto" => $produc->id,
                    "precio" => $produc->precio,
                    "unidades" => 1,
                    "producto" => $produc
                );  
            }
        }
        header("Location:".base_url."Carrito/index");
    }
    
    public function remove(){
        if(isset($_SESSION["carrito"]) && isset($_GET["index"])){
            $indice = $_GET["index"];
            unset($_SESSION["carrito"][$indice]);
        }
        header("Location:".base_url."Carrito/index");
    }
    
    public function delete_all(){
        unset($_SESSION["carrito"]);
        header("Location:".base_url."Carrito/index");
    }
    
    //PARA UNIDADES
     public function up(){
        if(isset($_GET["index"])){
            $indice = $_GET["index"];
            $_SESSION["carrito"][$indice]['unidades']++;
        }
        header("Location:".base_url."Carrito/index");
    }
    
     public function down(){
        if(isset($_GET["index"])){
            $indice = $_GET["index"];
            $_SESSION["carrito"][$indice]['unidades']--;
            if($_SESSION["carrito"][$indice]['unidades']==0){
                unset($_SESSION["carrito"][$indice]);
            }
        }
        header("Location:".base_url."Carrito/index");
    }
         
}