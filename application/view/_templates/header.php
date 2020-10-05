<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Simple | <?= $this->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?php echo Config::get('URL'); ?>" target="_self">
    <link rel="stylesheet" href="css/nunito.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WtHCcd/cf7tgVgrBTucEDmIODJvuLRMmErKYMf+4ufedHtePtRc1h2IPoz+O0ulr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">
    <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-yxolr0nejIh7GnnJJm13oIZeW2Q5Ff2CTTK+m3JSRl99Ju9d2nDM7KIPltH9yazb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-g02mOn8VgCJQQd4OETlDfJh2lWAbN++A6o0vd7uTMM05/mfCm2+D494FMz/HHQvv%" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#b71923">
    <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
    <meta name="theme-color" content="#b71923">
    <meta name="Description" content="Framework MCV de WeTrust para el desarrollo de plataformas web.">
    <meta property="og:title" content="Simple | <?= $this->title; ?>">
    <meta property="og:description" content="Framework MCV de WeTrust para el desarrollo de plataformas web.">
    <meta property="og:url" content="<?php echo Config::get('URL'); ?>">
    <meta property="og:locale" content="es_CL">
    <meta property="og:image" content="<?php echo Config::get('URL'); ?>images/graph_logo.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Simple | <?= $this->title; ?>">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top sombra">
        <div class="container">
            <a class="navbar-brand" href="<?php echo Config::get('URL'); ?>">
                <img width="120" height="30" class="d-inline-block align-center" alt="" loading="lazy" class="img-fluid" src="images/logo.svg" alt="Logo WeTrust Technology">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHome">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if (View::checkForActiveController($filename, "index")) { echo 'active'; } ?>">
                        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if (Session::userIsLoggedIn()) { ?>
                        <li class="nav-item <?php if (View::checkForActiveController($filename, "dashboard")) { echo 'active'; } ?>">
                            <a class="nav-link" href="dashboard">Tablero</a>
                        </li>
                        <li class="nav-item <?php if (View::checkForActiveController($filename, "note")) { echo 'active'; } ?>">
                            <a class="nav-link" href="note">Mis Notas</a>
                        </li>
                        <?php if ($this->modulos) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulos</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach($this->modulos as $key => $value) { ?>
                                    <a class="dropdown-item" href="<?= $value->module_url; ?>"><?= $value->module_menu; ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="nav-item <?php if (View::checkForActiveController($filename, "register/index")) { echo 'active'; } ?>">
                            <a class="nav-link" href="register">Registrar</a>
                        </li>
                    <?php } ?>
                </ul>
                <?php if (Session::userIsLoggedIn()) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= Session::get('user_avatar_file'); ?>" width="30" height="30" alt="<?php echo Session::get('user_name'); ?> avatar" loading="lazy"></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                                <a class="dropdown-item" href="user">Mi cuenta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user/editAvatar">Modificar avatar</a>
                                <a class="dropdown-item" href="user/editusername">Cambiar mi nombre de usuario</a>
                                <a class="dropdown-item" href="user/edituseremail">Cambiar mi correo</a>
                                <a class="dropdown-item" href="user/changePassword">Cambiar mi contraseña</a>
                                <a class="dropdown-item" href="login/logout">Salir</a>
                                <div class="dropdown-divider"></div>
                                <?php if (Session::get("user_account_type") == 7) : ?>
                                    <a class="dropdown-item <?php if (View::checkForActiveController($filename, "admin")) {echo 'active';} ?>" href="admin">Admin</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if (View::checkForActiveController($filename, "login/index")) { echo 'active'; } ?>">
                            <a class="btn btn-outline-danger my-2 my-sm-0" href="<?php echo Config::get('URL'); ?>login">Ingresar</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>