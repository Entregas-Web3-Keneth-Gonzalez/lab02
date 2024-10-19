<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Panel de Administración - <?php echo siteName; ?></title>
</head>
<body class="container">
    <header class="col-12">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12 linea_sep">
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
            <h2>Panel de Administración</h2>
            <!-- Enlace para Crear un Nuevo Artículo -->
            <div class="admin-actions mb-3">
                <a href="<?php echo urlRoot; ?>/articulos/agregar" class="btn btn-primary">Crear Nuevo Artículo</a>
            </div>

            <!-- Tabla de Artículos Existentes -->
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['articulos'])): ?>
                        <?php foreach ($data['articulos'] as $articulo): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($articulo->id); ?></td>
                                <td><?php echo htmlspecialchars($articulo->titulo); ?></td>
                                <td><?php echo htmlspecialchars($articulo->categoria); ?></td>
                                <td>
                                    <a href="<?php echo urlRoot; ?>/articulos/modificar/<?php echo $articulo->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="<?php echo urlRoot; ?>/articulos/borrar/<?php echo $articulo->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No hay artículos disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        <?php else: ?>
            <p>No tienes permiso para acceder a esta página.</p>
        <?php endif; ?>
    </main>

    <footer class="col-12 linea_sep">
        <?php require_once(appRoot . '/views/includes/pie.php'); ?>
    </footer>
</body>
</html>
