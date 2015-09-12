
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Animal Categories
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#animal_cat_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="animal_cat_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="animal_cat_<?php echo $result->ac_id; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $result->ac_name; ?></td>
                                    <td><?php echo $result->ac_description; ?></td>
                                    <td><?php echo $result->ac_latitude; ?></td>
                                    <td><?php echo $result->ac_longitude; ?></td>

                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_animal_cat_pop_up(<?php echo $result->ac_id; ?>)"><i class="fa fa-pencil"  title="Update"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_animal_cat(<?php echo $result->ac_id; ?>)"><i class="fa fa-trash-o " title="" title="Remove"></i></a>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
</div>


<!--Animal Category Add Modal -->
<div class="modal fade " id="animal_cat_add_modal" tabindex="-1" role="dialog" aria-labelledby="animal_cat_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Animal Category</h4>
            </div>
            <form id="add_animal_cat_form" name="add_animal_cat_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Animal Category Name<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Animal Category Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="form-control" name="desc" placeholder="Enter Description"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="latitude">Animal Location Latitude<span class="mandatory">*</span></label>
                        <input id="latitude" class="form-control" name="latitude" type="text" placeholder="Enter Latitude">
                    </div>
                    
                    <div class="form-group">
                        <label for="longitude">Animal Location Longitude<span class="mandatory">*</span></label>
                        <input id="longitude" class="form-control" name="longitude" type="text" placeholder="Enter Longitude">
                    </div>

                    <span id="rtn_msg"></span>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>

                </div>
            </form>

        </div>
    </div>
</div>
<!-- modal -->

<!--Transmission Edit Modal -->
<div  class="modal fade "   id="animal_cat_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="animal_cat_edit_content">

        </div>
    </div>
</div>




<!-- active selected menu -->
<!--toastr-->
<script src="<?php echo base_url(); ?>assets/toastr-master/toastr.js"></script>
<script type="text/javascript">
                                                $('#vehicle_spec_menu').addClass('active');




                                                $(document).ready(function() {

                                                    $('#animal_cat_table').dataTable();

                                                    //add animal_cat form validation
                                                    $("#add_animal_cat_form").validate({
                                                        rules: {
                                                            name: "required",
                                                            latitude: {
                                                                required:true,
                                                                number:true
                                                            },
                                                            longitude: {
                                                                required:true,
                                                                number:true
                                                            }
                                                            
                                                        }, submitHandler: function(form)
                                                        {
                                                            $.post(site_url + '/animal_category/add_animal_cat', $('#add_animal_cat_form').serialize(), function(msg)
                                                            {
                                                                if (msg == 1) {
                                                                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');


                                                                    add_animal_cat_form.reset();
                                                                    window.location = site_url + '/animal_category/manage_animal_category';


                                                                } else {
                                                                    $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                                                                }
                                                            });
                                                        }
                                                    });

                                                });



                                                //delete animal_cats
                                                function delete_animal_cat(id) {

                                                    if (confirm('Are you sure want to delete this Animal Category ?')) {

                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + '/animal_category/delete_animal_cats',
                                                            data: "id=" + id,
                                                            success: function(msg) {
                                                                //alert(msg);
                                                                if (msg == 1) {
                                                                    //document.getElementById(trid).style.display='none';
                                                                    $('#animal_cat_' + id).hide();
                                                                    toastr.success("Successfully deleted !!", "Zooo");
                                                                }
                                                                else if (msg == 2) {
                                                                    toastr.error("Cannot be deleted as it is already assigned to others. !!", "Zooo");
                                                                }
                                                            }
                                                        });
                                                    }
                                                }


                                               
                                                //Edit animal_cat
                                                function  display_edit_animal_cat_pop_up(animal_cat_id) {

                                                    $.post(site_url + '/animal_category/load_edit_animal_cat_content', {animal_cat_id: animal_cat_id}, function(msg) {

                                                        $('#animal_cat_edit_content').html('');
                                                        $('#animal_cat_edit_content').html(msg);
                                                        $('#animal_cat_edit_div').modal('show');
                                                    });
                                                }
</script>
