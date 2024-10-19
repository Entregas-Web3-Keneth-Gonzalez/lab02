<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title><?php echo 'Categoría: ' . htmlspecialchars($data['categoria']); ?> - <?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12 mt-5">
        <h2 class="mb-4">Categoría: <?php echo htmlspecialchars($data['categoria']); ?></h2>

        <?php if (!empty($data['articulos'])): ?>
            <div class="row">
                <?php foreach($data['articulos'] as $articulo): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <?php if (!empty($articulo->imagen)): ?>
                                <img src="<?php echo htmlspecialchars($articulo->imagen); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($articulo->titulo); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h3 class="card-title"><?php echo htmlspecialchars($articulo->titulo); ?></h3>
                                <p class="card-text"><?php echo substr(htmlspecialchars($articulo->contenido), 0, 150) . '...'; ?></p>
                                <a href="<?php echo urlRoot; ?>/articulos/ver/<?php echo $articulo->id; ?>" class="btn btn-primary">Leer más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="alert alert-info">No hay artículos disponibles en esta categoría.</p>
        <?php endif; ?>
    </main>

    <footer class="col-12 linea_sep mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
