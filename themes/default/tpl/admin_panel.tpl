
<header id='imageNew' class="slidePanel-header overlay" style="height:300px;width:100%; background-position: center center;background-image: url('http://localhost/smart_developer/themes/default/remark/global/photos/focus-5-960x640.jpg');"
        data-method="scroll" data-min="100">
    <div class="overlay-top overlay-panel overlay-background" style="padding: 0px 15px;background: rgba(0,0,0,0.5);">
        <div class="slidePanel-actions btn-group" aria-label="actions" role="group" style="min-height: 0px;">
            <!--<button type="button" class="btn btn-pure btn-inverse icon wb-chevron-left" aria-hidden="true"></button>
            <button type="button" class="btn btn-pure btn-inverse icon wb-chevron-right" aria-hidden="true"></button> -->
            <button type="button" class="btn btn-pure btn-inverse slidePanel-close icon wb-close"
                    aria-hidden="true"  style="line-height: 24px;"></button>
        </div>
        <h5 id='tituloNew' style="line-height: 24px;">Gardening is life.png</h5>
    </div>
</header>
<div class="slidePanel-inner" id="panelgeneral" >
    <section class="slidePanel-inner-section"  >

        <div class="col-xl-12">

            <div class="example-wrap">
                <div class="nav-tabs-horizontal" data-plugin="tabs">
                    <ul class="nav nav-tabs nav-tabs-line tabs-line-top" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-toggle="tab" href="#exampleTabsLineTopOne"  aria-controls="exampleTabsLineTopOne" role="tab" onclick='$("#panelgeneral").resize();
                                    $("#panelgeneral").resize();'>Description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopTwo"   aria-controls="exampleTabsLineTopTwo" role="tab" onclick='$("#panelgeneral").resize();
                                    $("#panelgeneral").resize();'>Financial information</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopThree"   aria-controls="exampleTabsLineTopTwo" role="tab" onclick='$("#panelgeneral").resize();
                                    $("#panelgeneral").resize();'>Documentation</a>
                        </li>
                         <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopFour"   aria-controls="exampleTabsLineTopTwo" role="tab" onclick='$("#panelgeneral").resize();
                                    $("#panelgeneral").resize();'>Validate</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-10">

                        <div class="tab-pane active" id="exampleTabsLineTopOne" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">


                                    <div id="descriptionNew"  > 
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="tab-pane"  id="exampleTabsLineTopTwo" role="tabpanel" >
                            <div class="row" >
                                <div class="col-md-12">





                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-sm-12">
                                            <a href="#"><i class="icon wb-map" aria-hidden="true"></i> Location  </a> : <font id="addressNow"> Mi locacion</font>
                                        </div>

                                    </div>    

                                    <div class="flip-container__wrapper" style="margin-top: 10px;">                               

                                        <div class="row">
                                            <div class="col-sm-6 text-center">
                                                <div style="margin: 14px 0;">
                                                    <p>
                                                        <span class="ahorro-box-text">
                                                            TOTAL RETURN
                                                        </span>
                                                    </p>
                                                    <span class="number-wrapper">


                                                        <font id="totalreturnNow"> 7,03</font><span class="">%</span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 text-center">
                                                <div  style="margin: 14px 0;border-left: 1px solid #b8b8b8;">
                                                    <p>
                                                        <span class="ahorro-box-text">TERM</span>
                                                    </p>
                                                    <span class="number-wrapper">  <font id="monthsNow">  12 </font><span class=""> months</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>                     




                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-6">
                                            <b style="color:#566573;"><font id="sumamountNow"> $556 </font> (%<font id="percentNow"> 100 </font>)</b> 
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <b style="color:#566573;"><font id="targetamtNow"> $556 </font></b>
                                        </div>
                                    </div>   



                                    <div class="example" style="margin-top: 10px;margin-bottom: 10px;">
                                        <div class="asRange" id="rangeNew" data-plugin="asRange" data-namespace="rangeUi" style="width: 100%;margin: 0;" data-min="1" data-max="100" ></div>
                                    </div>


                                    <div class="row" style="color:#566573;">
                                        <div class="col-sm-6">
                                            <b><font id="investorsNow"> 100 </font></b> Investors
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <font id="daysNow">31 </font>  days remaining
                                        </div>  
                                    </div>   






                                </div>
                            </div>

                        </div>

                        <div class="tab-pane"  id="exampleTabsLineTopThree" role="tabpanel" >
                            <div class="row" >
                                <div class="col-md-12">


                                    <div id="docsNew"  >  
                                    </div>


                                </div>
                            </div>

                        </div>

                         <div class="tab-pane"  id="exampleTabsLineTopFour" role="tabpanel" >
                            <div class="row" >
                                <div class="col-md-12">

                                    <div class="col-md-12" style="margin: 10px 0;">
                                        Choose this option if you think the data is correct
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-success" onclick="Estado('FU');"> <i class="icon wb-check" aria-hidden="true"></i>Validate</button>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                    
                                    <div class="col-md-12" style="margin: 10px 0;">
                                        Choose this option if you consider that some data or file is incorrect
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-danger" onclick="Estado('ERRDATA');"><i class="icon wb-close" aria-hidden="true"></i>Error Data</button>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                  
                                  


                                </div>
                            </div>

                        </div>

                        
                        

                    </div>
                </div>
            </div>
            <!-- End Example Tabs Line Top -->
        </div>






    </section>


</div>
