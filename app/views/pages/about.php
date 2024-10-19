<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Acerca de Nosotros - <?php echo siteName; ?></title>
</head>

<body class="container mt-5">
    <header class="col-12 mb-4">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12">
        <div>
            <div class="card-header bg-info text-white">
                <h1 class="card-title mb-0">Acerca de Nosotros</h1>
            </div>
            <div class="card-body">
                <p class="lead">Este blog es mantenido por un grupo de talentosos estudiantes de la Carrera de Tecnologías de Información dandole un toque de malisia indigena. Aquí compartimos todo lo relacionado con la tecnología y nuestra cultura, desde tutoriales hasta reseñas de las últimas novedades.</p>
                <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Grupo: Creativos</strong></h5>
                    </div>
                    <div class="col-md-6">
                        <h5><strong>Integrantes:</strong></h5>
                        <ul>
                            <li>Keneth Gonzalez</li>
                            <li>Jhonathan Zuñiga</li>
                            <li>Zaylin Lopez</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="col-12 mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>

</html>
