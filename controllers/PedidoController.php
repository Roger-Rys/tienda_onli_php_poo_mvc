<?php
require_once 'models/pedido.php';

class PedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    } 
    
    public function add(){
        if(isset($_SESSION["identity"])){
            //Guardar datos en bd
            if(isset($_POST)){      
                $usuario_id = $_SESSION["identity"]->id;
                $provincia = isset($_POST["provincia"])?$_POST["provincia"]:false;
                $localidad = isset($_POST["localidad"])?$_POST["localidad"]:false;
                $direccion = isset($_POST["direccion"])?$_POST["direccion"]:false;
                $stats = Utils::statsCarrito();
                $coste = $stats['total'];
                
                
                //Guardar datos
                if($provincia && $localidad && $direccion && $usuario_id){
                    $pedido = new Pedido();
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);
                    $save = $pedido->save();
                    
                    //guardar en linea pedido
                    $save_linea = $pedido->save_linea();
                    
                    if($save && $save_linea){
                        $_SESSION['pedido']='complete';
                    }else{
                        $_SESSION['pedido']='failed';
                    }
                }
            }else{
                $_SESSION['pedido']='failed';
            }
            header("Location:".base_url."Pedido/confirmado");
        }
        else{
            //Redigir al index
            header("Location:".base_url);
        }        
    }
  
    public function confirmado(){
        if(isset($_SESSION['identity'])){
           
            $usuario_id=$_SESSION["identity"]->id;
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido = $pedido->getOneByUser();
            
            $pedido_producto = new Pedido(); 
            $productos = $pedido_producto->getProductoByPedido($pedido->id);
            
            
        }
        require_once 'views/pedido/confirmado.php';
    }
        
    public function mis_pedidos(){
        Utils::isIdentity();
        $usuario_id = $_SESSION["identity"]->id;
        
        $pedido = new Pedido();
        //sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            
            //Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            
            //Sacar los productos 
            $pedido_producto = new Pedido(); 
            $productos = $pedido_producto->getProductoByPedido($id);
            
            //Sacar el usuario
            $usuarioInfo = new Pedido(); 
            $usuarioInfo->setId($id);
            $usuario = $usuarioInfo->userInfo();
            
        }
        else{
            header('Location'.base_url.'Pedido/mis_pedidos');
        }
        require_once 'views/pedido/detalle.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        $gestion = true;
        
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function estado(){
        Utils::isAdmin();
        if(isset($_POST["pedido_id"]) && isset($_POST["estado"])){
            //update del pedido
            $id = $_POST["pedido_id"];
            $estado = $_POST["estado"];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateOne();
            header("Location:".base_url."Pedido/detalle&id=".$id);
        }else{
            header("Location:".base_url);
        }
    }
}

