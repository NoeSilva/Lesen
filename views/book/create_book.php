<div class="container">
    <div class="card redondito mt-4">
        <div class="card-body">

            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?>" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <form action="index.php?book=<?= $type ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Título del libro</label>
                    <input type="text" class="form-control redondo" id="title" name="title" placeholder="Introduce el título..." value="<?= $book['title'] ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="author">Autor/a</label>
                    <select class="form-control redondo" name="author_id" id="author">
                        <?php if ($authors !== false) { 
                            foreach ($authors as $author) { ?>
                                <option value="<?= $author['id'] ?>">
                                <?= $author['name'] ?>
                                <?= $author['surname'] ?>
                            </option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="gendre">Género</label>
                    <select class="form-control redondo" name="genre_id" id="gendre">
                        <?php if ($genres !== false) { 
                            foreach ($genres as $genre) { ?>
                                <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Seleccionar archivo en formato jpg</label>
                </div>
                <div>
                    <label for="author">Precio</label>
                    <input type="number" class="form-control redondo" name="price" step="0.1" min="0" placeholder="Introduce el precio..." value="<?= $book['price'] ?>">
                </div>

                <input type="hidden" name="id" value="<?= $book['id'] ?>">
            
                <?php if ($type == 'createBook') { ?>
                    <button class="btn btn-dark btn-block redondo mt-4" type="submit">Añadir</button>
                <?php  } else { ?>
                    <button class="btn btn-dark btn-block redondo mt-4" type="submit">Actualizar</button>
                <?php  } ?>
            </form>

            <?php if (isset($_SESSION['bookId'])) { ?>
                <a type="button" class="btn btn-dark redondo mt-4 text-light" href="index.php?book=show_book&id=<?=$_SESSION['bookId']?>">Ver libro</a>
            <?php } ?>
        </div>
    </div>
</div>