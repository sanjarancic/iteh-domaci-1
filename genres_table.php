<?php
$query = "SELECT *
            FROM genre 
            WHERE genre.name LIKE '%{$where_clause}%'
            ORDER BY {$order_by} {$order_dir};";

?>

<?php include 'add_genre_modal.php' ?>
<?php include 'edit_genre_modal.php' ?>

<form action="" method="get">
    <input type="text" name="query" value="<?php echo $where_clause ?>" class="form-control" placeholder="Search">
</form>

<table class="table">
    <thead>
        <tr>
            <th onclick="changeSort('id')" <?php if ($order_by == 'id') echo $active_sort_class ?>>#</th>
            <th onclick="changeSort('name')" <?php if ($order_by == 'name')  echo $active_sort_class ?>>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $db->ExecuteQuery($query);
        while ($red = $db->getResult()->fetch_object()) :
        ?>
            <tr id="<?php echo "genre-row-{$red->id}" ?>" data-value="<?php echo  htmlspecialchars(json_encode($red), ENT_QUOTES, 'UTF-8') ?>">
                <td><?php echo $red->id; ?></td>
                <td><?php echo $red->name; ?></td>
                <td>
                    <button onclick="openEditGenreModal(<?php echo $red->id ?>)" class="btn btn-light">Edit</button>
                    <button onclick="deleteGenre(<?php echo $red->id ?>)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>