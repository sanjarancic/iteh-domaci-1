<?php
include '../Database.php';

$db = new Database('bookstore');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);

    if ($db->delete('books', 'id', $delete_vars['id'])) {
        http_response_code(204);
        exit();
    } else {
        http_response_code(400);
        echo "Unable to delete resource";
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $values = [
        "'".$_POST['name']."'",
        "'".$_POST['authors']."'",
        "'".$_POST['date_published']."'",
        "'".$_POST['genre_id']."'"
    ];

    if ($db->insert('books', 'name,authors,date_published,genre_id', $values)) {
        http_response_code(201);
        echo "Created";
        exit();
    } else {
        http_response_code(400);
        echo "Unable to create";
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    
    $values = [
        "'".$put_vars['name']."'",
        "'".$put_vars['authors']."'",
        "'".$put_vars['date_published']."'",
        "'".$put_vars['genre_id']."'"
    ];


    if ($db->update('books', $put_vars['id'], ['name', 'authors', 'date_published', 'genre_id'], $values)) {
        http_response_code(200);
        exit();
    } else {
        http_response_code(400);
        echo "Unable to update resource";
        exit();
    }
}
