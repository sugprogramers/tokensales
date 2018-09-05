<style>

    .formregistro .registro-intro-ventajas {
        color:#91ccc9;
        font-size:32px;
        font-weight:500
    }
    .formregistro .registro-ventaja {
        margin-top:25px;
        font-weight:400
    }
    .formregistro .conditions {
        position:relative;
        display:none;
        width:100%
    }
    .formregistro .conditions .close-conditions {
        position:absolute;
        top:6px;
        right:10px;
        font-weight:bold;
        text-transform:uppercase
    }


    .formregistro .form-control {
        font-size:14px
    }
    .formregistro .radios.user-type input {
        margin-left:10px
    }
    .formregistro .registro-intro-ventajas {
        color:#91ccc9;
        font-size:32px;
        font-weight:500
    }
    .formregistro .registro-ventaja {
        margin-top:25px;
        font-weight:400
    }
    .formregistro .conditions {
        position:relative;
        display:none;
        width:100%
    }
    .formregistro .conditions .close-conditions {
        position:absolute;
        top:6px;
        right:10px;
        font-weight:bold;
        text-transform:uppercase
    }
    .formregistro .password-wrong {
        padding:10px;
        border:1px solid #f99;
        background-color:#fff5f5;
        display:none;
        border-radius:3px;
        margin-bottom:15px;
        font-size:13px;
        font-weight:500
    }    

</style> 
<div class="page">
    <div class="page-content" style="background:rgba(255, 255, 255, 1); color:#463d3e; padding-top: 0px; margin-top: 0px"> 

        <h2>Register as a user</h2>

        <div class="modal-body">
            <form id="register_form" class="with-labels formregistro" action="/en/subscription" method="post" role="form">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Register as: &nbsp</label>
                            <div class="radio-custom radio-default radio-inline">
                                <input type="radio" id="inputInvestor" name="usertype" value="investor" checked="">
                                <label for="role0">Supporter</label>
                            </div>
                            <div class="radio-custom radio-default radio-inline">
                                <input type="radio" id="inputCompany" name="usertype" value="company">
                                <label for="role1">Entrepreneur</label>
                            </div>
                        </div>                        

                        <div class="row">
                            <div class="col-sm-6" id="inputNameSection">

                                <div class="form-group ">
                                    <label class="control-label usuario" id="lblName" for="userFirstName">Name*</label>
                                    <label class="control-label usuario text-hide" id="lblComercialName" for="userFirstName">Name of the legal representative*</label>
                                    <input type="text" required class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6" id="inputLastnameSection">

                                <div class="form-group ">
                                    <label class="control-label" for="userLastName">Lastname *</label>
                                    <input type="text" required class="form-control" id="inputLastname" name="lastname" placeholder="Last Name" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div>  


                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="userEmail">Email address *</label>
                                    <input type="email" required class="form-control" id="inputEmail" name="email" placeholder="Email address" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="password">Password *</label>                                    
                                    <input type="password" id="inputPassword" name="password" value="" class="form-control password-control" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!¡¿?*()%^&amp;+=]).{8,}" placeholder="Password" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div>                          


                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="userLastName">Phone *</label>
                                    <input type="tel" required class="form-control" id="inputPhone" name="phone" data-plugin="formatter" data-pattern="+[[999]] [[999]]-[[999]]-[[9999]]" style="font-size: 14px; border-radius:0;">
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="birthday">Birthday *</label>
                                    <br>

                                    <input type="text" required class="form-control" class="form-control" placeholder="MM/DD/YYYY" data-plugin="datepicker" id="inputBirthday" name="birthday" style="font-size: 14px; border-radius:0;">                                    

                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>                        

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Country *</label>
                                    <select id="country_cmb" required class="form-control" name="country" required="" placeholder="Country" style="font-size: 14px; border-radius:0;"></select>                      

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Region *</label>
                                    <select id="region_cmb" required class="form-control" name="region" required="" placeholder="Region" style="font-size: 14px; border-radius:0;"></select>                        

                                </div>

                            </div>                          
                        </div> 

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">City *</label>
                                    <input type="text" required class="form-control" id="inputCity" name="city" placeholder="City" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Postal Code *</label>
                                    <input type="text" required class="form-control" id="inputPostal" name="postal" placeholder="Postal Code" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div> 

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Address Line 1*</label>
                                    <input type="text" required class="form-control" id="inputAddress1" name="address1" placeholder="Address Line 1" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label class="control-label" for="country">Address Line 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Address Line 2" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div>                         

                        <div class="form-group">

                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" id="acceptsConditions" name="acceptsConditions" checked="" autocomplete="off">
                                <label for="inputBasicRemember"> I accept the <a href="#">terms and conditions</a> of Smart Developer</label>

                            </div>

                        </div>       


                        <input type="hidden" name="step" value="one">

                        <div id="wrongPassDiv" class="summary-errors alert alert-danger alert-dismissible">The password must contain at least 8 characters and consist of at least one uppercase letter, one lowercase letter, one number and one symbol.<br><br> <strong>Symbols allowed: @ , # , $ , ! , ¡ , ¿ , ? , * , ( , ) , % , ^ , &amp; , + , = </strong></div>

                        <div class="form-group">
                            <input type="hidden" name="helpMyCashClickId" value="">
                            <button type="submit" class="btn btn-primary center-block password-check" style="margin-top: 10px;color:#000;font-size: 16px;background-color: #6cd9d0;">REGISTER</button>
                        </div>
                    </div>

                    <div class="col-md-6 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="col-md-12 registro-intro-ventajas">Sign up with Crowd Capital Partners and </div>
                            <div class="col-md-12 registro-intro-ventajas">get your money working for you today…</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-1.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px; padding-top:10px;">Signing up with Crowd Capital Partners is completely free, obligation or otherwise</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-2.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px; padding-top:5px;">There are no fees associated with depositing or withdrawing funds from your account</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-3.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px; padding-top:0px;">Once you complete signing up (or registration) and your account has been approved, you will have access to all the opportunities available to support on Crowd Capital Partners</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-4.png" alt=""></div>                            
                            <div class="col-md-10" style="padding-left:0px; padding-top:10px;">With as little as $100 you can get your money working for you like never before</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-5.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px; padding-top:10px;">Earn from the moment your project is completely funded!</div>
                        </div>                                                
                    </div>

                </div>
            </form>

            <p>Have account already? Please go to <a href="login">Sign In</a></p>

        </div>

    </div>
