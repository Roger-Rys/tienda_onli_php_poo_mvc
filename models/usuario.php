 <?php

class Usuario{
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
   //Conexion a la base de datos
    private $db;
    public function __construct() {
        $this->db = Database::connect();
    }
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        //password_hash($password, $algo, $options)
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]);
    }

    function getRol() {
        return $this->db->real_escape_string($this->rol);
    }

    function getImagen() {
        return $this->imagen;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;        
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        $query = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user','null');";
        $save = $this->db->query($query);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //Comprobar si existe usuario
        $query = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($query);
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            
            //Verificar la contraseña
                //password_verify($password, $hash)
            $verify = password_verify($password, $usuario->password);
            if($verify){
                $result =  $usuario;
            }
        }        
        return $result;
    }
}