<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">
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
    $('#addBookFormDate').datepicker({  format: 'yyyy-mm-dd',});
</script>