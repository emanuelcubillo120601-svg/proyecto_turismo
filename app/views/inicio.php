<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Costa Rica Travel</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7f6;
            color: #222;
        }

        a {
            text-decoration: none;
        }

        /* HEADER */

        .main-header {
            background: #123f2d;
            padding: 18px 30px;
        }

        .main-nav {
            max-width: 1200px;
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 25px;
        }

        .main-nav nav {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .main-nav nav a {
            color: white;
            font-weight: bold;
        }

        .nav-login {
            border: 1px solid white;
            padding: 10px 17px;
            border-radius: 8px;
        }

        /* HERO */

        .hero {
            min-height: 560px;

            background: linear-gradient(
                135deg,
                #0e4b32,
                #23865d
            );

            display: flex;
            align-items: center;
        }

        .hero-content {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 70px 30px;
            color: white;
        }

        .hero-tag {
            display: inline-block;

            padding: 8px 15px;

            background: rgba(255, 255, 255, 0.15);

            border-radius: 25px;

            margin-bottom: 18px;

            font-weight: bold;
        }

        .hero-content h1 {
            max-width: 700px;

            font-size: 58px;

            line-height: 1.1;

            margin-bottom: 20px;
        }

        .hero-content p {
            max-width: 650px;

            font-size: 20px;

            line-height: 1.6;

            color: #e9f4ef;
        }

        .hero-buttons {
            margin-top: 30px;

            display: flex;

            gap: 15px;
        }

        .btn-primary {
            display: inline-block;

            background: white;

            color: #146b46;

            padding: 14px 24px;

            border-radius: 8px;

            font-weight: bold;
        }

        .btn-secondary {
            display: inline-block;

            color: white;

            padding: 13px 24px;

            border: 1px solid white;

            border-radius: 8px;

            font-weight: bold;
        }

        /* SECCIONES */

        .section {
            max-width: 1200px;

            margin: auto;

            padding: 80px 25px;
        }

        .section-heading {
            text-align: center;

            margin-bottom: 40px;
        }

        .section-heading span {
            color: #146b46;

            font-weight: bold;

            text-transform: uppercase;

            font-size: 14px;
        }

        .section-heading h2 {
            font-size: 36px;

            margin: 10px 0;
        }

        .section-heading p {
            max-width: 650px;

            margin: auto;

            color: #666;

            line-height: 1.6;
        }

        /* DESTINOS */

        .destination-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(250px, 1fr));

            gap: 25px;
        }

        .destination-card {
            background: white;

            border-radius: 15px;

            overflow: hidden;

            box-shadow:
                0 8px 22px rgba(0, 0, 0, 0.08);
        }

        .destination-top {
            height: 110px;

            background: linear-gradient(
                135deg,
                #146b46,
                #4ea878
            );
        }

        .destination-content {
            padding: 24px;
        }

        .destination-content span {
            color: #146b46;

            font-size: 14px;

            font-weight: bold;
        }

        .destination-content h3 {
            font-size: 24px;

            margin: 7px 0 10px;
        }

        .destination-content p {
            color: #666;

            line-height: 1.6;
        }

        /* SERVICIOS */

        .services {
            background: #e8f2ed;

            padding: 80px 25px;
        }

        .services-container {
            max-width: 1200px;

            margin: auto;
        }

        .services-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));

            gap: 20px;
        }

        .service-card {
            background: white;

            padding: 30px;

            border-radius: 14px;

            text-align: center;

            box-shadow:
                0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .service-icon {
            width: 55px;

            height: 55px;

            margin: 0 auto 18px;

            border-radius: 50%;

            background: #d7ede2;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 26px;
        }

        .service-card h3 {
            margin-bottom: 10px;

            color: #146b46;
        }

        .service-card p {
            color: #666;

            line-height: 1.6;
        }

        /* CTA */

        .cta {
            max-width: 1100px;

            margin: 70px auto;

            padding: 40px;

            background: #146b46;

            color: white;

            border-radius: 18px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 25px;
        }

        .cta h2 {
            margin-bottom: 8px;
        }

        .cta p {
            color: #e3f1ea;
        }

        .cta a {
            background: white;

            color: #146b46;

            padding: 13px 22px;

            border-radius: 8px;

            font-weight: bold;

            white-space: nowrap;
        }

        /* FOOTER */

        footer {
            background: #10271e;

            color: white;

            text-align: center;

            padding: 28px;
        }

        footer p {
            margin: 5px;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {

            .main-nav {
                flex-direction: column;

                gap: 15px;
            }

            .main-nav nav {
                flex-wrap: wrap;

                justify-content: center;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .hero-buttons {
                flex-direction: column;

                align-items: flex-start;
            }

            .cta {
                margin: 50px 20px;

                flex-direction: column;

                text-align: center;
            }
        }

    </style>

</head>

<body>

    <header class="main-header">

        <div class="main-nav">

            <h2 class="logo">
                Costa Rica Travel
            </h2>

            <nav>

                <a href="?page=inicio">
                    Inicio
                </a>

                <a href="#destinos">
                    Destinos
                </a>

                <a href="#servicios">
                    Servicios
                </a>

                <a
                    href="?page=login"
                    class="nav-login"
                >
                    Iniciar sesión
                </a>

            </nav>

        </div>

    </header>


    <main>

        <section class="hero">

            <div class="hero-content">

                <span class="hero-tag">
                    Descubre Costa Rica
                </span>

                <h1>
                    Tu próxima aventura comienza aquí
                </h1>

                <p>
                    Descubre destinos, hospedajes y experiencias
                    turísticas para disfrutar lo mejor de Costa Rica.
                </p>

                <div class="hero-buttons">

                    <a
                        href="?page=registro"
                        class="btn-primary"
                    >
                        Crear una cuenta
                    </a>

                    <a
                        href="?page=login"
                        class="btn-secondary"
                    >
                        Iniciar sesión
                    </a>

                </div>

            </div>

        </section>


        <section
            class="section"
            id="destinos"
        >

            <div class="section-heading">

                <span>
                    Explora
                </span>

                <h2>
                    Destinos destacados
                </h2>

                <p>
                    Conoce algunos de los destinos turísticos
                    que estarán disponibles dentro de la plataforma.
                </p>

            </div>


            <div class="destination-grid">

                <article class="destination-card">

                    <div class="destination-top"></div>

                    <div class="destination-content">

                        <span>
                            Limón
                        </span>

                        <h3>
                            Puerto Viejo
                        </h3>

                        <p>
                            Caribe, naturaleza, playas y cultura
                            en uno de los destinos más reconocidos
                            de Limón.
                        </p>

                    </div>

                </article>


                <article class="destination-card">

                    <div class="destination-top"></div>

                    <div class="destination-content">

                        <span>
                            Alajuela
                        </span>

                        <h3>
                            La Fortuna
                        </h3>

                        <p>
                            Disfruta aventura, naturaleza,
                            aguas termales y el Volcán Arenal.
                        </p>

                    </div>

                </article>


                <article class="destination-card">

                    <div class="destination-top"></div>

                    <div class="destination-content">

                        <span>
                            Puntarenas
                        </span>

                        <h3>
                            Manuel Antonio
                        </h3>

                        <p>
                            Un destino reconocido por sus playas,
                            naturaleza y gran biodiversidad.
                        </p>

                    </div>

                </article>

            </div>

        </section>


        <section
            class="services"
            id="servicios"
        >

            <div class="services-container">

                <div class="section-heading">

                    <span>
                        Nuestra plataforma
                    </span>

                    <h2>
                        Todo para organizar tu viaje
                    </h2>

                </div>


                <div class="services-grid">

                    <div class="service-card">

                        <div class="service-icon">
                            ◉
                        </div>

                        <h3>
                            Destinos
                        </h3>

                        <p>
                            Consulta información sobre distintos
                            destinos turísticos de Costa Rica.
                        </p>

                    </div>


                    <div class="service-card">

                        <div class="service-icon">
                            H
                        </div>

                        <h3>
                            Hoteles
                        </h3>

                        <p>
                            Busca opciones de hospedaje y consulta
                            precios e información relevante.
                        </p>

                    </div>


                    <div class="service-card">

                        <div class="service-icon">
                            A
                        </div>

                        <h3>
                            Actividades
                        </h3>

                        <p>
                            Descubre tours, aventuras y diferentes
                            actividades turísticas.
                        </p>

                    </div>


                    <div class="service-card">

                        <div class="service-icon">
                            R
                        </div>

                        <h3>
                            Reservaciones
                        </h3>

                        <p>
                            Administra tus reservaciones desde
                            una misma plataforma.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <section class="cta">

            <div>

                <h2>
                    Comienza a explorar Costa Rica
                </h2>

                <p>
                    Regístrate para acceder a destinos,
                    hoteles, actividades y reservaciones.
                </p>

            </div>

            <a href="?page=registro">
                Crear cuenta
            </a>

        </section>

    </main>


    <footer>

        <p>
            Costa Rica Travel
        </p>

        <p>
            Sistema Web de Gestión Turística
        </p>

    </footer>

</body>

</html>