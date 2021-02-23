<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>


<?php
require_once 'models/usuario.php';

class UsuarioController {
    

    public function index() {
        echo "Controlador Usuario accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function saveUsuario() {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($nombre && $apellido && $email && $password) {

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                if ($save) {
                    $_SESSION["register"] = "complete";
                } else {
                    $_SESSION["register"] = "failed";
                    ;
                }
            }else{
                $_SESSION["register"] = "failed";
            }
        } else {
            $_SESSION["register"] = "failed";
        }
        header("Location:". base_url ."Usuario/registro");
    }

     public function login(){
         if(isset($_POST)){
             //IDENTIFICAR USUARIO
             //CONSULTA A BD
             $usuario = new Usuario();
             $usuario->setEmail($_POST['email']);
             $usuario->setPassword($_POST['password']);
             $identity = $usuario->login();
             
             if($identity && is_object($identity)){
                 $_SESSION['identity'] = $identity;
                 if($identity->rol == "admin"){
                     $_SESSION['admin']=true;
                 }
             }else{
                 $_SESSION['error_login']="Identificacion fallida";
             }
             
             //CREAR UNA SESION
         }
         header('Location:'.base_url);
     }
     public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}
