<style>
    #passwordChangeForm{
        background-color:#ffffff;
        border:1px solid #ccc;
        padding:20px 25px 5px 25px;
        margin:0 auto
    }

    #passwordChangeForm input{
        height:42px
    }

    #passwordChangeForm label,#passwordChangeForm p{
        font-size:16px;color:#463d3e;font-weight:normal
    }

    .interior.privatearea.password-change #passwordChangeForm .resumee{
        background-color:transparent
    }

    .interior.privatearea.password-change #passwordChangeForm .password-check{
        width:100%
    }

    .interior.privatearea.password-change h2{
        text-align:center;margin:20px 0 40px 0!important;font-size:28px!important
    }
    .separador-6{padding:3px;width:10px}
    .separador-12{padding:6px;width:10px}
    .separador-16{padding:8px;width:10px}
    .separador-24{padding:12px;width:10px}
    .separador-30{padding:15px;width:10px}
    .separador-40{padding:20px;width:10px}
    .separador-50{padding:25px;width:10px}
    .separador-60{padding:30px;width:10px}
    .separador-100{padding:50px;width:10px}

    .form-group{margin-top:20px}
</style>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Change Password</h1>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">

                        <form method="post" id="passwordChangeForm">
                            <p>You can change your password here:</p>
                            <div></div>
                            <div class="resumee">
                                <div class="passwordInputWrapper">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label" for="password">New password</label>
                                        <input type="password" id="password" name="password" value="" class="form-control password-control" required="" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!¡¿?*()%^&amp;+=]).{8,}" placeholder="Password">

                                    </div>
                                </div>
                                <div class="separador-1"></div>
                                <div class="passwordInputWrapper">

                                    <div class="form-group col-md-12">
                                        <label class="form-control-label" for="passwordRepeat">Repeat password</label>
                                        <input type="password" id="passwordRepeat" name="passwordRepeat" value="" class="form-control password-control-repeat" required="" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!¡¿?*()%^&amp;+=]).{8,}" placeholder="Password">

                                    </div>

                                </div>

                                <div id="wrongPass" class="password-wrong">The password must contain at least 8 characters and consist of at least one uppercase letter, one lowercase letter, one number and one symbol.<br><br> <strong>Symbols allowed: @ , # , $ , ! , ¡ , ¿ , ? , * , ( , ) , % , ^ , &amp; , + , = </strong></div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>
</div>




<script type="text/javascript">
    window.onload = function () {
        $("#passwordChangeForm").submit(function (event) {
            event.preventDefault();

            var password = $('#password').val();
            var passwordRepeat = $('#passwordRepeat').val();

            if (!password || !passwordRepeat) {
                showError('Missing all required fields');
                return;
            }

            if (password !== passwordRepeat) {
                showError('Repeat Password does not match new password');
                return;
            }


            $.ajax({
                url: "<?php echo base_url('Company_Changepassword_Controller/changePassword') ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        if (resp.msg === "missingFields") {
                            showError('Missing all required fields');
                        } else if (resp.msg === "passwordMismatch") {
                            showError('Repeat Password does not match new password');
                        } else if (resp.msg === "malformedPassword") {
                            showError('Password does not follow the required restrictions');
                        } else {
                            showError(resp.msg);
                        }

                    } else if (resp.status === "success") {
                        showSuccess('Your information has been updated.');
                        $('#password').val("");
                        $('#passwordRepeat').val("");
                    }

                }
            });
        });
    };
</script>