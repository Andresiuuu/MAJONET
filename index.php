<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majonet</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Momo+Trust+Display&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <!-- HERO -->
<section class="hero">
    <div class="hero-info">
        <h1>Majonet</h1>
        <h2>Internet de alta velocidad por fibra óptica</h2>
        <p>
            Estudio | Entretenimiento | Hogares | Empresas
        </p>
        <div class="hero-buttons">
                <a href="#contacto" class="btn">Sé parte de nosotros</a>
                <a href="#faq" class="btn-outline">Preguntas frecuentes</a>            
        </div>    
    </div>
    <!-- <div class="hero-image">
        <img src="assets/img/bannerPrincipal.png" alt="Imagen de internet de alta velocidad">
    </div>-->
</section>

<!-- BANNER -->

<section class="banner"> 
   <h1 >INSTALACION GRATIS</h1>
   <p>En todos nuestros planes</p>
</section>
<!-- PLANES -->
    <section class="planes">
    <h2>Planes y promociones</h2>
        <div class="cards">
            <div class="card">
                <h3>Plan Básico</h3>
                <h1>50</h1>
                <p>MEGAS</p>
                <span>$17.86 + IVA</span> <br>
                <button style="">¡Me interesa!</button>
            </div>

            <div class="card">
                <h3>Plan Estándar</h3>
                <h1>80</h1>
                <p>MEGAS</p>
                <span>$17.86 + IVA</span> <br>
                <button>¡Me interesa!</button>
            </div>

            <div class="card">
                <h3>Plan Plus</h3>
                <h1>100</h1>
                <p>MEGAS</p>
                <span>$17.86 + IVA</span> <br>
                <button>¡Me interesa!</button>
            </div>

        </div>
    </section>

<!-- FORMULARIO -->

<section class="contacto" id="contacto">
<h2>Sé parte de nosotros</h2>
<form>
<input type="text" placeholder="Nombre">
<input type="text" placeholder="Teléfono">
<input type="text" placeholder="Ciudad">
<label>
<input type="checkbox">
Acepto los términos y condiciones
</label>
<label>
<input type="checkbox">
Acepto la política de privacidad
</label>
<button>Contratar</button>
</form>
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
<section class="content-txt" id="Preguntas frecuentes">
    <h2>Preguntas frecuentes</h2>
</section>
    <section class="faq" id="faq">
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
<?php include 'includes/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>