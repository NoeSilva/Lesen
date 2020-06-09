<div class="container">
    <div class="row">
        <div class="col-10 mt-4">
            <div class="card redondete">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                        <img class="redondete" src="<?= $author['url'] ?>" alt="">
                        </div>
                        <div class="col-7 ml-4">
                        <h2><?= $author['name'] ?> <?= $author['surname'] ?></h2>
                        <p><b>Fecha de nacimiento:</b> <?= $author['birthday'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>