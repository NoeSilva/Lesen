<div class="container">
    <div class="row">
        <div class="col-10 mt-4">
            <div class="card redondete">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img class="redondete" src='./storage/images/<?=$book['image']?>' style='max-height: 185px;' alt='<?=$book['image']?>'>
                        </div>
                        <div class="col-7 ml-4">
                            <h1><?= $book['title'] ?></h1>
                            <h2>
                                <a href="index.php?author=show_author&id=<?= $book['author_id'] ?>">
                                    <?= $book['authorName'] ?> <?= $book['authorSurname'] ?>
                                </a>
                            </h2>
                            <p><?= $book['genre'] ?></p>
                            <p><?= $book['price'] ?> €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
