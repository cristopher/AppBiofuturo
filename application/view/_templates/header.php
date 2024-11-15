<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>App Terreno | <?= $this->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?= Config::get('URL'); ?>" target="_self">
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
    <meta property="og:title" content="App Terreno | <?= $this->title; ?>">
    <meta property="og:description" content="Framework MCV de WeTrust para el desarrollo de plataformas web.">
    <meta property="og:url" content="<?= Config::get('URL'); ?>">
    <meta property="og:locale" content="es_CL">
    <meta property="og:image" content="<?= Config::get('URL'); ?>images/graph_logo.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="App Terreno  | <?= $this->title; ?>">
</head>
<body class="wetrust">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-none d-lg-block" href="<?= Config::get('URL'); ?>">
                <img width="95" height="30" class="d-inline-block align-center" alt="" loading="lazy" class="img-fluid" src="images/logo.png" alt="Logo Biofuturo">
            </a>
            <a class="navbar-brand d-block d-lg-none mr-0" href="<?= Config::get('URL'); ?>">
                <img width="95" height="30" class="d-inline-block align-center" alt="" loading="lazy" class="img-fluid" src="images/logo.png" alt="Logo Biofuturo">
            </a>
            <?php if (Session::userIsLoggedIn() == false) { ?>
                <div class="nav-item d-block d-lg-none">
                    <a class="nav-link" href="<?= Config::get('URL'); ?>login" title="Ingresar">
                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-door-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z"></path>
                            <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z"></path>
                            <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z"></path>
                        </svg>
                    </a>
                </div>
            <?php } else { ?>
                <div class="nav-item dropdown d-block d-lg-none">
                    <a class="nav-link dropdown-toggle p-2 text-center" href="#" id="navbarUserPhone" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" src="<?= Session::get('user_avatar_file'); ?>" width="30" height="30" alt="<?= Session::get('user_name'); ?> avatar" loading="lazy"></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserPhone">
                        <a class="dropdown-item" href="user">
                            <div class="d-flex justify-content-between align-items-center">
                                Mi cuenta
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-gear-wide-connected" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 0 0-9.995 4.998 4.998 0 0 0 0 9.996z"/><path fill-rule="evenodd" d="M7.375 8L4.602 4.302l.8-.6L8.25 7.5h4.748v1H8.25L5.4 12.298l-.8-.6L7.376 8z"/></svg>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login/logout">
                            <div class="d-flex justify-content-between align-items-center">
                                Salir
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/></svg>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php if (Session::get("user_account_type") == 7) : ?>
                        <a class="dropdown-item <?= (View::checkForActiveController($filename, "admin") == true) ? 'active' : ''; ?>" href="admin">
                            <div class="d-flex justify-content-between align-items-center">
                                Admin
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/></svg>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="collapse navbar-collapse" id="navbarHome">
                <ul class="navbar-nav mr-auto">
                    <div class="dropdown-divider"></div>
                    <?php if (Session::userIsLoggedIn()) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-center <?= (View::checkForActiveController($filename, "dashboard") == true) ? 'active' : ''; ?>" href="dashboard">Tablero</a>
                        </li>
                        <?php if ($this->modulos) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mb-3 mb-md-0 text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulos</a>
                                <div class="dropdown-menu mb-3 mb-lg-0" aria-labelledby="navbarDropdown">
                                    <?php foreach($this->modulos as $key => $value) { ?>
                                    <a class="dropdown-item" href="<?= $value->module_url; ?>">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="mr-lg-2"><?= $value->module_menu; ?></span>
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><?= $value->module_icon; ?></svg>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item">
                            <a class="nav-link text-center <?= (View::checkForActiveController($filename, "register") == true) ? 'active' : ''; ?>" href="register">Registrar</a>
                        </li>
                    <?php } ?>
                </ul>
                <?php if (Session::userIsLoggedIn()) { ?>
                    <ul class="navbar-nav d-none d-lg-block">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mb-3 mb-md-0 text-center" href="#" id="navbarUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" src="<?= Session::get('user_avatar_file'); ?>" width="30" height="30" alt="<?= Session::get('user_name'); ?> avatar" loading="lazy"> <?= Session::get('user_name'); ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                                <a class="dropdown-item" href="user">
                                    <div class="d-flex justify-content-between align-items-center">
                                        Mi cuenta
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-gear-wide-connected" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 0 0-9.995 4.998 4.998 0 0 0 0 9.996z"/><path fill-rule="evenodd" d="M7.375 8L4.602 4.302l.8-.6L8.25 7.5h4.748v1H8.25L5.4 12.298l-.8-.6L7.376 8z"/></svg>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login/logout">
                                    <div class="d-flex justify-content-between align-items-center">
                                        Salir
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/></svg>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <?php if (Session::get("user_account_type") == 7) : ?>
                                    <a class="dropdown-item <?= (View::checkForActiveController($filename, "admin") == true) ? 'active' : ''; ?>" href="admin">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Admin
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/></svg>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-lg-block <?= (View::checkForActiveController($filename, "login/index") == true) ? 'active' : ''; ?>">
                            <a class="btn my-2 my-sm-0" href="<?= Config::get('URL'); ?>login">Ingresar</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>