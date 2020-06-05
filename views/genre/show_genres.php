<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12 mt-4">
            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?> mb-4" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <?php if ($genres !== false) { ?>

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($genres as $genre) { ?>
                        <tr>
                            <td><?= $genre['id'] ?></td>
                            <td><?= $genre['user_id'] ?></td>
                            <td class="text-left">
                                <?= $genre['name'] ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group text-light" role="group">
                                        <a href="index.php?genre=show_genre&id=<?= $genre['id'] ?>" class="btn btn-dark text-light">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="index.php?genre=removeGenre&id=<?= $genre['id'] ?>" class="btn btn-danger text-light">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?> 
                No hay géneros
            <?php } ?>
        </div>
    </div>
</div>