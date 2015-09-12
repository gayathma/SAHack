
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Animal Treatments
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#a_treatment_add_modal" data-toggle="modal">
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
                                <th>Description</th>
                                <th>Date</th>
                                 <th>Done by</th>
                                 <th>Animal Name</th>
                                 <th>Treatment Type</th>
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="transmission_<?php echo $result->at_id; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $result->at_name; ?></td>
                                     <td><?php echo $result->at_description; ?></td>
                                     <td><?php echo $result->at_date; ?></td>
                                     <td><?php echo $result->at_done_by; ?></td>
                                     <td><?php echo $result->at_animal_id; ?></td>
                                     <td><?php echo $result->at_treatment_id; ?></td>                             
                                     
                                     
    <!--                                    <td><?php //echo $result->added_by_user; ?></td>
                                    <td><?php// echo $result->added_date; ?></td>-->
                                    <td align="center">
                                        <?php if ($result->at_delete_index=='0') { ?>
                                            <a class="btn btn-success btn-xs" onclick="" title="click to deactivate transmission"><i class="fa fa-check">Not Deleted</i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning btn-xs" onclick="" title="click to activate transmission"><i class="fa fa-exclamation-circle">Delete</i></a>
                                        <?php } ?>
                                    </td>

                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_treatment(<?php echo $result->at_id; ?>)"><i class="fa fa-pencil"  title="Update"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_treatment(<?php echo $result->at_id; ?>)"><i class="fa fa-trash-o " title="" title="Remove"></i></a>

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
<div class="modal fade " id="a_treatment_add_modal" tabindex="-1" role="dialog" aria-labelledby="treatment_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Animal Treatment Details</h4>
            </div>
            <form id="add_a_treatment_form" name="add_a_treatment_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Treatment name<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Treatment Name:">
                    
                       
                    
                    
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Treatment Description<span class="mandatory"></span></label>
                       
                    
                        <input id="description" class="form-control" name="description" type="text" placeholder="Enter Treatment description:">
                    
                    
                    </div>
                    
                    
                     <div class="form-group">
                        <label for="name">Animal<span class="mandatory">*</span></label>
                       
                    <select class="form-control" name="at_animal_id" id="at_animal_id" onchange="get_id(this)"data-rule-required="true">
                                <option value="">-- Please select --</option>
                                <?php foreach ($animal_details as $ad) { ?>
                                    <option value="<?php echo $ad->a_id ?>"><?php echo $ad->a_name ?></option>


                                <?php } ?>
                            </select>
                        
                    
                    </div
                    
                    
                      <div class="form-group">
                        <label for="name">Treatment Type<span class="mandatory">*</span></label>
                       
                            <select class="form-control" name="at_t_id" id="at_t_id" onchange="get_id(this)"data-rule-required="true">
                                <option value="">-- Please select --</option>
                                <?php foreach ($treatment_detils as $td) { ?>
                                    <option value="<?php echo $td->t_id ?>"><?php echo $td->t_name ?></option>


                                <?php } ?>
                            </select>
                    
                    
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
<div  class="modal fade "   id="treatment_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="treatment_edit_content">

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
                                                    $("#add_treatment_form").validate({
                                                        rules: {
                                                            name: "required",
                                                            at_animal_id: "required",
                                                            at_t_id: "required"
                                                            
                                                        },
                                                        messages: {
                                                            name: "Please enter a name",
                                                            at_animal_id: "required",
                                                            at_t_id: "required"
                                                        }, submitHandler: function(form)
                                                        {
                                                            $.post(site_url + '/animal_treatment/add_animal_treatment', $('#add_a_treatment_form').serialize(), function(msg)
                                                            {
                                                                if (msg == 1) {
                                                                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');


                                                                    add_treatment_form.reset();
                                                                  window.location = site_url + '/animal_treatment/index';


                                                                } else {
                                                                    $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                                                                }
                                                            });
                                                        }
                                                    });

                                                });



                                                //delete transmissions
                                                function delete_treatment(id) {

                                                    if (confirm('Are you sure want to delete this Transmission ?')) {

                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + '/treatment/delete_treatment',
                                                            data: "id=" + id,
                                                            success: function(msg) {
                                                                //alert(msg);
                                                                if (msg == 1) {
                                                                    //document.getElementById(trid).style.display='none';
                                                                  //  $('#transmission_' + id).hide();
                                                                    location.reload();
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
                                                function  display_edit_treatment(t_id) {

                                                    $.post(site_url + '/treatment/load_edit_treatment_content', {t_id: t_id}, function(msg) {

                                                        $('#treatment_edit_content').html('');
                                                        $('#treatment_edit_content').html(msg);
                                                        $('#treatment_edit_div').modal('show');
                                                    });
                                                }
</script>


