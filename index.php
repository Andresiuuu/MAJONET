<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$pagina = isset($_GET['page']) ? $_GET['page'] : 'inicio';
$paginas_permitidas = ['inicio', 'sobre-nosotros', 'contacto', 'preguntas'];
if (!in_array($pagina, $paginas_permitidas)) {
    $pagina = 'inicio';
}

$titulos = [
    'inicio' => 'Majonet',
    'sobre-nosotros' => 'Sobre nosotros - Majonet',
    'contacto' => 'Contacto - Majonet',
    'preguntas' => 'Preguntas frecuentes - Majonet',
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
                    <div class="card">
                        <h3>Plan Básico</h3>
                        <h1>60</h1>
                        <p>MEGAS</p>
                        <span>$20.55</span>
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
                        <span>$25.75</span>
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
                        <span>$30.55</span>
                        <span>Instalacion Gratis</span>
                        <div class="txt">
                            <p>*Precio incluye IVA</p>
                        </div>
                        <a href="#contacto" class="buttonCard">¡Me interesa!</a>
                    </div>

                    <div class="card-zapping">
                        <h3><span>ZAPPING</span></h3>
                        <h1>52</h1>
                        <p>CANALES</p>
                        <span>$5.25</span>
                        <span>Agregar informacion</span>
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
                <label style="justify-self:start;">
                    <input type="checkbox" name="terminos" value="1" required>
                        Acepto los términos y condiciones
                </label>
                <label style="justify-self:start;">
                    <input type="checkbox" name="privacidad" value="1" required>
                        Acepto la política de privacidad
                </label>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit">Contratar</button>
            </form>
        </section>

        </section>

        <!-- MAPA -->
        <section class="mapa">
            <section class="content-txt" id="Encuéntranos aquí">
                <h2>Encuéntranos aquí</h2>
            </section>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d249.3309546641249!2d-80.20607872376712!3d-0.9277599909425598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1783697913958!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                </iframe>
        </section>

        <!-- FAQ -->
        <section class="content-txt" id="faq">
            <h2>Preguntas frecuentes</h2>
        </section>
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
                </div>
            </section>

        <?php else: ?>
            <?php include "includes/pages/$pagina.php"; ?>
        <?php endif; ?>
            <script src="assets/js/main.js"></script>
            <?php include 'includes/footer.php'; ?>
            <script>lucide.createIcons();</script>
        
    </body>
</html>