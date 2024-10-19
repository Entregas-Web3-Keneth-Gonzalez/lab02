<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(appRoot . '/views/includes/enca.php'); ?>
    <title>Bienvenidos - <?php echo siteName; ?></title>
</head>

<body class="container mt-5">
    <header class="col-12 mb-4">
        <?php require_once(appRoot . '/views/includes/menu.php'); ?>
    </header>
    
    <main class="col-12 linea_sep">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenidos al MiniBlog de <?php echo siteName; ?></h1>
            <p class="lead">¡Comparte, aprende y explora con nosotros!</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="card-body text-center">
                        <?php
                        echo '<h3 class="card-title">' . htmlspecialchars($data['title']) . '</h3>';
                        ?>
                        <hr>
                        <?php if (isLoggedIn()): ?>
                            <p class="text-success">Usted es: <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
                        <?php else: ?>
                            <p class="text-danger">Por favor, autentíquese ante nosotros...</p>
                        <?php endif; ?>
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
