<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content container-fluid vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/smart2.png" alt="...">
            <!-- <h2 class="brand-text">Remark</h2> -->
        </div>

        <div class="row  align-center">
            <div class="col-sm-3  align-center"></div>
            <div class="col-sm-6  align-center">
            <div class="example">
              <form id="register_form" class="form-horizontal">
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" autocomplete="off">
                  </div>
                </div>                                    
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>    
                <div class="form-group row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phone" placeholder="Phone" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="birthday" placeholder="Birthday(YYYY/MM/DD)" autocomplete="off">
                  </div>
                </div>             
                <div class="form-group row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="country" placeholder="Country" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="region" placeholder="Region" autocomplete="off">
                  </div>
                </div>  
                <div class="form-group row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="city" placeholder="City" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="postal" placeholder="Postal Code" autocomplete="off">
                  </div>
                </div>  
                <div class="form-group row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="address1" placeholder="Address 1" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="address2" placeholder="Address 2" autocomplete="off">
                  </div>
                </div>                    
                <div class="form-group">
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputLabelMale" name="usertype" checked="">
                    <label for="inputLabelMale">Investor</label>
                  </div>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputLabelFemale" name="usertype">
                    <label for="inputLabelFemale">Company</label>
                  </div>
                </div>                  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style=" margin-top: 30px;color:#000;font-size: 16px;background-color: #6cd9d0;">REGISTER</button>
                </div>                  
              </form>
            </div>
            </div>
            <div class="col-sm-3  align-center"></div>
        </div>    
        <p></p>
        <p>Have account already? Please go to <a href="login">Sign In</a></p>

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

    </div>
</div>
<!-- End Page -->




<script type="text/javascript">
    window.onload = function () {
        //example sinserialize
        //var product_code = $('#product_code').val();
        //data : {product_code:product_code , product_name:product_name, price:price},
        $("#register_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Register_Controller/register_user')?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("data:");
                    console.log(data);
                    var resp = $.parseJSON(data);//convertir data de json
                    console.log("RESP:");
                    console.log(resp);
                    if (resp.status === "error") {                       
                         showError('Error user or password invalid');
                    } 
                    if (resp.status === "success") {  
                        console.log("ACA SUCESS**");
                       // window.location.href = resp.redirect;
                    }                     
                    
                }
            });
        });
    };
    

    
</script>