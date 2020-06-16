<div class="container">
    <div class="row">
        <div class="col-10 mt-4">

            <div class="col-12">
                <div class="card redondete">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="redondete" src="<?= $author['url'] ?>" alt="">
                            </div>
                            <div class="col-7 ml-4">
                                <h1 class="uppercase"><?= $author['name'] ?> <?= $author['surname'] ?></h1>
                                <p><b>Fecha de nacimiento:</b> <?= $author['birthday'] ?></p>

                                Cantidad de libros: <?= $booksQuantity ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <h2 class="mb-4">Más libros sobre este autor...</h2>

                <div class="row">
                    <?php foreach ($books as $book) { ?>
                        <div class="col-4">
                            <a href="index.php?book=show_book&id=<?= $book['id'] ?>">
                                <div class="card mb-3 bg-light redondito-derecha">
                                    <div class="row">
                                        <!-- Columna de la imagen -->
                                        <div class="col-lg-4 col-sm-12">
                                            <img src='./storage/images/<?= $book['image'] ?>' style='max-height: 120px;' alt='<?= $book['image'] ?>'>
                                        </div>
                                        <!-- Columna del texto -->
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?= $book['title'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>