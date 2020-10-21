<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake News - All the way!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <script src="functions.js"></script>
</head>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';

if ($_SERVER['REQUEST_URI'] !== '/') {
    $authorName = explode('/', $_SERVER['REQUEST_URI']);
    $authorName = filter_var($authorName[1], FILTER_SANITIZE_STRING);
    $posts = getPostsByAuthor($authorName, $authors, $posts);
}

usort($posts, function ($a, $b) {
    return $b['published_date'] <=> $a['published_date'];
});




?>

<body>
    <div class="container" style="width: 1200px;">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Fake News Factory</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo (!isset($_GET['page']) ? 'active' : ''); ?>">
                        <a class="nav-link" href="/">Nyheter</a>
                    </li>
                    <li class="nav-item <?php echo ($_GET['page'] == 'sport' ? 'active' : ''); ?>">
                        <a class="nav-link" href="?page=sport">Sport</a>
                    </li>
                    <li class="nav-item <?php echo ($_GET['page'] == 'ekonomi' ? 'active' : ''); ?>">
                        <a class="nav-link" href="?page=ekonomi">Ekonomi</a>
                    </li>
                    <li class="nav-item <?php echo ($_GET['page'] == 'kultur' ? 'active' : ''); ?>">
                        <a class="nav-link" href="?page=kultur">Kultur</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="row" style="margin-top: 20px;">
            <?php

            if (isset($_GET['page']) && $_GET['page'] != '') {
                $page = $_GET['page'];
                switch ($page) {
                    case 'sport':
                        $posts = getPostsByCategori('Sport', $posts);
                        include 'news.php';
                        break;

                    case 'ekonomi':
                        $posts = getPostsByCategori('Ekonomi', $posts);
                        include 'news.php';
                        break;

                    case 'kultur':
                        $posts = getPostsByCategori('Kultur', $posts);
                        include 'news.php';
                        break;

                    default:
                        include 'news.php';
                        break;
                }
            } else {
                $posts = getPostsByCategori('all', $posts);
                include 'news.php';
            }

            ?>
            <div class="col-lg-4 col-xl-4">
                <?php require 'sidebar_right.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>