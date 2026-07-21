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
}