<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Edit Sub Category</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <?php foreach($sub_cat as $data) {?>
                        <form action="<?= base_url('Admin/Sub_Category/update_sub_category/'.$data->id);?>" method="post">  
                            <table class = 'table table-bordered'>
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>
                                            <select name="category" class="form-control" id="" required>
                                                <option value="">Select Category Name</option>
                                                <?php foreach($category as $data1){?>
                                                <option <?php if($data1->id == $data->cid){echo "selected";} ?> value="<?= $data1->id; ?>"><?= $data1->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sub Category Name</th>
                                        <td>
                                            <input type="text" name="name" class="form-control" value="<?= $data->name; ?>" required>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                            </div>

                        </form>
                        <?php } ?>    
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">View Sub Category</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-horizontal striped-labels form-bordered" method="post">
                            <div class="form-body">
                                <table id="example1" class = 'table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($sub_category as $data) {?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td>
                                                <?php $qry = $this->db->select('*')->from('category')->where('id',$data->cid,'type','Category')->get(); foreach($qry->result() as $category)
                                                {echo $category->name;} ?>
                                                </td>
                                                <td><?= $data->name; ?></td>
                                                <td>       
                                                    <a href="<?= base_url('Admin/Sub_Category/edit_sub_category/'.$data->id) ?>" class="btn btn-success"><i class="icon-android-create"></i></a>

                                                    <a href="<?= base_url('Admin/Sub_Category/delete_sub_category/'.$data->id) ?>" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This Sub Category')" style="color:white;"><i class="icon-android-close"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  