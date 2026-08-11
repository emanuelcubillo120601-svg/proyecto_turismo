<?php

$page = $_GET["page"] ?? "inicio";

switch ($page) {

case "inicio":

    require_once __DIR__ . "/../app/views/inicio.php";

    break;


    case "registro":

        require_once __DIR__ . "/../app/views/auth/registro.php";

        break;


    case "procesar-registro":

        require_once __DIR__ . "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->registrar();

        break;


    case "login":

        require_once __DIR__ . "/../app/views/auth/login.php";

        break;


    case "procesar-login":

        require_once __DIR__ . "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->login();

        break;


    case "cliente":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ . "/../app/views/cliente/inicio.php";

        break;


    case "admin":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ . "/../app/views/admin/dashboard.php";

        break;


    case "logout":

        require_once __DIR__ . "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->logout();

        break;


    default:

        http_response_code(404);

        echo "<h1>Error 404</h1>";

        echo "<p>La página solicitada no existe.</p>";

        break;

    case "admin-destinos":

        require_once __DIR__ . "/../app/controllers/DestinoController.php";

        $controller = new DestinoController();

        $controller->index();

    break;

    case "admin-destino-crear":

    require_once __DIR__ . "/../app/controllers/DestinoController.php";

    $controller = new DestinoController();
    $controller->crear();

    break;

    case "admin-destino-editar":

    require_once __DIR__ .
        "/../app/controllers/DestinoController.php";

    $controller = new DestinoController();

    $controller->editar();

    break;


case "admin-destino-estado":

    require_once __DIR__ .
        "/../app/controllers/DestinoController.php";

    $controller = new DestinoController();

    $controller->estado();

    break;

    case "admin-hoteles":

    require_once __DIR__ .
        "/../app/controllers/HotelController.php";

    $controller = new HotelController();
    $controller->index();

    break;


case "admin-hotel-crear":

    require_once __DIR__ .
        "/../app/controllers/HotelController.php";

    $controller = new HotelController();
    $controller->crear();

    break;


case "admin-hotel-editar":

    require_once __DIR__ .
        "/../app/controllers/HotelController.php";

    $controller = new HotelController();
    $controller->editar();

    break;


case "admin-hotel-estado":

    require_once __DIR__ .
        "/../app/controllers/HotelController.php";

    $controller = new HotelController();
    $controller->estado();

    break;

    case "admin-actividades":

    require_once __DIR__ .
        "/../app/controllers/ActividadController.php";

    $controller = new ActividadController();

    $controller->index();

    break;


case "admin-actividad-crear":

    require_once __DIR__ .
        "/../app/controllers/ActividadController.php";

    $controller = new ActividadController();

    $controller->crear();

    break;


case "admin-actividad-editar":

    require_once __DIR__ .
        "/../app/controllers/ActividadController.php";

    $controller = new ActividadController();

    $controller->editar();

    break;


case "admin-actividad-estado":

    require_once __DIR__ .
        "/../app/controllers/ActividadController.php";

    $controller = new ActividadController();

    $controller->estado();

    break;
}