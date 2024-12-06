<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/G5_SC-609-_LN_Simulacion3/app/Controller/LibroController/libroController.php";
    include_once '../layout.php';
    $libroController = new libroController();
    $libros = $libroController->listarLibros();
    $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
?>

<!DOCTYPE html>
<html>
<?php HeadCSS(); ?>
<body class="d-flex flex-column min-vh-100">
    <?php 
        MostrarNav();
        MostrarMenu();
    ?>
    <div class="flex-grow-2 mb-5">
        <div class="container mt-5">
            <h1 class="text-center mb-4">Todos los Libros</h1>
            <?php if (empty($libros)): ?>
                <div class="alert alert-warning text-center">
                    <strong>No hay libros.</strong>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($libros as $libro): ?>
                        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                            <div class="card h-100" style="width: 18rem; position: relative;">
                                <img src="/G5_SC-609-_LN_Simulacion3/app/View/uploaded_img/libros_img/<?php echo htmlspecialchars($libro['image']); ?>" 
                                    class="card-img-top" 
                                    alt="<?php echo htmlspecialchars($libro['nombre_libro']); ?>" 
                                    style="object-fit: cover; height: 250px;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo htmlspecialchars($libro['nombre_libro']); ?></h5>
                                    <p class="card-text mt-auto">
                                        <strong>Cantidad:</strong> <?php echo $libro['cantidad']; ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="../reservar_libros/index.php" class="btn btn-success btn-block">
                                        Reservar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>