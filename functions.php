<?php



declare(strict_types=1);


error_reporting(E_ALL);


require __DIR__ . '/data.php';
require __DIR__ . '/authors.php';

function getAuthor(array $authors, int $author_id, string $type)
{
    return $authors[$author_id][$type];
}

function getPostsByAuthor(string $name, $authors, $posts = NULL): array
{
    $name = urldecode($name);

    /* search $authors-array for posts from specific person */
    $author_id = array_search($name, array_column($authors, 'name'));

    if ($author_id !== false) {

        /* to get the count correct we add 1 to array_search. array_search from 0, $authors from 1 */
        $author_id += 1;

        /* build the new posts array for the specific author */
        return buildPosts($author_id, $posts);
    } else {
        /* if author cannot be found, show all posts */
        return $posts;
    }
}

function buildPosts(int $author_id, array $posts): array
{
    /* search for posts specific from $author_id */
    $array_position = array_keys(array_column($posts, "author"), $author_id);
    foreach ($array_position as $key) {
        $post[] = array_merge(array(), $posts[$key]);
    }

    return $post;
}


function getPostsByCategori(string $categori, array $posts): array
{

    /* lets show all news */
    if ($categori === 'all') {
        return $posts;
    }

    /* search for posts specific from $categori */
    $array_position = array_keys(array_column($posts, "categori"), $categori);

    foreach ($array_position as $key) {
        $post[] = array_merge(array(), $posts[$key]);
    }
    return $post;
}
