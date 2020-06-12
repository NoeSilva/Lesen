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
                        <th>Título</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($books as $book) { ?>
                        <tr>
                            <td><?= $book['id'] ?></td>
                            <td><?= $book['user'] ?></td>
                            <td class="text-left">
                                <?= $book['title'] ?>
                            </td>
                            <td><?= $book['price'] ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group text-light" role="group">
                                        <a href="index.php?book=show_book&id=<?= $book['id'] ?>" class="btn btn-dark text-light">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="index.php?book=update_book&id=<?= $book['id'] ?>" class="btn btn-primary text-light">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="index.php?book=removeBook&id=<?= $book['id'] ?>" class="btn btn-danger text-light">
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