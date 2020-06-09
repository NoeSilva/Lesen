<div class="container">
    <div class="card redondito mt-4">
        <div class="card-body">

            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?>" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <form action="index.php?author=createAuthor" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control redondo" id="name" name="name" placeholder="Nombre del autor...">
                </div>
                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" class="form-control redondo" id="surname" name="surname" placeholder="Apellido del autor...">
                </div>
                <div class="form-group">
                    <label for="date">Fecha de nacimiento</label>
                    <input type="date" class="form-control redondo" id="birthday" name="birthday">
                </div>
                <div class="form-group">
                    <label for="url">URL de la imagen</label>
                    <input type="url" class="form-control redondo" id="url" name="url" placeholder="URL de la imagen...">
                </div>
                <button class="btn btn-dark btn-block redondo mt-4" type="submit">Añadir</button>
            </form>
        </div>
    </div>
</div>