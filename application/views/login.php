<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/smart2.png" alt="...">
            <!-- <h2 class="brand-text">Remark</h2> -->
        </div>

<!-- <p>Sign into your pages account</p> -->

        <form id="login_form" method="post" action="#">

            <div class="form-group" style="margin-top: 20px;">
                <label class="sr-only" for="inputEmail">Email</label>
                <input type="email" required class="form-control form-control-lg" id="inputEmail" name="email" placeholder="Email Address" style="font-size: 14px; border-radius:0;">
            </div>


            <div class="form-group" style="margin-top: 30px;">
                <label class="sr-only" for="inputPassword">Password</label>
                <input type="password" required  class="form-control form-control-lg" id="inputPassword" name="password" placeholder="Password" style="font-size: 14px ; border-radius:0;">
            </div>

            <!-- <div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                <input type="checkbox" id="inputCheckbox" name="remember">
                <label for="inputCheckbox">Remember me</label>
              </div>
              <a class="float-right" href="forgot-password.html">Forgot password?</a>
            </div> -->
            <button   type="submit" class="btn btn-info btn-block  btn-raised btn-lg" style=" margin-top: 30px;color:#000;font-size: 16px;background-color: #6cd9d0;">LOGIN</button>
        </form>
        <!-- <p>Still no account? Please go to <a href="register.html">Register</a></p> -->

        <p>Forgot your password?</p> 


        <p>Don't have an account yet?</p>

        <p>Sign up to Start Investing or Get Financing now</p>


        <!--
        <footer class="page-copyright page-copyright-inverse">
          <p>WEBSITE BY Creation Studio</p>
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
        </footer> -->

    </div>
</div>
<!-- End Page -->




<script type="text/javascript">
    window.onload = function () {
        //example sinserialize
        //var product_code = $('#product_code').val();
        //data : {product_code:product_code , product_name:product_name, price:price},
        $("#login_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Login_Controller/login_user')?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {                       
                         showError('Error user or password invalid');
                    } 
                    if (resp.status === "success") {                       
                        window.location.href = resp.redirect;
                    }                     
                    
                }
            });
        });
    };
    
    
    
</script>