<!DOCTYPE html>
<html lang="es">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logitech - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>

    <nav class="navbar navbar-light bg-success fixed-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Logitech</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logitech</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown mt-2 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" 
                                data-bs-toggle="dropdown" aria-expanded="false">Listados</a>
                            <ul class="dropdown-menu navbar-dark bg-light" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item navbar-dark" href="categorias">Categoria</a></li>
                                <li><a class="dropdown-item navbar-dark" href="productos">Productos</a></li>
                            </ul>
                        </li>
                        {* <li class="nav-item ms-auto">
                                {if isset($smarty.session.USER_ID)} 
                                    <a class="nav-link" href="logout">{$smarty.session.USER_EMAIL} Logout</a>
                                {else}
                                    <a class="nav-link" href="login">Iniciar Sesión</a>
                                {/if}
                        </li> *}
                </ul>
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </div>
    </nav>

        

    </header>
    
    <!-- inicia el contenido principal -->
    <div class="container">