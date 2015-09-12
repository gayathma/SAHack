
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Transmissions
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#transmission_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="transmission_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
<!--                                <th>Added By</th>
                                <th>Added Date</th>-->
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="transmission_<?php echo $result->id; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $result->ac_name; ?></td>
                                    <td><?php echo $result->ac_description; ?></td>
                                    <td><?php echo $result->ac_latitude; ?></td>
                                    <td><?php echo $result->ac_longitude; ?></td>
    <!--                                    <td><?php echo $result->added_by_user; ?></td>
                                    <td><?php echo $result->added_date; ?></td>-->
                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate transmission"><i class="fa fa-check"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate transmission"><i class="fa fa-exclamation-circle"></i></a>
                                        <?php } ?>
                                    </td>

                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_transmission_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil"  title="Update"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_transmission(<?php echo $result->id; ?>)"><i class="fa fa-trash-o " title="" title="Remove"></i></a>

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
<div class="modal fade " id="transmission_add_modal" tabindex="-1" role="dialog" aria-labelledby="transmission_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Transmission</h4>
            </div>
            <form id="add_transmission_form" name="add_transmission_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Transmission<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Transmission">
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
<div  class="modal fade "   id="transmission_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="transmission_edit_content">

        </div>
    </div>
</div>




<!-- active selected menu -->
<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">
                                                $('#vehicle_spec_menu').addClass('active');




                                                $(document).ready(function() {

                                                    $('#transmission_table').dataTable();

                                                    //add transmission form validation
                                                    $("#add_transmission_form").validate({
                                                        rules: {
                                                            name: "required"
                                                        },
                                                        messages: {
                                                            name: "Please enter a transmission"
                                                        }, submitHandler: function(form)
                                                        {
                                                            $.post(site_url + '/transmission/add_transmission', $('#add_transmission_form').serialize(), function(msg)
                                                            {
                                                                if (msg == 1) {
                                                                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');


                                                                    add_transmission_form.reset();
                                                                    window.location = site_url + '/transmission/manage_transmissions';


                                                                } else {
                                                                    $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                                                                }
                                                            });
                                                        }
                                                    });

                                                });



                                                //delete transmissions
                                                function delete_transmission(id) {

                                                    if (confirm('Are you sure want to delete this Transmission ?')) {

                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + '/transmission/delete_transmissions',
                                                            data: "id=" + id,
                                                            success: function(msg) {
                                                                //alert(msg);
                                                                if (msg == 1) {
                                                                    //document.getElementById(trid).style.display='none';
                                                                    $('#transmission_' + id).hide();
                                                                    toastr.success("Successfully deleted !!", "AutoVille");
                                                                }
                                                                else if (msg == 2) {
                                                                    toastr.error("Cannot be deleted as it is already assigned to others. !!", "AutoVille");
                                                                }
                                                            }
                                                        });
                                                    }
                                                }


                                                //change publish status of transmission
                                                function change_publish_status(transmission_id, value, element) {

                                                    var condition = 'Do you want to activate this transmission ?';
                                                    if (value == 0) {
                                                        condition = 'Do you want to deactivate this transmission?';
                                                    }

                                                    if (confirm(condition)) {
                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + '/transmission/change_publish_status',
                                                            data: "id=" + transmission_id + "&value=" + value,
                                                            success: function(msg) {
                                                                if (msg == 1) {
                                                                    if (value == 1) {
                                                                        $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + transmission_id + ',0,this)" title="click to deactivate transmission"><i class="fa fa-check"></i></a>');
                                                                    } else {
                                                                        $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + transmission_id + ',1,this)" title="click to activate transmission"><i class="fa fa-exclamation-circle"></i></a>');
                                                                    }

                                                                } else if (msg == 2) {
                                                                    alert('Error !!');
                                                                }
                                                            }
                                                        });
                                                    }
                                                }


                                                //Edit Transmission
                                                function  display_edit_transmission_pop_up(transmission_id) {

                                                    $.post(site_url + '/transmission/load_edit_transmission_content', {transmission_id: transmission_id}, function(msg) {

                                                        $('#transmission_edit_content').html('');
                                                        $('#transmission_edit_content').html(msg);
                                                        $('#transmission_edit_div').modal('show');
                                                    });
                                                }
</script>
