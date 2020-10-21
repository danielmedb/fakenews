<?php

if ($_SERVER['REQUEST_URI'] !== '/') {
    $authorName = explode('/', $_SERVER['REQUEST_URI']);
    $authorName = filter_var($authorName[1], FILTER_SANITIZE_STRING);
    $posts = getPostsByAuthor($authorName, $authors, $posts);
}

$posts = sortPostsByPublishedDate($posts);
