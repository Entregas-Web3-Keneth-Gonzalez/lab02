<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Editar Artículo - <?php echo siteName; ?></title>
</head>
<body class="container mt-5">
    <header class="col-12 mb-4">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Editar Artículo</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo urlRoot; ?>/articulos/modificar/<?php echo $data['articulo']->id; ?>" method="POST">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo htmlspecialchars($data['articulo']->titulo); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido:</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="5" required><?php echo htmlspecialchars($data['articulo']->contenido); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" value="<?php echo htmlspecialchars($data['articulo']->categoria); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">URL de la Imagen:</label>
                        <input type="text" name="imagen" id="imagen" class="form-control" value="<?php echo htmlspecialchars($data['articulo']->imagen); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Modificar Artículo</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="col-12 mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
