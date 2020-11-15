<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addBookModal">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </svg>
    Add new Book
</button>

<!-- Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return addBook(event)" id="addBookForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add new Book</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addBookFormName">Name</label>
                        <input name="name" class="form-control" id="addBookFormName" placeholder="Book name..." required>
                    </div>
                    <div class="form-group">
                        <label for="addBookFormAuthors">Authors</label>
                        <input name="authors" class="form-control" id="addBookFormAuthors" placeholder="Comma separated list of book authors" required>
                    </div>
                    <div class="form-group">
                        <label for="addBookFormDate">Date published</label>
                        <input name="date_published" class="form-control" id="addBookFormDate" placeholder="YYYY-MM-DD" required>
                    </div>
                    <select name="genre_id" class="custom-select" required>
                        <?php
                        $db->ExecuteQuery("SELECT * FROM genre");
                        while ($red = $db->getResult()->fetch_object()) :
                        ?>
                            <option value="<?php echo $red->id ?>"><?php echo $red->name ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#addBookFormDate').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>