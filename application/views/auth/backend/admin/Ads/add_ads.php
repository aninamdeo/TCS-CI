<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Add Partners</h4>
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
                        <form class="form form-horizontal striped-labels form-bordered" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <table class = 'table table-bordered'>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Ordering</th>
                                        <td><input type="text" name="ordered" class="form-control"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-lg btn-primary" formaction="<?= base_url();?>Admin/Partners/insert_partners">
                                    <i class="icon-check2"></i> Save
                                </button>
                                <?php if($this->session->flashdata('msg') !='')
                                        { echo '<script>
                                                    $(document).ready(function(){
                                                        swal("Successfully Add!"," New Partner!","success")
                                                    });
                                                </script>';
                                        }?> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>