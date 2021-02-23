<?php
//autoload
if(!isset($_SESSION)){
    session_start();
}
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


//Para mostrar un erro
function showError(){
    $error = new ErrorController();
    $error->index();
}
function controller($controlador_name){    
    
    if(class_exists($controlador_name)){
    
    //$controlador = new UsuarioController();
    $controlador = new $controlador_name();
        
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $accion = $_GET['action'];
            $controlador->$accion();
        }
        elseif (!isset($_GET['action'])) {
            $accion =action_default;
            $controlador->$accion();
        }
        else {
            showError();
        }
    }else{
        //echo 'Controlador no existe';
        showError();
    } 
}

//Cargar Pagina
if(isset($_GET['controller'])){
    $controlador_name = $_GET['controller'].'Controller';
    controller($controlador_name);       
}
elseif (!isset($_GET['controller'])) {
    $controlador_name = controller_default;
    controller($controlador_name);
}
else{
    //echo 'Pagina no existe';
    showError();
    exit();
}

require_once 'views/layout/footer.php';