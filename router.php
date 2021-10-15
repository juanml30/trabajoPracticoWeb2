<?php
    require_once 'controllers/productos.controller.php';
    require_once 'controllers/login.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    else {
        $action = 'home';
    }

    $params = explode('/', $action);
 
    switch ($params[0]) {
        
        case 'home':
            $controller = new ProductoController();
            $controller->showHome(); 
            break;
        case 'addCategory':
            $controller = new ProductoController();
            $controller->addCategory(); 
            break;
        case 'addProduct':
            $controller = new ProductoController();
            $controller->addProduct(); 
            break;
        case 'categorias':
            $controller = new ProductoController();
            $controller->showCategories(); 
            break;
        case 'productos':
            $controller = new ProductoController();
            $controller->showProducts(); 
            break;
        case 'login':
            $authController = new AuthController();
            $authController->showLogin(); 
            break;
        case 'logout': 
            $authController = new AuthController();
            $authController->logout(); 
            break;  
        case 'verify': 
            $authController = new AuthController();
            $authController->login(); 
            break;
       
        case 'delProduct':
            $controller = new ProductoController();
            $controller->delProducto($params[1]); 
            break;
        case 'delCategory':
            $controller = new ProductoController();
            $controller->delCategoria($params[1]);  
            break;
        case 'EditProduct':
            $controller = new ProductoController();
            $controller->formEditProduct($params[1]);  
            break;
        case 'EditCategory':
            $controller = new ProductoController();
            $controller->formEditCategory($params[1]); 
            break;
        case 'modificar':
            $controller = new ProductoController();
            $controller->getModifyProduct($params[1]);  
            break;
        case 'modificarCategoria':
            $controller = new ProductoController();
            $controller->getModifyCategory($params[1]);  
            break;
        case 'VerDetalleProducto':
            $controller = new ProductoController();
            $controller->viewDetailProduct($params[1]);  
            break;
        case 'VerDetalleCategoria':
            $controller = new ProductoController();
            $controller->viewDetailCategory($params[1]);  
            break;    
        case 'verProductosAsociados':
            $controller = new ProductoController();
            $controller->showProductsOfCategory($params[1]);  
            break;
        default:
            echo '404 - Página no encontrada';
            break;
}