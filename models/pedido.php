<?php
require_once 'models/pedido.php';
class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad) {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDb($db) {
        $this->db = $db;
    }         
    
    //Metodo para select
    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }
       
    //Metodo para editar
    public function getOne(){
        $productos = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }
    
     //Metodo para editar
    public function getOneByUser(){
        $query = "SELECT p.id, p.coste FROM pedidos p "
                //. "INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} "
                . "ORDER BY p.id DESC LIMIT 1";
        
        $productos = $this->db->query($query);
        return $productos->fetch_object();
    }
    
    //Metodo para editar
    public function getByUser(){
        $query = "SELECT p.* FROM pedidos p "
                //. "INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} "
                . "ORDER BY p.id DESC";
        
        $productos = $this->db->query($query);
        return $productos;
    }
        
    public function getProductoByPedido($id){
       /*
        $sql = "SELECT * FROM productos WHERE id "
               . "IN(SELECT producto_id FROM lineas_pedido WHERE pedido_id = $id);";
       */
       $sql = "SELECT p.*, lp.unidades FROM productos p "
               . "INNER JOIN lineas_pedido lp ON lp.producto_id = p.id "
               . "WHERE lp.pedido_id = {$id}";
       $pedidos = $this->db->query($sql);
       
       if($this->db->errno){
           echo $this->db->error;
       }       
       return $pedidos;
    }

    //Metodo para save
    public function save(){
        $query = "INSERT INTO pedidos VALUES(NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME());";
        $save = $this->db->query($query);
        echo $query;
        if($this->db->errno){
            echo $this->db->error;
        }
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;         
    }
    
    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as pedido_id;";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido_id; 
        
        foreach ($_SESSION["carrito"] as $indice => $producto){
            $query = "INSERT INTO lineas_pedido VALUES(NULL,{$pedido_id},{$producto['producto']->id},{$producto['unidades']})";
            $save = $this->db->query($query);
         }
         $result = false;
         if($save){
            $result = true;
         }
         return $result;
    }
    
    //ACTUALIZAR PEDIDO
    public function updateOne(){
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' "
               ."WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);
        echo $sql;
        
         if($this->db->errno){
            echo $this->db->error;
        }
        $result = false;
        if($save){
            $result = true;
        }
        return $result;  
    }
    
    //INFORMACION DE USUARIO
    public function userInfo(){
        $sql = "SELECT u.* FROM usuarios u INNER JOIN pedidos p ON u.id = p.usuario_id WHERE p.id={$this->getId()}";
        $user = $this->db->query($sql);
        //echo $sql;
        if($this->db->errno){
            echo "Error: ".$this->db->error;
        }
        
        return $user->fetch_object();        
    }
    
   
}

