

<header class="panel-heading">
    Manage Users
    <span class="tools pull-right">
        <a href="javascript:;" class="fa fa-chevron-down"></a>
        <a href="javascript:;" class="fa fa-times"></a>
    </span>
</header>
<!-- page start-->
<a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#user_add_modal" data-toggle="modal">
    Add New
    <i class="fa fa-plus"></i>
</a>
<br>
<br>



<!--User add model-->
<div class="modal fade " id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="user_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New User</h4>
            </div>

            <div class="modal-body">
                <form id="add_user_type_form" name="add_user_type_form"class="form-horizontal" role="form">
                    <script src="<?php echo base_url(); ?>backend_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script>
                                        //upload user avatar

                                        $(function () {
                                            var btnUpload = $('#upload');
                                            var status = $('#status');
                                            new AjaxUpload(btnUpload, {
                                                action: '<?php echo site_url(); ?>/users/upload_user_avatar',
                                                name: 'uploadfile',
                                                onSubmit: function (file, ext) {
                                                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                        // extension is not allowed 
                                                        status.text('Only JPG, PNG or GIF files are allowed');
                                                        return false;
                                                    }
                                                    //status.text('Uploading...Please wait');
                                                    //                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                                },
                                                onComplete: function (file, response) {
                                                    //On completion clear the status
                                                    //status.text('');
                                                    $("#files").html("");
                                                    $("#sta").html("");
                                                    //Add uploaded file to list
                                                    if (response != "error") {
                                                        $('#files').html("");
                                                        $('<div></div>').appendTo('#files').html('<img src="<?php echo base_url(); ?>/uploads/user_avatars/' + response + '" height="120px" width="100px" /><br />');
                                                        picFileName = response;
                                                        document.getElementById('profile_pic').value = response;
                                                        //                    document.getElementById('cover_image').value = response;
                                                    } else {
                                                        $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                    }
                                                }
                                            });
                                        });</script>

                    
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                            <input name="name" type="text" class="form-control" id="name" placeholder=" ">
                        </div>
                    </div>


                    

                    <div class="form-group">
                        <div class="col-lg-8">
                            <div id="files" class="project-logo">
                            </div>
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
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>

                    <span id="rtn_msg"></span>
                </form>
            </div>
        </div>
    </div>
</div>



<!--user Edit Modal -->
<div class="modal fade "  id="body_type_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="body_type_edit_content">

        </div>
    </div>
</div>
<!-- page end-->
<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                        $('#user_menu').addClass('active');
                                        //change Online status of body types
                                        
                                        //Add a new user
                                        $('#user_menu').addClass('active open');

                                        $(document).ready(function () {
                                            $("#add_user_type_form").validate({
                                                rules: {
                                                  
                                                    name: {
                                                        required: true
                                                    },
                                                    user_name: "required",
                                                    user_type: {
                                                        required: true,
                                                        digits: true
                                                    },
                                                    email: {
                                                        required: true,
                                                        email: true
                                                    },
                                                    address: "required",
                                                    contact_no_1: {
                                                        required: true,
                                                        digits: true,
                                                        minlength: 10,
                                                        maxlength: 10
                                                    },
                                                    
                                                    password: "required",
                                                    re_pasword: {
                                                        required: true,
                                                        equalTo: '#password'
                                                    }

                                                },
                                                messages: {
                                                 
                                                    name: {
                                                        required: "Please enter a name"
                                                    },
                                                    user_name: "Please enter a user name",
                                                    user_type: {
                                                        required: "Please enter a user type",
                                                        digits: "Invalid user type"
                                                    },
                                                    email: {
                                                        required: "Please enter a email",
                                                        email: "Invalid Email"
                                                    },
                                                    address: "Please enter a address",
                                                    contact_no_1: {
                                                        required: "Please enter a phone no",
                                                        digits: "Enter numbers only",
                                                        maxlength: "Phone number is too long",
                                                        minlength: "Phone number is too short"
                                                    },
                                               
                                                    password: "Please enter a password",
                                                    re_pasword:
                                                            {
                                                                required: "Retype the Password",
                                                                equalTo: "Passwords are not matching"
                                                            }
                                                }, submitHandler: function (form) {
                                                    $.post(site_url + '/register_users/add_new_user', $('#add_user_type_form').serialize(), function (msg)
                                                    {

                                                        if (msg == 1) {
                                                            $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                            add_user_type_form.reset();
                                                            window.location = site_url + '/users/manage_admins';
                                                            toastr.success("Profile Successfully Created !!", "Zoo");


                                                        } else {
                                                            $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                                                        }
                                                    });
                                                }
                                            }
                                            );
                                        });



</script>