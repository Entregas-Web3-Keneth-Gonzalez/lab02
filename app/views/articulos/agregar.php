<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Agregar Artículo - <?php echo siteName; ?></title>
</head>
<body class="container mt-5">
    <header class="col-12 mb-4">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Agregar Nuevo Artículo</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo urlRoot; ?>/articulos/agregar" method="POST">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido:</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">URL de la Imagen:</label>
                        <input type="text" name="imagen" id="imagen" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Agregar Artículo</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="col-12 mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
