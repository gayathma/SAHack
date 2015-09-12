
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Animals
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#animal_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="animal_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Desc</th>
                                <th>Animal Category</th>
                                <th>Date Of Birth</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="animal_<?php echo $result->a_id; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $result->a_name; ?></td>
                                    <td><img scr="<?php echo base_url(); ?>uploads/animal_image/<?php echo $result->image; ?>" width="60px"/></td>
                                    <td><?php echo $result->a_description; ?></td>
                                    <td><?php echo $result->category; ?></td>
                                    <td><?php echo $result->a_dob; ?></td>

                                    <td align="center">
                                        <!--<a class="btn btn-primary btn-xs" onclick="display_edit_animal_pop_up(<?php // echo $result->a_id; ?>)"><i class="fa fa-pencil"  title="Update"></i></a>-->
                                        <a class="btn btn-danger btn-xs" onclick="delete_animal(<?php echo $result->a_id; ?>)"><i class="fa fa-trash-o " title="" title="Remove"></i></a>

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


<!--Transmission Add Modal -->
<div class="modal fade " id="animal_add_modal" tabindex="-1" role="dialog" aria-labelledby="animal_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Animal</h4>
            </div>
            <form id="add_animal_form" name="add_animal_form">
                <div class="modal-body">
                    <script src="<?php echo base_url(); ?>assets/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script>
                                            //upload manufacture logo

                                            $(function() {
                                                var btnUpload = $('#upload');
                                                var status = $('#status');
                                                new AjaxUpload(btnUpload, {
                                                    action: '<?php echo site_url(); ?>/animal/upload_animal_image',
                                                    name: 'uploadfile',
                                                    onSubmit: function(file, ext) {
                                                        if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                            // extension is not allowed 
                                                            status.text('Only JPG, PNG or GIF files are allowed');
                                                            return false;
                                                        }
                                                        //status.text('Uploading...Please wait');
                                                        //                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                                    },
                                                    onComplete: function(file, response) {
                                                        //On completion clear the status
                                                        //status.text('');
                                                        $("#files").html("");
                                                        $("#sta").html("");
                                                        //Add uploaded file to list
                                                        if (response != "error") {
                                                            $('#files').html("");
                                                            $('<div></div>').appendTo('#files').html('<img src="<?php echo base_url(); ?>uploads/animal_image/' + response + '"   width="100px" height="68px" /><br />');
                                                            $('#logo_image').val(response);
                                                            //                    document.getElementById('cover_image').value = response;
                                                        } else {
                                                            $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                        }
                                                    }
                                                });

                                            });


                    </script>

                    <div class="form-group">
                        <label for="name">Name<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Transmission">
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="form-control" name="desc" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Animal Category<span class="mandatory">*</span></label>
                        <select id="category" class="form-control" name="category">
                            <option value="">-Select Category-</option>
                            <?php foreach ($cats as $cat) { ?>
                                <option value="<?php echo $cat->ac_id; ?>"><?php echo $cat->ac_name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input id="dob" class="form-control" type="text" name="dob" placeholder="Enter Date Of Birth"/>
                    </div>
                    <div class="form-group">
                        <label for="dod">Date Of Death</label>
                        <input id="dod" class="form-control" type="text" name="dod" placeholder="Enter Date Of Death"/>
                    </div>

                    <div class="form-group">
                        <div id="upload">

                            <label class="form-label">Upload Animal</label>
                            <button type="button" class="btn btn-info" id="browse">Browse</button>
                            <input type="hidden" id="logo_image" name="logo_image"  value=""/>
                        </div>
                        <div id="sta"><span id="status" ></span></div>
                    </div>

                    <div class="form-group">
                        <div id="files" class="project-logo">
                        </div>
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
<div  class="modal fade "   id="animal_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="animal_edit_content">

        </div>
    </div>
</div>




<!-- active selected menu -->
<!--toastr-->
<script src="<?php echo base_url(); ?>assets/toastr-master/toastr.js"></script>
<script type="text/javascript">
    $('#advertisements_menu').addClass('active');




    $(document).ready(function() {

        $('#animal_table').dataTable();

        //add animal form validation
        $("#add_animal_form").validate({
            rules: {
                name: "required",
                category: "required"
            }, submitHandler: function(form)
            {
                $.post(site_url + '/animal/add_animal', $('#add_animal_form').serialize(), function(msg)
                {
                    if (msg == 1) {
                        $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');


                        add_animal_form.reset();
                        window.location = site_url + '/animal/manage_animal';


                    } else {
                        $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                    }
                });
            }
        });

    });



    //delete animals
    function delete_animal(id) {

        if (confirm('Are you sure want to delete this Transmission ?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/animal/delete_animals',
                data: "id=" + id,
                success: function(msg) {
                    //alert(msg);
                    if (msg == 1) {
                        //document.getElementById(trid).style.display='none';
                        $('#animal_' + id).hide();
                        toastr.success("Successfully deleted !!", "ZOOO");
                    }
                    else if (msg == 2) {
                        toastr.error("Cannot be deleted as it is already assigned to others. !!", "Zoooo");
                    }
                }
            });
        }
    }



    //Edit Transmission
    function  display_edit_animal_pop_up(animal_id) {

        $.post(site_url + '/animal/load_edit_animal_content', {animal_id: animal_id}, function(msg) {

            $('#animal_edit_content').html('');
            $('#animal_edit_content').html(msg);
            $('#animal_edit_div').modal('show');
        });
    }
</script>
