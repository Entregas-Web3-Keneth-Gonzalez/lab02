<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Artículos - <?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12 mt-5">
        <h2 class="text-center">Artículos Recientes</h2>

        <!-- Enlaces a las categorías -->
        <div class="categorias text-center mb-4">
            <?php 
            $categorias = [
                "Tecnología", "Cultura", "Deportes", "Salud", "Arte", 
                "Negocios", "Noticias", "Cine", "Personales", 
                "Libros", "Musica", "Moda"
            ];
            ?>
            <?php foreach ($categorias as $categoria): ?>
                <a href="<?php echo urlRoot; ?>/articulos/categoria/<?php echo $categoria; ?>" class="btn btn-outline-primary btn-sm mb-2">
                    <?php echo $categoria; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <hr>

        <!-- Artículos -->
        <div class="row">
            <?php foreach($data['articulos'] as $articulo): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <?php if (!empty($articulo->imagen)): ?>
                            <img src="<?php echo htmlspecialchars($articulo->imagen); ?>" alt="Imagen de <?php echo htmlspecialchars($articulo->titulo); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($articulo->titulo); ?></h5>
                            <p class="card-text"><?php echo substr(htmlspecialchars($articulo->contenido), 0, 100) . '...'; ?></p>
                            <a href="<?php echo urlRoot; ?>/articulos/ver/<?php echo $articulo->id; ?>" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="col-12 linea_sep mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
