<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Treatment Details Quick Edit</h4>
</div>
<form id="edit_treat_cat_form" name="edit_treat_cat_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Treatment  Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $treatment->t_name; ?>">
            <input id="treat_cat_id" name="treat_cat_id" type="hidden" value="<?php echo $treatment->t_id; ?>">
        </div>

        <div class="form-group">
            <label for="desc">Description<span class="mandatory">*</span></label>
            <textarea id="desc" class="form-control" name="desc" type="text" ><?php echo $treatment->t_description; ?></textarea>
        </div>

        
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    //edit animal_cat form validation
    $("#edit_treat_cat_form").validate({
        rules: {
            name: "required"
           
        },
        submitHandler: function(form)
        {
            $.post(site_url + '/treatment/edit_treat_cat', $('#edit_treat_cat_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                    window.location = site_url + '/treatment/index';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });


        }
    });
</script>
