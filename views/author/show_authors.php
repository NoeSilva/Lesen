<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12 mt-4">
            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?> mb-4" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <?php if ($authors !== false) { ?>

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
                    <?php foreach ($authors as $author) { ?>
                        <tr>
                            <td><?= $author['id'] ?></td>
                            <td><?= $author['user_id'] ?></td>
                            <td class="text-left">
                                <?= $author['name'] ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group text-light" role="group">
                                        <a href="index.php?author=show_author&id=<?= $author['id'] ?>" class="btn btn-dark text-light">
                                            <i class="far fa-eye"></i>
                                        </a>

                                        <?php if ($_SESSION['user']['id'] == $author['user_id']) { ?>
                                            <a href="index.php?author=removeAuthor&id=<?= $author['id'] ?>" class="btn btn-danger text-light">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        <?php } else { ?>
                                            <button class="btn btn-danger text-light" disabled>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?> 
                No hay autores :(
            <?php } ?>
        </div>
    </div>
</div>