<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=BASE_URL?>css/styles.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Header -->
    <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?=BASE_URL?>">
            <i class="fab fa-apple"></i> SuperLists
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <?php if( !isset($_SESSION['usuario']) ): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-important" href="http://localhost:8080/superlists/register">Registro</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Listas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Mis Listas</a>
                            <a class="dropdown-item" href="<?=BASE_URL?>create_list">Crear Lista</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>profile"><?=$_SESSION['usuario']['username']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-important" href="http://localhost:8080/superlists/logout">Logout</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header -->