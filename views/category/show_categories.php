<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12 mt-4">
            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?> mb-4" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

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
                    <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['user_id'] ?></td>
                            <td class="text-left">
                                <?= $category['name'] ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group text-light" role="group">
                                        <a href="index.php?category=show_category&id=<?= $category['id'] ?>" class="btn btn-dark text-light">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="index.php?category=removeCategory&id=<?= $category['id'] ?>" class="btn btn-danger text-light">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>