<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>

<body>

    <?php include 'obrada.php' ?>

    <?php
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

    $active_sort_class = "class='sort {$order_dir}'";
    ?>

    <table class="table">
        <thead>
            <tr>
                <th onclick="changeSort('id')" <?php if ($order_by == 'id') echo $active_sort_class ?>>#</th>
                <th onclick="changeSort('name')" <?php if ($order_by == 'name')  echo $active_sort_class ?>>Name</th>
                <th onclick="changeSort('authors')" <?php if ($order_by == 'authors')  echo $active_sort_class ?>>Authors</th>
                <th onclick="changeSort('date_published')" <?php if ($order_by == 'date_published') echo $active_sort_class ?>>Date Published</th>
                <th onclick="changeSort('genre')" <?php if ($order_by == 'genre') echo $active_sort_class ?>>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db->ExecuteQuery("SELECT books.*, genre.name as genre FROM books LEFT JOIN genre ON books.genre_id=genre.id ORDER BY {$order_by} {$order_dir}");
            while ($red = $db->getResult()->fetch_object()) :
            ?>
                <tr>
                    <td><?php echo $red->id; ?></td>
                    <td><?php echo $red->name; ?></td>
                    <td><?php echo $red->authors; ?></td>
                    <td><?php echo $red->date_published; ?></td>
                    <td><?php echo $red->genre ? $red->genre : '--'; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>