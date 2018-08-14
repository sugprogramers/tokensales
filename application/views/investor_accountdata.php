<style>

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

    .grey-border{
        margin-top:30px;
        padding:10px 0;
        border-bottom:1px solid #ccc;
        font-family:'Rubik',sans-serif;
        font-weight:700;
        font-size:13px;
        color:#999;
        text-transform:uppercase;
        letter-spacing:2px
    }
    .grey-separator{
        border-bottom:1px solid #ccc;
        margin:25px 0
    }
    .doc-intro-form{
        margin:20px 0
    }
    .nif-input-info .form-group{
        width:100%
    }

    .interior.privatearea .content.level3.documentation{
        padding-bottom:0;
        min-height:inherit;
    }
    .interior.privatearea .content.level3.documentation p{
        margin-bottom:10px
    }
    .interior.privatearea .content.level3 .greyblock{
        display:block;
        overflow:hidden;
        padding:10px;
        text-align:center;
        margin:0 15px;
        background-color:#e9e8e8
    }
    .interior.privatearea .content.level3 .greyblock.tipo{
        border:1px solid #ccc;
        background-color:#fff
    }
    .interior.privatearea .content.level3 .greyblock.tipo p{
        margin-bottom:0
    }
    .interior.privatearea .content.level3 .greyblock .bright{
        border-right:1px solid #ccc
    }
    .interior.privatearea .resumee{
        background-color:#fff;
        color:#666;
        display:block
    }

    
</style>

