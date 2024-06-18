<form class="form form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Title :</label>
                <input type="text" autocomplete="" value="<?= $page_data->title_hindi; ?>" name="title" id="projectinput1" class="form-control" required="">
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Content :</label>
                <textarea class="form-control" name="cktext" id="ckeditor1"><?= $page_data->content_hindi; ?></textarea>
            </div>
    
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Page/update_page/'.$page_data->id) ?>">
                    Update
                </button>
                <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

