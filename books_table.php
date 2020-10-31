<?php include 'Database.php' ?>

<?php
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

$query = "SELECT books.*, genre.name as genre
              FROM books 
              LEFT JOIN genre ON books.genre_id=genre.id 
              WHERE books.name LIKE '%{$where_clause}%'
              ORDER BY {$order_by} {$order_dir};";

$active_sort_class = "class='sort {$order_dir}'";
?>

<form action="" method="get">
    <input type="text" name="query" value="<?php echo $where_clause ?>" class="form-control" placeholder="Search">
</form>

<table class="table">
    <thead>
        <tr>
            <th onclick="changeSort('id')" <?php if ($order_by == 'id') echo $active_sort_class ?>>#</th>
            <th onclick="changeSort('name')" <?php if ($order_by == 'name')  echo $active_sort_class ?>>Name</th>
            <th onclick="changeSort('authors')" <?php if ($order_by == 'authors')  echo $active_sort_class ?>>Authors</th>
            <th onclick="changeSort('date_published')" <?php if ($order_by == 'date_published') echo $active_sort_class ?>>Date Published</th>
            <th onclick="changeSort('genre')" <?php if ($order_by == 'genre') echo $active_sort_class ?>>Genre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $db->ExecuteQuery($query);
        while ($red = $db->getResult()->fetch_object()) :
        ?>
            <tr id="<?php echo "row-{$red->id}" ?>">
                <td><?php echo $red->id; ?></td>
                <td><?php echo $red->name; ?></td>
                <td><?php echo $red->authors; ?></td>
                <td><?php echo $red->date_published; ?></td>
                <td><?php echo $red->genre ? $red->genre : '--'; ?></td>
                <td>
                    <button onclick="editBook(<?php echo $red->id ?>)" class="btn btn-light">Edit</button>
                    <button onclick="deleteBook(<?php echo $red->id ?>)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>