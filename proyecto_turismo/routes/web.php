<?php

$page = $_GET["page"] ?? "inicio";

switch ($page) {

    // ==========================
    // PÁGINA PRINCIPAL
    // ==========================

    case "inicio":

        require_once __DIR__ . "/../app/views/inicio.php";

        break;


    // ==========================
    // AUTENTICACIÓN
    // ==========================

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


    case "logout":

        require_once __DIR__ . "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->logout();

        break;


    case "recuperar-password":

        require_once __DIR__ .
            "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->recuperarPassword();

        break;


    case "restablecer-password":

        require_once __DIR__ .
            "/../app/controllers/AuthController.php";

        $controller = new AuthController();

        $controller->restablecerPassword();

        break;


    // ==========================
    // CLIENTE
    // ==========================

    case "cliente":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ . "/../app/views/cliente/inicio.php";

        break;


    case "destinos":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ClienteController.php";

        $controller = new ClienteController();

        $controller->destinos();

        break;


    case "hoteles":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ClienteController.php";

        $controller = new ClienteController();

        $controller->hoteles();

        break;


    case "actividades":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ClienteController.php";

        $controller = new ClienteController();

        $controller->actividades();

        break;


    case "perfil":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/PerfilController.php";

        $controller = new PerfilController();

        $controller->index();

        break;


    case "perfil-actualizar":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/PerfilController.php";

        $controller = new PerfilController();

        $controller->actualizar();

        break;


    case "perfil-password":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/PerfilController.php";

        $controller = new PerfilController();

        $controller->cambiarPassword();

        break;


    // ==========================
    // RESERVACIONES CLIENTE
    // ==========================

    case "reservar":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ReservaController.php";

        $controller = new ReservaController();

        $controller->crear();

        break;


    case "mis-reservas":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ReservaController.php";

        $controller = new ReservaController();

        $controller->misReservas();

        break;


    // ==========================
    // FAVORITOS
    // ==========================

    case "favorito":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/FavoritoController.php";

        $controller = new FavoritoController();

        $controller->alternar();

        break;


    case "favoritos":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/FavoritoController.php";

        $controller = new FavoritoController();

        $controller->index();

        break;


    // ==========================
    // COMENTARIOS
    // ==========================

    case "comentario-crear":

        if (!isset($_SESSION["usuario_id"])) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ComentarioController.php";

        $controller = new ComentarioController();

        $controller->crear();

        break;


    // ==========================
    // PANEL ADMINISTRADOR
    // ==========================

    case "admin":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/views/admin/dashboard.php";

        break;


    // ==========================
    // ADMIN - USUARIOS
    // ==========================

    case "admin-usuarios":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/UsuarioController.php";

        $controller = new UsuarioController();

        $controller->index();

        break;


    case "admin-usuario-estado":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/UsuarioController.php";

        $controller = new UsuarioController();

        $controller->estado();

        break;


    // ==========================
    // ADMIN - DESTINOS
    // ==========================

    case "admin-destinos":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/DestinoController.php";

        $controller = new DestinoController();

        $controller->index();

        break;


    case "admin-destino-crear":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/DestinoController.php";

        $controller = new DestinoController();

        $controller->crear();

        break;


    case "admin-destino-editar":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/DestinoController.php";

        $controller = new DestinoController();

        $controller->editar();

        break;


    case "admin-destino-estado":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/DestinoController.php";

        $controller = new DestinoController();

        $controller->estado();

        break;


    // ==========================
    // ADMIN - HOTELES
    // ==========================

    case "admin-hoteles":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/HotelController.php";

        $controller = new HotelController();

        $controller->index();

        break;


    case "admin-hotel-crear":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/HotelController.php";

        $controller = new HotelController();

        $controller->crear();

        break;


    case "admin-hotel-editar":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/HotelController.php";

        $controller = new HotelController();

        $controller->editar();

        break;


    case "admin-hotel-estado":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/HotelController.php";

        $controller = new HotelController();

        $controller->estado();

        break;


    // ==========================
    // ADMIN - ACTIVIDADES
    // ==========================

    case "admin-actividades":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ActividadController.php";

        $controller = new ActividadController();

        $controller->index();

        break;


    case "admin-actividad-crear":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ActividadController.php";

        $controller = new ActividadController();

        $controller->crear();

        break;


    case "admin-actividad-editar":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ActividadController.php";

        $controller = new ActividadController();

        $controller->editar();

        break;


    case "admin-actividad-estado":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ActividadController.php";

        $controller = new ActividadController();

        $controller->estado();

        break;


    // ==========================
    // ADMIN - RESERVACIONES
    // ==========================

    case "admin-reservas":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ReservaController.php";

        $controller = new ReservaController();

        $controller->admin();

        break;


    // ==========================
    // REPORTES
    // ==========================

    case "reportes":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/ReporteController.php";

        $controller = new ReporteController();

        $controller->index();

        break;


    // ==========================
    // BITÁCORA
    // ==========================

    case "bitacora":

        if (
            !isset($_SESSION["usuario_id"]) ||
            (int)$_SESSION["rol_id"] !== 1
        ) {

            header("Location: ?page=login");

            exit;
        }

        require_once __DIR__ .
            "/../app/controllers/BitacoraController.php";

        $controller = new BitacoraController();

        $controller->index();

        break;


    // ==========================
    // ERROR 404
    // ==========================

    default:

        http_response_code(404);

        echo "<h1>Error 404</h1>";

        echo "<p>La página solicitada no existe.</p>";

        break;
}