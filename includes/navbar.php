<nav>
    <a href="index.php#" class="logo">
        <img style="width: 60px; height: 60px;" src="assets/img/Logo.png" >
        <span class="logo-text">Majonet <span style="color:green; font-size:14px; font-family: Momo Trust Display, sans-serif;">S.A.S</span></span>
    </a>
    <ul class="nav-links">
        <li><a href="index.php" class="<?= $pagina === 'inicio' ? 'active' : '' ?>">Inicio</a></li>
        <li><a href="?page=sobre-nosotros" class="<?= $pagina === 'sobre-nosotros' ? 'active' : '' ?>">Sobre nosotros</a></li>
        <li><a href="?page=contacto" class="<?= $pagina === 'contacto' ? 'active' : '' ?>">Contacto</a></li>
        <li><a href="?page=preguntas" class="<?= $pagina === 'preguntas' ? 'active' : '' ?>">Preguntas</a></li>
    </ul>
    <button class="hamburger" id="menu-btn" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="overlay" id="overlay"></div>
    <aside class="sidebar" id="sidebar">
        <button class="close-btn" id="close-btn" aria-label="Cerrar menú">&times;</button>
        <ul class="sidebar-links">
            <li><a href="index.php" class="<?= $pagina === 'inicio' ? 'active' : '' ?>">Inicio</a></li>
            <li><a href="?page=sobre-nosotros" class="<?= $pagina === 'sobre-nosotros' ? 'active' : '' ?>">Sobre nosotros</a></li>
            <li><a href="?page=contacto" class="<?= $pagina === 'contacto' ? 'active' : '' ?>">Contacto</a></li>
            <li><a href="?page=preguntas" class="<?= $pagina === 'preguntas' ? 'active' : '' ?>">Preguntas</a></li>
        </ul>   
        <!--
        <div class="sidebar-footer">
            <label class="switch">
                <input type="checkbox" id="themeSwitch">
                <span class="slider"></span>
            </label>
            <span class="sidebar-theme-label">Modo oscuro</span>
        </div>
        -->
    </aside>
</nav>
