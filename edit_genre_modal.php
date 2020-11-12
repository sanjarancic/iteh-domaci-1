<!-- Modal -->
<div class="modal fade" id="editGenreModal" tabindex="-1" aria-labelledby="editGenreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return editGenre(event)" id="editGenreForm" name="editGenreForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGenreModalLabel">Edit Genre</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden">
                        <input name="id" class="form-control" id="editGenreFormId" required aria-hidden>
                    </div>
                    <div class="form-group">
                        <label for="editGenreFormName">Name</label>
                        <input name="name" class="form-control" id="editGenreFormName" placeholder="Genre name..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>