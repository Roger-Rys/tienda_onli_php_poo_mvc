    <?php

require_once 'models/producto.php';

class ProductoController {

    public function index() {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        $cont=0;
        
        //Mostrar productos
        require_once 'views/producto/destacados.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $produc = new Producto();
        $productos = $produc->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save() {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            //Guardar imagen
            if(isset($_FILES['imagen'])){
                $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : false;
                if ($imagen) {
                    $name_img = $imagen['name'];
                    $type_img = $imagen['type'];
                    $ruta_img = $imagen['tmp_name'];

                    if ($type_img == "image/jpg" || $type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/gif") {
                        if (!is_dir("upload/images")) {
                            mkdir("upload/images", 0777, true);
                        }
                        move_uploaded_file($ruta_img, "upload/images/" . $name_img);
                    }
                }
            }
            
            if ($nombre && $descripcion && $precio && $stock && $categoria && $imagen) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                $producto->setImagen($name_img);
                                    
                if(isset($_GET["id"])){
                    $ID = $_GET["id"];
                    $producto->setId($ID);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }
                
                if ($save) {
                    $_SESSION["producto"] = "complete";
                } else {
                    $_SESSION["producto"] = "failed";
                }
               
            } else {
                $_SESSION["producto"] = "failed";
            }
        } else {
            $_SESSION["producto"] = "failed";
        }
        
        header("Location:" . base_url . "Producto/gestion");
    }

    public function editar() {
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $editar = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
           
           require_once 'views/producto/crear.php';
        }
    }
    

    public function eliminar() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $delete = $producto->delete();
        }
        if ($delete) {
            $_SESSION['delete'] = "complete";
        }
        $_SESSION['delete'] = "failed";
        header("Location:".base_url."Producto/gestion");
    }
    
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
           
           require_once 'views/producto/ver.php';
        }
    }
    

}
