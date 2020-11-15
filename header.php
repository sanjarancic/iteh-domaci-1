<?php $current_route = explode('/', $_SERVER['REQUEST_URI'])[2] ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($current_route == 'books') echo 'active' ?>" href="/domaci1/books">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($current_route == 'genre') echo 'active' ?>" href="/domaci1/genre">Genres</a>
            </li>
        </ul>
    </div>

    <form action="" method="get">
        <input type="text" name="query" value="<?php echo $where_clause ?>" class="form-control" placeholder="Search">
    </form>
</nav>