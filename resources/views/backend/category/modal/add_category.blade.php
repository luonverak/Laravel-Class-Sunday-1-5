<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add category</h1>
            </div>
            <div class="modal-body category">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control mb-2">
                    <label for="description">Description</label>
                    <textarea id="description" rows="5" class="form-control  mb-2"></textarea>
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" class="form-control  mb-2">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-category">Save</button>
            </div>
        </div>
    </div>
</div>
