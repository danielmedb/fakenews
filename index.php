<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake News - For cat lover!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
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
} else {
    $posts = $posts;
}

?>

<body>
    <div class="container" style="width: 1200px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                <!-- <img src="cat_header.jpg" style="width: inherit;" /> -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 pl-0">
                <?php foreach ($posts as $post) :  ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center p-0">
                                <img class="img-fluid" src="<?= $post['img']; ?>" />
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h5 class="card-title"><?= $post['title']; ?></h5>
                                    <!-- <?= (strlen($post['content']) > 100 ? substr($post['content'], 0, 100) . "..." : $post['content']); ?> -->
                                    <?= $post['content']; ?>
                                </div>
                            </div>
                            <span>
                                <h6 class="small float-right mb-0 m-2">
                                    <img class="rounded-circle" src="https://picsum.photos/30" />
                                    <a href="/<?= getAuthor($authors, $post['author'], 'name'); ?>">
                                        <?= getAuthor($authors, $post['author'], 'name'); ?>
                                    </a>
                                    <?= $post['published_date']; ?>
                                </h6>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 col-xl-4">
                <?php require 'sidebar_right.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>