<div class="page">
    <div class="page-header">  
        <h1 class="page-title">Investor Account Data</h1>
    </div>


    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">     

                       
                
                
                
                <div class="example-wrap">
                <div class="nav-tabs-vertical" data-plugin="tabs">
                  <ul class="nav nav-tabs nav-tabs-line mr-25" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsLineLeftOne"
                        aria-controls="exampleTabsLineLeftOne" role="tab">User Data</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineLeftTwo"
                        aria-controls="exampleTabsLineLeftTwo" role="tab">Tax Residence</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineLeftThree"
                        aria-controls="exampleTabsLineLeftThree" role="tab">Identification</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineLeftFour"
                        aria-controls="exampleTabsLineLeftFour" role="tab">Paypal</a></li>
                  </ul>
                  <div class="tab-content py-15">
                    <div class="tab-pane active" id="exampleTabsLineLeftOne" role="tabpanel">
                                 <form id="identification-form" method="post" >

                                    <div class="resumee content level3 documentation">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="titleform">
                                                    <p class="grey-border" style="margin-top: 0px">User data</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userFirstName">First Name *</label>
                                                    <input type="text" required class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" style="font-size: 14px; border-radius:0;">
                                                </div>

                                            </div>
                                            <div class="col-sm-4">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userLastName">Last Name *</label>
                                                    <input type="text" required class="form-control" id="inputLastname" name="lastname" placeholder="Last Name" style="font-size: 14px; border-radius:0;">
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-sm-6 col-md-4">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userEmail">Email address *</label>
                                                    <input type="email" disabled="true" required class="form-control" id="inputEmail" name="email" placeholder="Email Address" style="font-size: 14px; border-radius:0;">

                                                </div>

                                                <input type="hidden" name="userEmail" value="gnudebian1991@aol.com">
                                            </div>

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="userPhone">Phone *</label>
                                                    <br>
                                                    <input type="tel" required class="form-control" id="inputPhone" name="phone" data-plugin="formatter" data-pattern="+[[999]] [[999]]-[[999]]-[[9999]]" style="font-size: 14px; border-radius:0;">

                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">

                                                <div class="form-group ">
                                                    <label class="control-label" for="dateBirth">Birth Date *</label>
                                                    <input type="text" required class="form-control" class="form-control" data-plugin="datepicker" id="inputBirthday" name="birthday" style="font-size: 14px; border-radius:0;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separador-datos"></div>
                                    </div>

                                    <div id="user-address-section" class="resumee content level3 documentation">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="titleform">
                                                    <p class="grey-border" >Nationality</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="userCountry">Country*</label>
                                                    <div class="form-group">
                                                        <select id="country_cmb" required class="form-control" name="country" required="" placeholder="Country" style="font-size: 14px; border-radius:0;"></select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="userRegion">Region*</label>
                                                    <div class="form-group">
                                                        <select id="region_cmb" required class="form-control" name="region" required="" placeholder="Region" style="font-size: 14px; border-radius:0;"></select>                        
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                     <!--
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userAddress">Address Line 1 *</label>
                                                    <input type="text" required class="form-control" id="inputAddress1" name="address1" placeholder="Address Line 1" style="font-size: 14px; border-radius:0;">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userAddress2">Address Line 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Address Line 2" style="font-size: 14px; border-radius:0;">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userPostalCode">Postal Code *</label>
                                                    <input type="text" required class="form-control" id="inputPostal" name="postal" placeholder="Postal Code" style="font-size: 14px; border-radius:0;">

                                                </div>

                                            </div>

                                            <div class="col-sm-5">

                                                <div class="form-group ">
                                                    <label class="control-label" for="userCity">City *</label>
                                                    <input type="text" required class="form-control" id="inputCity" name="city" placeholder="City" style="font-size: 14px; border-radius:0;">
                                                </div>

                                            </div>
                                        </div>
                                      -->

                                        <div class="separador-datos"></div>

                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Update information</button>
                                    </div>

                                </form>

                                <p>Fields marked with * are mandatory</p>
                        
                        
                    </div>
                    <div class="tab-pane" id="exampleTabsLineLeftTwo" role="tabpanel">
                     
                                <form id="tax-form" method="post" >
                                    <div class="resumee content level3 documentation">      
                                        
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <div class="titleform">
                                                    <p class="grey-border" style="margin-top: 0px">Tax Residence</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input id="investorId" type="hidden" name="investorid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                             <div class="form-group">
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label" for="userTaxCountry">Country*</label>
                                                        <select id="taxcountry_cmb" required class="form-control" name="taxcountry" required="" placeholder="Country" style="font-size: 14px; border-radius:0;"></select>
                                                    </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                    <label class="control-label" for="userTaxFiscalNumber">Fiscal Number *</label>
                                                    <input type="text" required class="form-control" id="inputTaxFiscalNumber" name="taxfiscalnumber" placeholder="Fiscal Number" style="font-size: 14px; border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                       <div class="checkbox-custom checkbox-default">
                                         <input type="checkbox" id="userisuscitizen" name="isuscitizen"  checked autocomplete="on"/>
                                         <label for="inputBasicRemember">Are you a person related to the US (US Person)?</label>
                                       </div>
                                            </div>
                                        <div id="divTaxUs" class="col-sm-4">
                                            <div class="form-group ">
                                                    <label class="control-label" for="userTaxUsTin">US TIN</label>
                                                    <input type="text" required class="form-control" id="inputTaxUstin" name="taxtin" placeholder="US TIN" style="font-size: 14px; border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                    <label class="control-label" for="userTaxAddress">Residential Address*</label>
                                                    <input type="text" required class="form-control" id="inputTaxAddress" name="taxaddress" placeholder="Residential Address" style="font-size: 14px; border-radius:0;">
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-3">

                                            <div class="form-group ">
                                                <label class="control-label" for="userTaxPostalCode">Postal Code *</label>
                                                <input type="text" required class="form-control" id="inputTaxPostal" name="taxpostal" placeholder="Postal Code" style="font-size: 14px; border-radius:0;">

                                            </div>

                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label class="control-label" for="userTaxCity">City *</label>
                                                <input type="text" required class="form-control" id="inputTaxCity" name="taxcity" placeholder="City" style="font-size: 14px; border-radius:0;">
                                            </div>

                                        </div>
                                    </div>

                                     <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Update information</button>
                                    </div>
                                    <p>Fields marked with * are mandatory</p>
                                </form>       
                        
                    </div>
                    <div class="tab-pane" id="exampleTabsLineLeftThree" role="tabpanel">
                        <form id="identification_form" method="post" >
                            <div class="resumee content level3 documentation">      
                              <div class="row">
                                <div class="col-sm-12">
                                   <div class="titleform">
                                     <p class="grey-border" style="margin-top: 0px">Identification</p>
                                   </div>
                                </div>
                              </div>
                            </div>
                            <p><b>PASSPORT/ NATIONAL ID CARD.</b> The document must be valid on the date of submission. <br> The image of the document needs to be readable and complete (without cutted edges, covered parts etc). When submitting a National ID card, make sure to upload images of both sides..</p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label class="control-label" for="propertytype">Document Type *</label>
                                        <select  required class="form-control"  id="inputDoctype" name="userdocumentype" style="font-size: 14px; border-radius:0;">
                                            <option value="PASS" >Passport</option>
                                            <option value="IN" >Identity Card</option>
                                        </select>    
                                    </div>
                                  <div class="form-group ">
                                    <label class="control-label" >Document Number *</label>
                                    <input type="text" required class="form-control" id="inputDocNumber" name="userdocno" placeholder="Document Nro." style="font-size: 14px; border-radius:0;">
                                  </div>
                                  
                                  <div id="imagesUploaded" class="form-group ">
                                    <div>
                                        <label class="control-label" >Images Uploaded</label>
                                    </div> 
                                    <div class="row">  
                                        <div id="divimgfront" class="col-sm-5">  
                                          <img class="img-rounded img-bordered img-bordered-primary"  id="imgInvestorFront" name="profile_image" src=""  />
                                        </div>
                                        <div id="divimgback" class="col-sm-5">
                                         <img class="img-rounded img-bordered img-bordered-primary"  id="imgInvestorBack" name="profile_image2" src=""/>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                                                      
                                
                                <div class="col-sm-4">
                                   <div class="form-group "> 
                                     <label class="control-label" for="imagenfront" >Front Image</label>
                                     
                                     <input type="file" id="inputImgFront" class="form-control" data-plugin="dropify" data-default-file="" name="imagenfront"/>
                                   </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group ">
                                    <label class="control-label" for="imagenback" >Back Image</label>
                                    <input type="file" id="inputImgBack" class="form-control" data-plugin="dropify" data-default-file="" name="imagenback"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-right">
                               <button type="submit" class="btn btn-primary">Update information</button>
                            </div>
                            <p>Fields marked with * are mandatory</p>
                        </form>
                        
                    </div>
                    <div class="tab-pane" id="exampleTabsLineLeftFour" role="tabpanel">
                        <form id="paypalacct_form" method="post" >
                            <div class="resumee content level3 documentation">      
                              <div class="row">
                                <div class="col-sm-12">
                                   <div class="titleform">
                                     <p class="grey-border" style="margin-top: 0px">Paypal Account</p>
                                   </div>
                                </div>
                              </div>
                            </div>
                                
                            <p>In order to receive return investments of projects, enter your paypal email address</p>
                            <div></div>

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group ">
                                  <label class="control-label" for="paypalaccount">Paypal Account</label>
                                  <input type="email" required class="form-control" id="inputPaypalAcct" name="paypalacct" placeholder="Paypal Account" style="font-size: 14px; border-radius:0;">
                                </div>
                              </div>
                              <div class="col-sm-6"></div>                        
                            </div>                    

                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div> 
                                <div class="col-sm-6"></div>  
                            </div> 
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            
            </div> 
        </div> 
    </div> 



