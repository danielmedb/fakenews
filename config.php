<?php

declare(strict_types=1);

$fileName = __DIR__ . "/database.db";
$dsn = "sqlite:$fileName";

try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw $e;
}

$posts_table = $db->prepare("SELECT * FROM news");
$posts_table->execute();
$posts = $posts_table->fetchAll(PDO::FETCH_ASSOC);

$authors_table = $db->prepare("SELECT * FROM authors");
$authors_table->execute();
$authors_array = $authors_table->fetchAll(PDO::FETCH_ASSOC);

foreach ($authors_array as $author) {
    $authors[$author['id']] = [
        'name' => $author['name'],
        'email' => $author['mail']
    ];
}
