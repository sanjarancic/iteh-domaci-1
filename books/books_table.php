<?php
$query = "SELECT books.*, genre.name as genre
              FROM books 
              LEFT JOIN genre ON books.genre_id=genre.id 
              WHERE books.name LIKE '%{$where_clause}%'
              ORDER BY {$order_by} {$order_dir};";
?>

<?php include 'add_book_modal.php' ?>
<?php include 'edit_book_modal.php' ?>

<table class="table table-sm">
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
            <tr id="<?php echo "row-{$red->id}" ?>" data-value="<?php echo  htmlspecialchars(json_encode($red), ENT_QUOTES, 'UTF-8') ?>">
                <td><?php echo $red->id; ?></td>
                <td><?php echo $red->name; ?></td>
                <td><?php echo $red->authors; ?></td>
                <td><?php echo $red->date_published; ?></td>
                <td><?php echo $red->genre ? $red->genre : '--'; ?></td>
                <td>
                    <button onclick="openEditBookModal(<?php echo $red->id ?>)" class="btn btn-link btn-sm">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </button>
                    <button onclick="deleteBook(<?php echo $red->id ?>)" class="btn btn-danger btn-sm">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>