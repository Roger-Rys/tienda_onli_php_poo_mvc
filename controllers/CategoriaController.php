<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';
class CategoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }  
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();
        //Guardar categoria
        $categoria = new Categoria();
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        //Hacer redireccion
        header("Location:".base_url."Categoria/index");
    }
    
    public function ver(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            //Consegir categorias
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne(); 
            
            //Consegir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();           
        }
        
        require_once 'views/categoria/ver.php';
        
    }
}
