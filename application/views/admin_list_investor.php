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
        <h1 class="page-title">Investors</h1>
        <div class="page-header-actions">
            <!--<ol class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a class="icon fa-clipboard" href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                <li class="breadcrumb-item active">Headers</li>
            </ol> -->
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body">

                <table id="idTableListInvestor" class="table table-hover dataTable table-striped" role="grid" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Log-In</th>
                            <th>Email</th>
                            <th>Investor</th>
                            <th>Total Invested Capital</th>
                            <th>Validation Notes</th>
                            <th>Status</th>
                            <th>Actions</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div> 
        </div> 
    </div> 
</div>   


<!-- Modal -->
<div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="exampleModalTabs"
     role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleModalTabs">Investor Information</h4>
            </div>

            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleLine1"
                                                            aria-controls="exampleLine1" role="tab">Investor Info.</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleLine2"
                                                            aria-controls="exampleLine2" role="tab">Tax Info</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleLine3"
                                                            aria-controls="exampleLine3" role="tab">Identification</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleLine4"
                                                            aria-controls="exampleLine4" role="tab">Approve</a></li>

            </ul>

            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="exampleLine1" role="tabpanel">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titleform">
                                    <p class="grey-border" style="margin-top: 0px">General</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Investor</b></p>
                            </div>
                            <div class="col-sm-8">
                                <label id="lblInvestorName" class="control-label" ></label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Email</b></p>
                            </div>
                            <div class="col-sm-8">
                                <label id="lblInvestorEmail" class="control-label" ></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Phone</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorPhone" class="control-label" ></label>
                            </div>

                            <div class="col-sm-3">
                                <p><b>Birthday</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorBorn" class="control-label" ></label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titleform">
                                    <p class="grey-border" style="margin-top: 0px">Nationality</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Nationality</b></p>
                            </div>
                            <div class="col-sm-8">
                                <label id="lblInvestorNationality" class="control-label" ></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Region</b></p>
                            </div>
                            <div class="col-sm-8">
                                <label id="lblInvestorRegion" class="control-label" ></label>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="exampleLine2" role="tabpanel">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titleform">
                                    <p class="grey-border" style="margin-top: 0px">Tax Residence</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Country</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorTaxcountry" class="control-label" ></label>
                            </div>

                            <!-- 
                                <div class="col-sm-3">
                                    <p><b>Fiscal Number</b></p>
                                </div>
                                <div class="col-sm-3">
                                    <label id="lblInvestorTaxFiscalNumber" class="control-label" ></label>
                                </div>
                            -->
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <p><b>Address</b></p>
                            </div>
                            <div class="col-sm-8">
                                <label id="lblInvestorTaxAddress" class="control-label" ></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Zip Code</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorTaxPostalCode" class="control-label" ></label>
                            </div>

                            <div class="col-sm-3">
                                <p><b>City</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorTaxCity" class="control-label" ></label>
                            </div>
                        </div>

                        <!-- 
                            <div class="row">
                                <div class="col-sm-3">
                                   <p><b>US TIN</b></p>
                                </div>
                                <div class="col-sm-8">
                                    <label id="lblInvestorTaxTIN" class="control-label" ></label>
                                </div>
                            </div>
                        -->


                    </div>

                    <div class="tab-pane" id="exampleLine3" role="tabpanel">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titleform">
                                    <p class="grey-border" style="margin-top: 0px">Identification</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p><b>Document Type</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorDocType" class="control-label" ></label>
                            </div>

                            <div class="col-sm-3">
                                <p><b>Doc. Number</b></p>
                            </div>
                            <div class="col-sm-3">
                                <label id="lblInvestorDocNo" class="control-label" ></label>
                            </div>

                            <div id="imagesUploaded" class="form-group ">
                                <div class="row"> 
                                    <div class="col-sm-1"> </div>
                                    <div id="divimgfront" class="col-sm-5">  
                                        <p>Front Image</p>
                                        <img class="img-fluid w-full"  id="imgInvestorFront" name="profile_image" src=""  />
                                    </div>
                                    <div id="divimgback" class="col-sm-5">
                                        <p>Back Image</p>
                                        <img class="img-fluid w-full"  id="imgInvestorBack" name="profile_image2" src=""/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="exampleLine4" role="tabpanel">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titleform">
                                    <p class="grey-border" style="margin-top: 0px">Change Status to Investor</p>
                                </div>
                            </div>
                        </div>


                        <form id="register_form" >

                            <div class="row">
                                <input id="InvestorId" type="hidden" name="objid">
                                <div class="col-xl-12 form-group">
                                    <p>Notes for Investor</p>
                                    <textarea id="dlgDescription" class="form-control" rows="3" name="statusDescription" placeholder=""></textarea>
                                </div>
                            </div>



                            <div class="modal-footer">
                                <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" id="inputBasicOff" name="investerStatus"  checked autocomplete="on"/>
                                    <label for="inputBasicRemember">Validate</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary">  Save changes</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<script type="text/javascript">
    var table;
    var frm;
    window.onload = function () {
        $('#idListInvestorAdmin').addClass('active');
        table = $('#idTableListInvestor').DataTable({
            responsive: true,
            "order": [[1, "desc"]],
            "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false
                }],
            "processing": false, //mostrar waiting
            "serverSide": false, //consultar servidor ordenar , filtrar
            "ajax": {
                url: "<?php echo base_url('Admin_List_Investor_Controller/get_items') ?>",
                type: 'GET'
            },
        });
        new $.fn.dataTable.FixedHeader(table);


    };

    function investor_viewinfo(id) {


        $('#examplePositionCenter').modal('show');
        frm = $("#register_form");

        $.ajax({
            url: "<?php echo base_url('Admin_List_Investor_Controller/get_customItemById') ?>",
            type: "POST",
            data: {'id': id},

            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                if (resp.status === "error") {
                    showError('Error Insert Data - Please Try Again');
                }
                if (resp.status === "success") {

                    $('#lblInvestorName').text(resp.data['investorname']);
                    $('#lblInvestorEmail').text(resp.data['investoremail']);
                    $('#lblInvestorPhone').text(resp.data['investorphone']);
                    $('#lblInvestorBorn').text(resp.data['investorborn']);
                    $('#lblInvestorNationality').text(resp.data['investorcountry']);
                    $('#lblInvestorRegion').text(resp.data['investorcity']);

                    $('#lblInvestorTaxcountry').text(resp.data['investortaxcountry']);
                    $('#lblInvestorTaxFiscalNumber').text(resp.data['investortaxfiscalnumber']);
                    $('#lblInvestorTaxAddress').text(resp.data['investortaxaddress']);
                    $('#lblInvestorTaxPostalCode').text(resp.data['investortaxpostal']);
                    $('#lblInvestorTaxCity').text(resp.data['investortaxcity']);
                    $('#lblInvestorTaxTIN').text(resp.data['investortin']);

                    $('#lblInvestorDocType').text(resp.data['documenttype']);
                    $('#lblInvestorDocNo').text(resp.data['documentno']);

                    $("#imagesUploaded").hide();
                    $("#divimgfront").hide();
                    $("#divimgback").hide();

                    if (resp.data['imgFront'] != null) {
                        $("#imagesUploaded").show();
                        $("#divimgfront").show();
                        $("#imgInvestorFront").attr("src", resp.data['imgFront']);
                        $("#imgInvestorFront").attr("width", 150);
                        $("#imgInvestorFront").attr("height", 150);

                    }

                    if (resp.data['imgBack'] != null) {
                        $("#imagesUploaded").show();
                        $("#divimgback").show();
                        $("#imgInvestorBack").attr("src", resp.data['imgBack']);
                        $("#imgInvestorBack").attr("width", 150);
                        $("#imgInvestorBack").attr("height", 150);

                    }

                    $('#InvestorId').val(id);
                    $('#dlgDescription').val(resp.data['validationnotes']);
                    console.log(resp.data['investorstatus']);
                    $('#inputBasicOff')[0].checked = false;
                    if (resp.data['investorstatus'] == "Y")
                        $('#inputBasicOff')[0].checked = true;
                }
            }
        });


        $("#register_form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Admin_List_Investor_Controller/change_status') ?>",
                type: "POST",
                data: $('#register_form').serialize(),
                async: true,
                success: function (data) {

                    var resp = $.parseJSON(data);//convertir data de json
                    if (resp.status === "error") {
                        showError(resp.msg);
                    }
                    if (resp.status === "success") {
                        $('#examplePositionCenter').modal('hide')
                        table.ajax.reload();
                    }
                }
            });
        });


    }


    function login(id) {
        /*$.ajax({
            url: "<?php echo base_url('Admin_TransactionHistory_Controller/get_paymentHistoryDetailById') ?>",
            type: "POST",
            data: {'id': id},
            success: function (data) {
                var resp = $.parseJSON(data);//convertir data de json
                if (resp.status === "error") {
                    showError(resp.msg);
                } else if (resp.status === "success") {
                    $('#dlgFinPaymentHistoryId').val(resp.dlgFinPaymentHistoryId);
                    $('#dlgPaymentDate').text(resp.dlgPaymentDate);
                    $('#dlgFromAccount').text(resp.dlgFromAccount);
                    $('#dlgToAccount').text(resp.dlgToAccount);
                    $('#dlgDescription').text(resp.dlgDescription);

                    $('#dlgToTitle').text(resp.dlgToTitle);
                    $('#dlgPayoutItemTitleDetail').text(resp.dlgPayoutItemTitleDetail);

                    $('#dlgPayoutItems').empty();
                    $('#dlgPayoutItems').append(resp.dlgPayoutItems);

                    $('#dialogAdminTransactionHistory').modal('show');
                }
            }
        });*/
    }




</script>


