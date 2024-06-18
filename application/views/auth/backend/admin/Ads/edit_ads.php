<form class="form form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">

           <div class="col-md-3">
            <label class="label-control" for="projectinput1">Select Type :</label>
            <select class="form-control" name="type">
                 <option value=""></option>
                <option <?php if($ads_data->type == 'Horizontal'){echo "Selected"; } ?> value="Horizontal">Horizontal</option>
                  <option <?php if($ads_data->type == 'Vertical'){echo "Selected"; } ?> value="Vertical">Vertical</option>
                  <option <?php if($ads_data->type == 'Small'){echo "Selected"; } ?> value="Small">Small</option>
                      </select>
                  </div>

                   <div class="col-md-12 mb10">
                    <label class="label-control" for="projectinput1">Image :</label>
                    <input type="file" autocomplete="" name="image" id="projectinput1" class="form-control" >
                    <input type="hidden" name="old_image" value="<?= $ads_data->image; ?>" /><br>
                    <img style="width:150px; height:100px;" src="<?= base_url() ?><?= $ads_data->image; ?>" class="img-responsive" width="100px"  />
                </div>

                  <div class="col-md-12 mb10">
                    <label class="label-control" for="projectinput1">Link :</label>
                    <input type="text" autocomplete="" value="<?= $ads_data->link; ?>" name="link" id="projectinput1" class="form-control" required="">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Ads/update_ads/'.$ads_data->id) ?>">
                        Update
                    </button>
                    <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>

