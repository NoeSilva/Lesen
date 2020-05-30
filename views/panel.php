<?php
$categories = array('Terror', 'Suspense', 'Fantástico', 'Aventuras', 'Policiaco', 'Histórico', 'Poesía', 'Prosa poética', 'Drama', 'Romance', 'Fábula', 'Infantil');
?>

<div class="container">
    <div class="card redondito mt-4">
        <div class="card-body">

            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?>" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <form action="index.php?book=insertBook" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Título del libro</label>
                    <input type="text" class="form-control redondo" id="title" name="title" placeholder="Introduce el título...">
                </div>
                <div class="form-group">
                    <label for="author">Autor/a</label>
                    <input type="text" class="form-control redondo" id="author" name="author" placeholder="Introduce el autor...">
                </div>
                <div class="form-group mb-4">
                    <label for="gendre">Género</label>
                    <select class="form-control redondo" name="gendre" id="gendre">
                        <?php foreach ($categories as $category) { ?>
                            <option><?= $category ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Seleccionar archivo en formato jpg</label>
                </div>
                <div>
                    <label for="author">Precio</label>
                    <input type="number" class="form-control redondo" name="price" step="0.1">
                </div>

                <button class="btn btn-dark btn-block redondo mt-4" type="submit">Añadir</button>
            </form>
        </div>
    </div>

    <?php echo $_SESSION['user']['email']; ?>
</div>