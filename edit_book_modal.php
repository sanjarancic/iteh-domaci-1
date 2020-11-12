<!-- Modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return editBook(event)" id="editBookForm" name="editBookForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Edit book</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden">
                        <label for="editBookFormName">Name</label>
                        <input name="id" class="form-control" id="editBookFormId" required aria-hidden>
                    </div>
                    <div class="form-group">
                        <label for="editBookFormName">Name</label>
                        <input name="name" class="form-control" id="editBookFormName" placeholder="Book name..." required>
                    </div>
                    <div class="form-group">
                        <label for="editBookFormAuthors">Authors</label>
                        <input name="authors" class="form-control" id="editBookFormAuthors" placeholder="Comma separated list of book authors" required>
                    </div>
                    <div class="form-group">
                        <label for="editBookFormDate">Date published</label>
                        <input name="date_published" class="form-control" id="editBookFormDate" placeholder="YYYY-MM-DD" required>
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
    $('#editBookFormDate').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>