<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Iniciar Sesión - <?php echo siteName; ?></title>
</head>

<body class="container mt-5">
    <header class="col-12 mb-4">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>

    <main class="col-12 linea_sep">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Autenticación de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo urlRoot; ?>/users/login" method="post">
                            <div class="form-group">
                                <label for="txtUsua"><strong>Usuario:</strong></label>
                                <input type="text" name="txtUsua" id="txtUsua" class="form-control" maxlength="15" required>
                                <span class="invalidFeedback text-danger">
                                    <?php echo htmlspecialchars($data['userError']); ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="txtContra"><strong>Contraseña:</strong></label>
                                <input type="password" name="txtContra" id="txtContra" class="form-control" maxlength="15" required>
                                <span class="invalidFeedback text-danger">
                                    <?php echo htmlspecialchars($data['passError']); ?>
                                </span>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Aceptar" class="btn btn-primary">
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo urlRoot; ?>/users/register">Registrar Usuario</a>
                            </div>
                        </form>
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