</div>


<script type="text/javascript">
    window.onload = function () {
        //example sinserialize
        //var product_code = $('#product_code').val();
        //data : {product_code:product_code , product_name:product_name, price:price},

        // onload country_cmb
        $.ajax({
            url: "<?php echo base_url('Register_Controller/get_country_list') ?>",
            type: "POST",
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#country_cmb").empty();
                $("#country_cmb").append(resp.html);

                $('#country_cmb').trigger('change');
            }
        });

        $("#country_cmb").change(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Register_Controller/get_region_list') ?>",
                type: "POST",
                data: {"countryId": $('#country_cmb').val()},
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    $("#region_cmb").empty();
                    $("#region_cmb").append(resp.html);
                }
            });
        });

        $('input[type=radio][name=usertype]').change(function () {
            if (this.value === 'investor') {
                $("#lblName").removeClass('text-hide');
                $("#lblComercialName").addClass('text-hide');
                $("#inputFirstname").attr("placeholder", "Firstname");

                $("#inputLastname").prop('required', true);

                $('#inputNameSection').addClass('col-sm-6').removeClass('col-sm-12');
                $("#inputLastnameSection").show();

            } else if (this.value === 'company') {
                $("#lblName").addClass("text-hide");
                $("#lblComercialName").removeClass("text-hide");
                $("#inputFirstname").attr("placeholder", "Comercial Name");

                $("#inputLastname").prop('required', false);

                $('#inputNameSection').addClass('col-sm-12').removeClass('col-sm-6');
                $("#inputLastnameSection").hide();
            }
        });

        $('#wrongPassDiv').hide();
        $('input[type=password][name=password]')[0].oninvalid = function () {            
            //this.setCustomValidity("Please enter at least 8 length. Symbols allowed: @, #, $, !, ¡, ¿, ?, *, (, ), %, ^, &, +, =");
            $('#wrongPassDiv').show();            
        };


        $("#register_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Register_Controller/register_user') ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }
                    if (resp.status === "success") {
                        showSuccess("SUCCESS");
                        $('#modal_register').modal('show');
                        // window.location.href = resp.redirect;
                    }

                }
            });
        });

        $("#modal_finalize").click(function (event) {
            window.location.href = "<?php echo base_url('Login_Controller') ?>";
        });

    };


</script>



<!-- Modal -->
<div class="modal fade modal-3d-slit in" id="modal_register" aria-hidden="true" aria-labelledby="examplePositionCenter"
     role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-simple modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button> -->
                <h4 class="modal-title">Registration Successful</h4>
            </div>
            <div class="modal-body">
                <h5><p>Congratulations on sucessfully creating your account. You may now go to login page to sing-in.</p></h5>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button id="modal_finalize" type="button" class="btn btn-primary">Return to Login</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->    