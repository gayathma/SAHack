<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Animal Category Quick Edit</h4>
</div>
<form id="edit_animal_cat_form" name="edit_animal_cat_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Animal Category Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $animal_cat->ac_name; ?>">
            <input id="animal_cat_id" name="animal_cat_id" type="hidden" value="<?php echo $animal_cat->ac_id; ?>">
        </div>

        <div class="form-group">
            <label for="desc">Description<span class="mandatory">*</span></label>
            <textarea id="desc" class="form-control" name="desc" type="text" ><?php echo $animal_cat->ac_description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="latitude">Animal Location Latitude<span class="mandatory">*</span></label>
            <input id="latitude" class="form-control" name="latitude" type="text" value="<?php echo $animal_cat->ac_latitude; ?>">
        </div>

        <div class="form-group">
            <label for="longitude">Animal Location Longitude<span class="mandatory">*</span></label>
            <input id="longitude" class="form-control" name="longitude" type="text" value="<?php echo $animal_cat->ac_longitude; ?>">
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
    $("#edit_animal_cat_form").validate({
        rules: {
            name: "required",
            latitude: {
                required: true,
                number: true
            },
            longitude: {
                required: true,
                number: true
            }
        },
        submitHandler: function(form)
        {
            $.post(site_url + '/animal_category/edit_animal_cat', $('#edit_animal_cat_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                    window.location = site_url + '/animal_category/manage_animal_category';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });


        }
    });
</script>