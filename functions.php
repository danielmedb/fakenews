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
    // decode stuff like space(%20)
    $name = urldecode($name);

    // search $authors-array for posts from specific author
    $author_id = array_search($name, array_column($authors, 'name'));

    if ($author_id !== false) {

        //  to get the count correct we add 1 to array_search. array_search from 0, $authors from 1 
        $author_id += 1;

        // build the new posts array for the specific author 
        return buildPosts(array('value' => $author_id, 'column' => 'author'), $posts);
    } else {

        // if author cannot be found, show all posts
        return $posts;
    }
}

function buildPosts(array $array, array $posts): array
{
    $column = $array['column'];
    $value = $array['value'];

    if ($value === 'all') {
        // if we want to show all news.
        return $posts;
    }

    $array_position = array_keys(array_column($posts, $column), $value);
    foreach ($array_position as $key) {
        $post[] = array_merge(array(), $posts[$key]);
    }

    return $post;
}

function sortPostsByPublishedDate(array $posts): array
{
    usort($posts, function ($a, $b) {
        return $b['published_date'] <=> $a['published_date'];
    });
    return $posts;
}
