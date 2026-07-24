<?php
    session_start();
    if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$pagina = isset($_GET['page']) ? $_GET['page'] : 'inicio';
    $paginas_permitidas = ['inicio', 'sobre-nosotros', 'contacto', 'preguntas', 'terminos', 'privacidad'];
    if (!in_array($pagina, $paginas_permitidas)) {
    $pagina = 'inicio';
}

$titulos = [
    'inicio' => 'Majonet',
    'sobre-nosotros' => 'Sobre nosotros - Majonet',
    'contacto' => 'Contacto - Majonet',
    'preguntas' => 'Preguntas frecuentes - Majonet',
    'terminos' => 'Términos y condiciones - Majonet',
    'privacidad' => 'Política de privacidad - Majonet',
];
$titulo = $titulos[$pagina];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($titulo) ?></title>
        <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime('assets/css/style.css') ?>">
        <link rel="stylesheet" href="assets/css/responsive.css?v=<?= filemtime('assets/css/responsive.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Momo+Trust+Display&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
        <style>html{scroll-behavior:smooth;}</style>
    </head>
    <body>

        <?php include 'includes/header.php'; ?>

        <?php if ($pagina === 'inicio'): ?>

        <!-- HERO -->
        <section class="hero" id="inicio">
            <div class="hero-info">
                <h1>Majonet <span class="sas">S.A.S</span></h1>
                <h2>Internet de alta velocidad por fibra óptica</h2>
                <p>
                    Estudio | Entretenimiento | Hogares | Empresas
                </p>
                <div class="hero-buttons">
                        <a href="#contacto" class="btn">Sé parte de nosotros</a>
                        <a href="#faq" class="btn-outline">Preguntas frecuentes</a>            
                </div>    
            </div>
        </section>

        <!-- BANNER -->
        <section class="banner" id="planes"> 
        <h1 >INSTALACION GRATIS</h1>
        <p>En todos nuestros planes</p>
        </section>

        <!-- PLANES -->
            <section class="planes">
            <h2>Planes y promociones</h2>
                <div class="cards">
                    <div class="card-wrap">
                        <div class="card-header one">
                            <i class="fas fa-code">60MB</i>
                        </div>
                        <div class="card-content">
                            <h1 class="card-title">$20.55/mes</h1>
                            <h1 class="card-text">Instalacion sin costo</h1>
                            <br><br><br><br><br>
                                <p class="card-text">*Precio incluye IVA</p>
                                <a class="card-btn one" href="#contacto">Me interesa</a>
                            </div>
                        </div>
                    <!--<div class="card">
                        <h1 class="backnum">60</h1>
                        <h3>Plan Básico</h3>                        
                        <h1>60</h1>
                        <p>MEGAS</p>
                        <span>$20.55/mes</span>
                        <span>Instalacion Gratis</span>
                        <div class="txt">
                            <p>*Precio incluye IVA</p>
                        </div>
                        <a href="#contacto" class="buttonCard">¡Me interesa!</a>
                    </div>

                    <div class="card">
                        <h3>Plan Estándar</h3>
                        <h1>70</h1>
                        <p>MEGAS</p>
                        <span>$25.75/mes</span>
                        <span>Instalacion Gratis</span>
                        <div class="txt">
                            <p>*Precio incluye IVA</p>
                        </div>
                        <a href="#contacto" class="buttonCard">¡Me interesa!</a>
                    </div>

                    <div class="card">
                        <h3>Plan Plus</h3>
                        <h1>100</h1>
                        <p>MEGAS</p>
                        <span>$30.55/mes</span>
                        <span>Instalacion Gratis</span>
                        <div class="txt">
                            <p>*Precio incluye IVA</p>
                        </div>
                        <a href="#contacto" class="buttonCard">¡Me interesa!</a>
                    </div>-->

                    <div class="card-zapping">
                        <h3><span>ZAPPING</span></h3>
                        <h1>52</h1>
                        <p>CANALES</p>
                        <span>$5.25/mes</span>
                        <span style="border-bottom:0px;">Televisión en vivo por internet</span>
                        <div class="txt">
                            <p>*Precio incluye IVA</p>
                        </div>
                        <a href="#contacto" class="buttonCard">¡Me interesa!</a>
                    </div>

                </div>
            </section>

        <!-- FORMULARIO -->
        <section id="contacto">
            <br><br>
        </section>

        <section class="planes">
            <h2>Sé parte de nosotros</h2> <br> <br>
            <section class="contacto">
            <?php if (isset($_SESSION['mensaje'])): ?>
                <div class="alerta alerta-<?= htmlspecialchars($_SESSION['tipo']) ?>"><?= htmlspecialchars($_SESSION['mensaje']) ?></div>
                <?php unset($_SESSION['mensaje'], $_SESSION['tipo']); ?>
            <?php endif; ?>
            <form action="enviar-formulario.php" method="POST">
                <section class="inputContent">
                    <input type="text" name="nombre" placeholder="Nombre" required maxlength="100">
                    <input type="text" name="telefono" placeholder="Teléfono" required maxlength="15">
                    <input type="text" name="ciudad" placeholder="Ciudad" required maxlength="50">
                </section>        
                <label style="text-align:left;">
                    <input class="check" type="checkbox" name="terminos" value="1" required>
                        He leido y estoy de acuerdo con los <span><a href="?page=terminos">terminos y condiciones</a></span>
                </label>
                <label style="text-align:left;">
                    <input style="size:30px;" type="checkbox" name="privacidad" value="1" required>
                        Acepto las <span><a href="?page=privacidad">politicas de privacidad</a></span>
                </label>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit">Contratar</button>
            </form>
        </section>

        </section>

        <!-- MAPA 
        <section class="mapa">
            <section class="content-txt" id="Encuéntranos aquí">
                <h2>Encuéntranos aquí</h2>
            </section>
        </section>
        -->
        <!-- FAQ -->
        <section class="content-txt" id="faq">
            <h2>Preguntas frecuentes</h2>
        </section>
        <section class="content-faq-map">
            <section class="faq">
                    <div class="pregunta">
                        <button class="accordion">
                            ¿Qué hacer si me quedo sin internet?
                        </button>
                        <div class="panel">
                            <p>
                                Verifique las luces del router y reinícielo durante 30 segundos.
                            </p>
                        </div>
                    </div>
                    <div class="pregunta">
                        <button class="accordion">
                            ¿Cómo cambio mi domicilio?
                        </button>
                        <div class="panel">
                            <p>
                                Comuníquese con nuestro asesor para coordinar la instalación.
                            </p>
                        </div>
                    </div>
                    <div class="pregunta">
                        <button class="accordion">
                            ¿Qué planes de internet ofrecen?
                        </button>
                        <div class="panel">
                            <p>
                            Ofrecemos planes desde 60 megas hasta 100 megas con instalación gratis. Consulte nuestra sección de planes para más detalles.
                            </p>
                        </div>
                    </div>
                    <div class="pregunta">
                        <button class="accordion">
                            ¿Cómo puedo contratar el servicio?
                        </button>
                        <div class="panel">
                            <p>
                            Puede contactarnos a través de nuestro formulario, por teléfono o visitando nuestras oficinas en Junín.
                            </p>
                        </div>
                    </div>
                </div>
                <div style="display:auto; width:100%; text-align:center;" class=""><a class ="btn" href="?page=preguntas">Ver todas las preguntas</a></div>
            </section>
            <div id="content-map" class="content-map">
                <h3>Encuentranos aquí</h3>
                <iframe class="iframe1"
                src="https://www.google.com/maps?q=-0.9277629850168421, -80.2060910849771&output=embed">
                </iframe> 
                <a href="https://www.google.com/maps?q=-0.9277629850168421, -80.2060910849771" style="text-decoration: none;" target="_blank">Abrir en google maps</a>
                <p>o</p>
                <a href="index.php?page=contacto#zone" style="text-decoration: none;">Ver cobertura</a>
            </div>
                       
        </section>
            

        <?php else: ?>
            <?php include "includes/pages/$pagina.php"; ?>
        <?php endif; ?>
            <script src="assets/js/main.js"></script>
            <?php include 'includes/footer.php'; ?>
            <script>lucide.createIcons();</script>
            <a href="https://wa.me/593991268129" target="_blank" rel="noopener" class="whatsapp-float" aria-label="WhatsApp">
                <img src="assets/icons/logo-whatsapp.png" alt="WhatsApp">
            </a>
    </body>
</html>