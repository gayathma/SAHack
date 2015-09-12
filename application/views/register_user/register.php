<div class="modal fade " id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="user_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New User</h4>
            </div>

            <div class="modal-body">
                <form id="add_user_type_form" name="add_user_type_form"class="form-horizontal" role="form">

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                            <input name="name" type="text" class="form-control" id="name" placeholder=" ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">User Name</label>
                        <div class="col-lg-8">
                            <input name="user_name" type="text" class="form-control" id="user_name" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">User Type</label>
                        <div class="col-lg-8">
                            <input name="user_type" type="text" class="form-control" id="user_type" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">E-mail</label>
                        <div class="col-lg-8">
                            <input name="email" type="text" class="form-control" id="email" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Address</label>
                        <div class="col-lg-8">
                            <input name="address" type="text" class="form-control" id="address" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Contact No 01</label>
                        <div class="col-lg-8">
                            <input name="contact_no_1" type="text" class="form-control" id="contact_no_1" placeholder=" ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                            <input name="password" type="password" class="form-control" id="password" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Re-type Password</label>
                        <div class="col-lg-8">
                            <input name="re_pasword" type="password" class="form-control" id="re_pasword" placeholder=" ">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit" id="account-submit">Save</button>
                    </div>

                    <span id="rtn_msg"></span>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#account-submit').click(function () {
            var validator = $("#add_user_type_form").validate();
            validator.resetForm();

        });

        $("#add_user_type_form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contact_no_1: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                address: "required",
                user_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 30
                },
                password: "required",
                re_pasword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: "Please enter your name",
                email: {
                    required: "Please enter your email",
                    email: "Incorrect email address"

                },
                contact_no_1: "Please enter your telephone number",
                address: "Please enter your address",
                user_name: "Please enter a valid user name",
                password: "Please enter a password",
                re_password: {
                    required: "Confirm the password",
                    equalTo: "Passwords do not match"
                }
            }, submitHandler: function (form)
            {
                $.post(site_url + '/register_users/add_new_user', $('#add_user_type_form').serialize(), function (msg)
                {
                    if (msg == 1) {
                        $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Welcome!!</strong></div>');
                        add_user_type_form.reset();
                        window.location = site_url + '/register_users/load_registration';
                        toastr.success("Profile Successfully Created !!", "Zoo");

                    } else {
                        $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                    }
                });
            }

        });
    });



</script>

