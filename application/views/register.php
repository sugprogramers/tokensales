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

                        <div class="form-group form-inline radios user-type ">
                            <label>Register as:</label>
                            <input type="radio" id="inputInvestor" name="usertype" value="investor" checked="">

                            <label for="role0">Individual</label>
                            <input type="radio" id="inputCompany" name="usertype" value="company">

                            <label for="role1">Company</label>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label usuario" for="userFirstName">Name*</label>
                                    <input type="text" required class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6">

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
                                    <input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div>                          
                                           
                        
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="userLastName">Phone *</label>
                                    <!--<input type="tel" required class="form-control" id="inputPhone" name="phone" placeholder="Phone" style="font-size: 14px; border-radius:0;">-->
                                    <input type="tel" required class="form-control" id="inputPhone" data-plugin="formatter" data-pattern="+[[999]] [[999]]-[[999]]-[[9999]]">
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="userPhone">Birthday *</label>
                                    <br>

                                    <input type="text" required class="form-control" class="form-control" data-plugin="datepicker" id="inputBirthday" name="birthday" style="font-size: 14px; border-radius:0;">                                    

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
                                    <label class="control-label" for="country">Address Line 1</label>
                                    <input type="text" required class="form-control" id="inputAddress1" name="address1" placeholder="Address 1" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="country">Address Line 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Address 2" style="font-size: 14px; border-radius:0;">

                                </div>

                            </div>                          
                        </div>                         

                        <div class="checkbox">

                            <div class="form-group ">
                                <label class="acceptsConditions">
                                    <input type="hidden" name="_acceptsConditions" value="on">
                                    <input type="checkbox" id="acceptsConditions" name="acceptsConditions" checked> I accept the <a href="#">terms and conditions</a> of Smart Developer 

                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="step" value="one">

                        <div id="wrongPass" class="password-wrong">The password must contain at least 8 characters and consist of at least one uppercase letter, one lowercase letter, one number and one symbol.<br><br> <strong>Symbols allowed: @ , # , $ , ! , ¡ , ¿ , ? , * , ( , ) , % , ^ , &amp; , + , = </strong></div>

                        <div class="form-group">
                            <input type="hidden" name="helpMyCashClickId" value="">
                            <button type="submit" class="btn btn-primary center-block password-check" style="margin-top: 10px;color:#000;font-size: 16px;background-color: #6cd9d0;">REGISTER</button>
                        </div>
                    </div>

                    <div class="col-md-6 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="col-md-12 registro-intro-ventajas">Sign up with Smart Developer</div>
                            <div class="col-md-12 registro-intro-ventajas">There only benefits:</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-1.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px">Signing up with Smart developer does not imply any obligation and is completely free</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-2.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px">The Smart Developer account does not have any fees associated: you can deposit and withdraw funds whenever you want and at no cost</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-3.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px">Once you complete registration, you will have access to all detail documentation and tools to analyse the opportunities you are interested in</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-4.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px">Invest with as little as you decide in the best real estate opportunities with guarantees and high returns</div>
                        </div>
                        <div class="row registro-ventaja">
                            <div class="col-md-2"><img src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/register/ico-register-5.png" alt=""></div>
                            <div class="col-md-10" style="padding-left:0px">Earn from the moment you invest! Smart Developer enabled opportunities pay out the estimated rental yield every month from the moment you commit your investment (Conditions apply).</div>
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
                <h4 class="modal-title">Register Success</h4>
            </div>
            <div class="modal-body">
                <h5><p>You have registered correctly. Then you can log in.</p></h5>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button id="modal_finalize" type="button" class="btn btn-primary">Finalize</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->    