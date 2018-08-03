<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content container-fluid vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/smart3.png" alt="...">
            <!-- <h2 class="brand-text">Remark</h2> -->
        </div>

        <div class="row align-center">
            <div class="col-sm-3  align-center"></div>
            <div class="col-sm-6  align-center">
              <form id="register_form" class="form-horizontal">
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 30px;">
                    <input type="text" required class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" style="font-size: 14px; border-radius:0;">
                  </div>
                  <div class="form-group col-md-6" style="margin-top: 30px;">
                    <input type="text" required class="form-control" id="inputLastname" name="lastname" placeholder="Last Name" style="font-size: 14px; border-radius:0;">
                  </div>
                </div>                                    
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="email" required class="form-control" id="inputEmail" name="email" placeholder="Email Address" style="font-size: 14px; border-radius:0;">
                  </div>                  
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password" style="font-size: 14px; border-radius:0;">
                  </div>
                </div>    
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="tel" required class="form-control" id="inputPhone" name="phone" placeholder="Phone" style="font-size: 14px; border-radius:0;">
                  </div>
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="text" required class="form-control" class="form-control" data-plugin="datepicker" id="inputBirthday" name="birthday" style="font-size: 14px; border-radius:0;">
                  </div>
                </div>             
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <select id="country_cmb" required class="form-control" name="country" required="" placeholder="Country" style="font-size: 14px; border-radius:0;"></select>                      
                  </div>
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <select id="region_cmb" required class="form-control" name="region" required="" placeholder="Region" style="font-size: 14px; border-radius:0;"></select>                        
                  </div>
                </div>                                                      
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="text" required class="form-control" id="inputCity" name="city" placeholder="City" style="font-size: 14px; border-radius:0;">
                  </div>
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="text" required class="form-control" id="inputPostal" name="postal" placeholder="Postal Code" style="font-size: 14px; border-radius:0;">
                  </div>
                </div>  
                <div class="row">
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="text" required class="form-control" id="inputAddress1" name="address1" placeholder="Address 1" style="font-size: 14px; border-radius:0;">
                  </div>
                  <div class="form-group col-md-6" style="margin-top: 10px;">
                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Address 2" style="font-size: 14px; border-radius:0;">
                  </div>
                </div>                    
                <div class="form-group">
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputInvestor" name="usertype" value="investor" checked="">
                    <label for="inputInvestor">Investor</label>
                  </div>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputCompany" name="usertype" value="company">
                    <label for="inputCompany">Company</label>
                  </div>
                </div>                  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style=" margin-top: 10px;color:#000;font-size: 16px;background-color: #6cd9d0;">REGISTER</button>
                </div>                  
              </form>
            </div>
            <div class="col-sm-3  align-center"></div>
        </div>    
        <p>Have account already? Please go to <a href="login">Sign In</a></p>
        <!--
        <footer class="page-copyright page-copyright-inverse">
          <p>WEBSITE BY SUG</p>
          <p>© 2018. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
          </div>
        </footer> 
        -->
    </div>
</div>
<!-- End Page -->




<script type="text/javascript">
    window.onload = function () {
        //example sinserialize
        //var product_code = $('#product_code').val();
        //data : {product_code:product_code , product_name:product_name, price:price},
        
        // onload country_cmb
        $.ajax({
            url: "<?php echo base_url('Register_Controller/get_country_list')?>",
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
                url: "<?php echo base_url('Register_Controller/get_region_list')?>",
                type: "POST",
                data: {"countryId" : $('#country_cmb').val()},
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
                url: "<?php echo base_url('Register_Controller/register_user')?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error user or password invalid');
                    } 
                    if (resp.status === "success") {
                        showSuccess("SUCCESS");
                        console.log("ACA SUCESS**");
                       // window.location.href = resp.redirect;
                    }                     
                    
                }
            });
        });

            
       
    };
    

    
</script>