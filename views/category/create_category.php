<div class="container">
    <div class="card redondito mt-4">
        <div class="card-body">

            <?php if (isset($_SESSION['class'])) { ?>
                <div class="alert <?= $_SESSION['class'] ?>" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            <?php } ?>

            <form action="index.php?category=createCategory" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control redondo" id="name" name="name" placeholder="Nombre de la categoría...">
                    <button class="btn btn-dark btn-block redondo mt-4" type="submit">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>