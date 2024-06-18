<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                  <a  class="btn btn-primary pull-right" href="<?= base_url('Auth/Backend/Page') ?>"> View Page </a></h4>
                <h4 class="card-title"><i class="ft-user"></i> Add New Page
              </div>
              <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control text_type" for="projectinput1">Page Name</label>
                                  <input type="text" name="pagename" class="form-control" required="">
                                </div>
                                <div class="col-md-12">
                                <label class="label-control text_type" for="projectinput1">Title</label>
                                    <input type="text" name="title_hindi" class="form-control" required="">
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Content:</label>
                                    <textarea class="form-control" name="cktext_hindi" id="ckeditor"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Page/insert_page') ?>">
                                        Save
                                    </button>
                                    <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <!--/ Description -->
</div>