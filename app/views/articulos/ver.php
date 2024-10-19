<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title><?php echo htmlspecialchars($data['articulo']->titulo); ?> - <?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12 mt-5">
        <!-- Imagen del artículo -->
        <?php if (!empty($data['articulo']->imagen)): ?>
            <div class="text-center mb-4">
                <img src="<?php echo htmlspecialchars($data['articulo']->imagen); ?>" alt="Imagen de <?php echo htmlspecialchars($data['articulo']->titulo); ?>" class="img-fluid" style="max-width: 500px;">
            </div>
        <?php endif; ?>

        <!-- Título y contenido del artículo -->
        <div class="mb-4">
            <div class="card-body">
                <h2 class="card-title"><?php echo htmlspecialchars($data['articulo']->titulo); ?></h2>
                <p class="card-text"><?php echo htmlspecialchars($data['articulo']->contenido); ?></p>
            </div>
        </div>

        <!-- Comentarios -->
        <div class="comentarios mb-5">
            <h3>Comentarios</h3>
            <?php if (!empty($data['comentarios'])): ?>
                <?php foreach ($data['comentarios'] as $comentario): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($comentario->autor); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($comentario->contenido); ?></p>
                            <small class="text-muted"><?php echo date('d-m-Y H:i', strtotime($comentario->fecha_creacion)); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="alert alert-info">No hay comentarios aún. ¡Sé el primero en comentar!</p>
            <?php endif; ?>
        </div>

        <!-- Formulario para agregar un comentario -->
        <div class="agregar-comentario">
            <h3>Agregar Comentario</h3>
            <form action="<?php echo urlRoot; ?>/comentarios/agregar" method="POST">
                <input type="hidden" name="articulo_id" value="<?php echo $data['articulo']->id; ?>">
                <div class="form-group">
                    <label for="autor">Tu Nombre:</label>
                    <input type="text" name="autor" id="autor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contenido">Comentario:</label>
                    <textarea name="contenido" id="contenido" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Comentario</button>
            </form>
        </div>
    </main>

    <footer class="col-12 linea_sep mt-5">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
