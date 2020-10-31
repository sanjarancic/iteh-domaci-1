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
}
