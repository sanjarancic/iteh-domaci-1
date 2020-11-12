<?php
include 'Database.php';

$db = new Database('bookstore');

if (isset($_GET['order_by'])) {
    $order_by = $_GET['order_by'];
} else {
    $order_by = 'name';
}

if (isset($_GET['order_dir'])) {
    $order_dir = $_GET['order_dir'];
} else {
    $order_dir = '';
}

if (isset($_GET['query'])) {
    $where_clause = $_GET['query'];
} else {
    $where_clause = "";
}

$active_sort_class = "class='sort {$order_dir}'";
