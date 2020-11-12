<?php
include '../Database.php';

$db = new Database('bookstore');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $delete_vars);

    if ($db->delete('genre', 'id', $delete_vars['id'])) {
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
    ];

    if ($db->insert('genre', 'name', $values)) {
        http_response_code(201);
        echo "Created";
        exit();
    } else {
        http_response_code(400);
        echo "Unable to create";
        exit();
    }
}
