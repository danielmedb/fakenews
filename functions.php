<?php



declare(strict_types=1);

require __DIR__ . '/data.php';

$authors = [
    1 => array(
        'name' => 'Carina Fransson',
        'mail' => 'carina.fransson@fakenews.com',
        'img' => ''
    ),
    2 => array(
        'name' => 'Gunborg Håkansson',
        'mail' => 'gunborg.hakansson@fakenews.com',
        'img' => ''
    ),
    3 => array(
        'name' => 'Susann Lundström',
        'mail' => 'susann.lundstrom@fakenews.com',
        'img' => ''
    ),
    4 => array(
        'name' => 'Dag Månsson',
        'mail' => 'dag.monsson@fakenews.com',
        'img' => ''
    ),
    5 => array(
        'name' => 'Josefina Mattsson',
        'mail' => 'josefina.mattsson@fakenews.com',
        'img' => ''
    )
];

function getAuthor(array $authors, int $author_id, string $type)
{
    return $authors[$author_id][$type];
}

function getPostsByAuthor(string $name, $authors, $posts = NULL)
{
    /* DECODE  */
    $name = urldecode($name);

    /* SEARCH $AUTHORS-ARRAY FOR POSTS FROM SPECIFIC PERSON */
    $author_id = array_search($name, array_column($authors, 'name'));

    if ($author_id !== false) {

        /* TO GET THE COUNT CORRECT WE ADD 1 TO ARRAY_SEARCH. ARRAY_SEARCH FROM 0, $AUTHORS FROM 1 */
        $author_id += 1;

        /* BUILD THE NEW POSTS ARRAY FOR THE SPECIFIC AUTHOR */
        return buildPosts($author_id, $posts);
    } else {

        /* IF AUTHOR CANNOT BE FOUND, SHOW ALL POSTS */
        return $posts;
    }
}

function buildPosts($author_id, $posts)
{
    /* SEARCH FOR POSTS SPECIFIC FROM $author_id */
    $array_position = array_keys(array_column($posts, "author"), $author_id);
    foreach ($array_position as $key) {
        $post[] = array_merge(array(), $posts[$key]);
    }

    return $post;
}