</div>

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>




<script type="text/javascript">
    function toDate(dateStr) {
        var parts = dateStr.split("-")
        return new Date(parts[0], parts[1] - 1, parts[2]);
    }
    window.onload = function () {
 
         // onload country_cmb
        $.ajax({
            url: "<?php echo base_url('Register_Controller/get_country_list') ?>",
            type: "POST",
            data: {countryId: "<?php echo $c_country_id ?>"},
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#country_cmb").empty();
                $("#country_cmb").append(resp.html);
                $('#country_cmb').trigger('change');
                
            }
        });
        
         $.ajax({
            url: "<?php echo base_url('Register_Controller/get_country_list') ?>",
            type: "POST",
            data: {countryId: "<?php echo $c_country_id ?>"},
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                $("#taxcountry_cmb").empty();
                $("#taxcountry_cmb").append(resp.html);
            }
        });
        
        

        $("#country_cmb").change(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Register_Controller/get_region_list') ?>",
                type: "POST",
                data: {
                    "countryId": $('#country_cmb').val(),
                    "regionId": "<?php echo $c_region_id ?>"
                },
                success: function (data) {
                    var resp = $.parseJSON(data);//convertir data de json
                    $("#region_cmb").empty();
                    $("#region_cmb").append(resp.html);
                }
            });
        });
        
        
        $('#userisuscitizen').click(function() {
            if( $(this).is(':checked')) {
                $("#inputTaxUstin").prop('disabled', false);
            } else {
                $("#inputTaxUstin").prop('disabled', true);
            }
        });
        
        
        
        
        //USER DATA
        $("#inputFirstname").val("<?php echo $firstname ?>");
        $("#inputLastname").val("<?php echo $lastname ?>");
        $("#inputEmail").val("<?php echo $email ?>");
        $("#inputPhone").val("<?php echo $phone ?>");
        $("#inputBirthday").datepicker("setDate", toDate("<?php echo $birthday ?>"));
        
        /* //INFORMATION IS ALREADY IN INVESTOR
        $("#inputAddress1").val("<?php echo $address1 ?>");
        $("#inputAddress2").val("<?php echo $address2 ?>");
        $("#inputPostal").val("<?php echo $postal ?>");
        $("#inputCity").val("<?php echo $city ?>");
        */
        
        //INVESTOR
        $("#investorId").val("<?php echo $c_investor_id ?>");
        $("#inputTaxFiscalNumber").val("<?php echo $taxfiscalnumber ?>");
        $("#inputTaxUstin").val("<?php echo $taxtin ?>");
        $("#inputTaxAddress").val("<?php echo $taxaddress ?>");
        $("#inputTaxPostal").val("<?php echo $taxpostal ?>");
        $("#inputTaxCity").val("<?php echo $taxcity ?>");
           
        $('#userisuscitizen')[0].checked = false;
        
        $("#inputTaxUstin").prop('disabled', true);
        if("<?php echo $taxisuscitizen ?>" === "Y"){
         $('#userisuscitizen')[0].checked = true;
         $("#inputTaxUstin").prop('disabled', false);
        }
        
        $("#inputPaypalAcct").val("<?php echo $paypalacct ?>");
        
        $("#inputDoctype").val("<?php echo $documenttype ?>");
        $("#inputDocNumber").val("<?php echo $documentno ?>");
        
        
        $("#imagesUploaded").hide();
        $("#divimgfront").hide();
        $("#divimgback").hide();
        
        if("<?php echo $imgFront ?>" !== ""){
            $("#imagesUploaded").show();
            $("#divimgfront").show();
        $("#imgInvestorFront").attr("src","<?php echo $imgFront ?>");
        $("#imgInvestorFront").attr("width",150);
        $("#imgInvestorFront").attr("height",150);
    
        } 
        
        if("<?php echo $imgBack ?>" !== ""){
            $("#imagesUploaded").show();
            $("#divimgback").show();
        $("#imgInvestorBack").attr("src","<?php echo $imgBack ?>");
        $("#imgInvestorBack").attr("width",150);
        $("#imgInvestorBack").attr("height",150);
  
        }
        
        
        //// FORM USER DATA
        $("#identification-form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "<?php echo base_url('Investor_Data_Controller/update_user_information') ?>",
                type: "POST",
                data: $(this).serialize(),
              
                success: function (data) {
                    
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    } else if (resp.status === "success") {
                        showSuccess('Your information has been updated.');
                    }
                    

                }
            });
        });
        
        
        //// FORM TAX INFORMATION
        $("#tax-form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Investor_Data_Controller/update_tax_information') ?>",
                type: "POST",
                data: $(this).serialize(),
              
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    } else if (resp.status === "success") {
                        showSuccess('Your information has been updated.');
                    }
                }
            });
        });
        
        //// FORM IDENTIFICATION
        $("#identification_form").submit(function (event) {
            event.preventDefault();
            
           var formData = new FormData(this);
           
            
            $.ajax({
                url: "<?php echo base_url('Investor_Data_Controller/update_identification_information') ?>",
                type: "POST",
                data: formData,
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function (data) {
                    //console.log("data: " . data);
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }else if (resp.status === "success") {
                        $("#imagesUploaded").hide();
                        $("#divimgfront").hide();
                        $("#divimgback").hide();
                        showSuccess('Your information has been updated.');
                    }
                }
            });
           
        });
        
        //// FORM PAYPAL
        $("#paypalacct_form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "<?php echo base_url('Investor_Data_Controller/update_tax_paypal_information') ?>",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    var resp = $.parseJSON(data);
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }else if (resp.status === "success") {
                        showSuccess('Your information has been updated.');
                    }
                }
            });
        });

       

    };
    
</script>







