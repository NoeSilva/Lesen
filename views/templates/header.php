<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AN</title>
    <link rel="icon" type="image/png" href="./assets/img/logo.png" />

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg-grey text-light"> 
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/img/logo.png" width="40" height="35" alt="">   
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php 
                    foreach ($links as $link) {

                        if ($route == $link['url']) {
                            print 
                            "<li class='nav-item active'>
                                <a class='nav-link' href='index.php?r={$link['url']}'>{$link['name']}</a>
                            </li>";
                        } else {
                            print 
                            "<li class='nav-item'>
                                <a class='nav-link' href='index.php?r={$link['url']}'>{$link['name']}</a>
                            </li>";
                        }
                    
                    } 
                    ?>
                </ul>
            </div>
        </div>
    </nav>