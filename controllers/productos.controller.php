<?php

require_once('models/producto.model.php');
require_once('views/producto.view.php');
require_once('helpers/auth.helper.php');

class ProductoController {

    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
        $this->authHelper = new AuthHelper();
    }

    // Muestra la pantalla principal de Home Productos
    function showHome() {
        $this->view->getHome();
    }
   
    //public function showProduct() {
    //     $productos = $this->model->obtenerProductos();
    //     $this->view->showProduct($productos);
    // }

    // Muestra el listado de categorías con los botones
    public function showCategories() {
        $categorias = $this->model->obtenerCategorias();
        $this->view->showCategories($categorias);
    }

    // Muestra el listado de productos con los botones
    function showProducts() {
        $productos = $this->model->obtenerProductos();
        $this->view->showProducts($productos);
    }

    // Muestra los productos por categoria
    function showProductsOfCategory($idCat) {
        $productos = $this->model->obtenerProductosOfCategory($idCat); ////////
        $this->view->showProducts($productos);
    }

    // Muestra el detalle del producto
    function viewDetailProduct($id) {
        $producto = $this->model->obtenerProducto($id);
        $categoria = $this->model->obtenerCategoria($producto->categoria);
        $this->view->showDetailProduct($producto, $categoria);
    }

    // Muestra el detalle de la categoria
    function viewDetailCategory($id) {
        $categoria = $this->model->obtenerCategoria($id);
        $this->view->showDetailCategory($categoria);
    }

    // Agrega un producto
    function addProduct() {
        $this->authHelper->checkLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
            $sku = $_REQUEST['sku'];
            $descripcion = $_REQUEST['descripcion'];
            $precio = $_REQUEST['precio'];
            $categoria = $_REQUEST['categoria'];
            $stock = $_REQUEST['stock'];
            $this->model->agregarProducto($sku, $descripcion, $precio, $categoria, $stock);
            header("Location: " . BASE_URL); 
        }
        else {
            $categorias = $this->model->obtenerCategorias();
            $this->view->formAltaProducto($categorias);            
        }

    }

    // Agrega una categoria
    function addCategory() {
        $this->authHelper->checkLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $descripcion = $_REQUEST['descripcion'];
            $this->model->agregarCategoria($descripcion);
            header("Location: " . BASE_URL); 
        } 
        else {
            $this->view->formAltaCategoria();
        }
        
        
    }

    // Elimina un producto
    function delProducto($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->borrarProducto($id);
        header("Location: " . BASE_URL. "listProducts");
    }

    // Elimina una categoria
    function delCategoria($id) {
        $this->authHelper->checkLoggedIn();
        $productos = $this->model->obtenerProductos();     
        $categoria = $this->model->obtenerCategoria($id);  
        $existeCategoria = FALSE;
        $cantProductos = count($productos);
        $indice = 0;
        while (($existeCategoria == FALSE) && ($indice < $cantProductos)) {
                if ($categoria->descripcion == $productos[$indice]->categoria){
                    $existeCategoria = TRUE;
                }
                $indice++;
        }
        if ($existeCategoria == FALSE) {
            $this->model->borrarCategoria($id);      
            header("Location: " . BASE_URL. "listCategories");
        }
        else {
            $this->view->showErrorCategory("No es posible eliminar la categoria porque tiene productos asociados.");
        } 
    }

    // Edita el formulario para modificar un producto
    function formEditProduct($id) {
        $this->authHelper->checkLoggedIn();
        $producto = $this->model->obtenerProducto($id);
        $categorias = $this->model->obtenerCategorias();
        $this->view->showModifyProduct($producto, $categorias);
    }

    // Edita el formulario para modificar una categoria
    function formEditCategory($id) {
        $this->authHelper->checkLoggedIn();
        $categoria = $this->model->obtenerCategoria($id);
        $this->view->showModifyCategory($categoria);
    }

    // Mofifica el producto elegido
    function getModifyProduct($id){
        $this->authHelper->checkLoggedIn();
        
        if ((isset($_GET['sku']) || !empty($_GET['sku'])) && 
           (isset($_GET['descripcion']) || !empty($_GET['descripcion'])) &&
           (isset($_GET['precio']) || !empty($_GET['precio'])) &&
           (isset($_GET['categoria']) || !empty($_GET['categoria'])) &&
           (isset($_GET['stock']) || !empty($_GET['stock']))) {
           $newSku = $_GET['sku'];
           $newDescripcion = $_GET['descripcion'];
           $newPrecio = $_GET['precio'];
           $newCategoria = $_GET['categoria'];
           $newStock = $_GET['stock'];
           $this->model->modificarProducto($id, $newSku, $newDescripcion, $newPrecio, $newCategoria, $newStock);
           header("Location: " . BASE_URL. "listProducts"); 
        }
    }

    // Modifica la categoria elegida
    function getModifyCategory($id){
        $this->authHelper->checkLoggedIn();
        
        if ((isset($_GET['descripcion']) || !empty($_GET['descripcion']))) {
            $newDescripcion = $_GET['descripcion'];
            $this->model->modificarCategoria($id, $newDescripcion);
            header("Location: " . BASE_URL. "listCategories"); 
        }
    }

}