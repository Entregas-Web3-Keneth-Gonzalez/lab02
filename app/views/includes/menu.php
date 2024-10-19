<nav class="navbar navbar-expand-lg letra_menu navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo urlRoot; ?>/pages/index">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo urlRoot; ?>/pages/about">Acerca de..</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo urlRoot; ?>/articulos/index">Artículos</a>
            </li>
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo urlRoot; ?>/articulos/admin">Panel Admin</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <?php
                if (isLoggedIn()) {
                    echo '<a class="nav-link" href="' . urlRoot . '/users/logout">Salir</a>';
                } else {
                    echo '<a class="nav-link" href="' . urlRoot . '/users/login">Ingresar</a>';
                }
                ?>
            </li>
        </ul>
    </div>
</nav>