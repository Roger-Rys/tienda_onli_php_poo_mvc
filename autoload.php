<?php

function contoller_autoload($pagina){
    include 'controllers/'.$pagina.'.php';
}
spl_autoload_register("contoller_autoload");