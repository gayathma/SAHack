<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Transmission Quick Edit</h4>
</div>
<form id="edit_transmission_form" name="edit_transmission_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Transmission<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $transmission->name; ?>">
            <input id="transmission_id"  name="transmission_id" type="hidden" value="<?php echo $transmission->id; ?>">
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    //edit transmission form validation
    $("#edit_transmission_form").validate({
        rules: {
            name: "required"
        },
        messages: {
            name: "Please enter a transmission"
        }, submitHandler: function(form)
        {
            $.post(site_url + '/transmission/edit_transmission', $('#edit_transmission_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                    window.location = site_url + '/transmission/manage_transmissions';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });


        }
    });
</script>