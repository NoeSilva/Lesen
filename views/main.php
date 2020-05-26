<?php
$books = array(
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image4.jpg',
        'price' => '20.0'
    ),
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image2.jpg',
        'price' => '20.0'
    ),
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image.jpg',
        'price' => '20.0'
    ),
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image2.jpg',
        'price' => '20.0'
    ),
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image3.jpg',
        'price' => '20.0'
    ),
    array(
        'id' => 1,
        'title' => 'El nombre del viento',
        'author' => 'Patrick Rothfuss',
        'gendre' => 'novela',
        'image' => 'image2.jpg',
        'price' => '20.0'
    ),
);
?>

<div class="container">
    <div class="row">
        <?php foreach ($books as $book) { ?>

            <div class="col-lg-6 col-sm-12 mt-4">

                <!-- Tarjeta -->
                <div class="card mb-3 bg-light redondito-derecha">
                    <div class="row">
                        <!-- Columna de la imagen -->
                        <div class="col-lg-4 col-sm-12">
                            <img src='./assets/img/<?=$book['image']?>' style='max-height: 185px;' alt='<?=$book['image']?>'>
                        </div>
                        <!-- Columna del texto -->
                        <div class="col-lg-8 col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $book['title'] ?>
                                </h5>
                                <p class="card-text"> 
                                    <?= $book['author'] ?>
                                </p>
                                <p class="card-text"> 
                                    <?= $book['gendre'] ?>
                                </p>
                                <p class="card-text float-right">
                                    <small class="text-muted">
                                        <?= $book['price'] ?> €
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>

    </div>

    <?php 
        $form = array(
            array()
        );
    ?>
    <form action="">

    </form>
</div>