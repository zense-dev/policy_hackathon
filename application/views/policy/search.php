<?php
function department($var){
    if($var == 0){
        return "Department of Rural Development";}
    else if($var == 1){
        return "Karnataka State Co-operative Department";}
    else if($var == 2){
        return "Department of Health and Family Welfare";}
    else if($var == 3){
        return "Social Security";}
    else if($var == 4){
        return " Department of Women and Child Welfare";}
    else if($var == 5){
        return "Department of Minorities Development";}
    else if($var == 6){
        return "Department of Food,Civil Supplies and Consumer Affairs";}
    else if($var == 7){
        return "Department of Social Security and Pensions and Revenue";}
    else if($var == 8){
        return "Department of Food Supplies and Commerce";}
    else if($var == 9){
        return "Department of Labour";}
}

function specific_for($var){
    if($var == 0){
        return "Rural";}
    else if($var == 1){
        return "Urban";}
    else if($var == 2){
        return "All";}
}

function gender($var){
    if($var == 0){
        return "Male";}
    else if($var == 1){
        return "Female";}
    else if($var == 2){
        return "All";}
}

function poverty($var){
    if($var == 0){
        return "APL";}
    else if($var == 1){
        return "BPL";}
    else if($var == 2){
        return "All";}
}

function marital_status($var){
    if($var == 0){
        return "Married";}
    else if($var == 1){
        return "Unmarried";}
    else if($var == 2){
        return "Divorced";}
    else if($var == 3){
        return "All";}
}

function agegroup($var){
    if($var == 0){
        return "Child";}
    else if($var == 1){
        return "Adult";}
    else if($var == 2){
        return "Senior Citizens";}
    else if($var == 3){
        return "All";}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 16 Jul 2014 11:39:11 GMT -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Home Page</title>

    <meta name="description" content="and Validation" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url();?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Zense
                </small>
            </a>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

   <!-- /.sidebar-shortcuts -->

    <?php include 'navbar.php'?>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>

<div class="main-content">

    <form class="form-search" method="get" action="<?php echo base_url()?>policy/search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name="string" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
    </form>

    <div class="page-content">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert-info">
            Your query returned the following results
        </div>
        <?php
        $count = 1;
        foreach ($content as $row) {# code...
            if($count%3 == 1){
                echo '<div class="row">
										<div class="col-xs-12">
											<div class="col-sm-4 widget-container-col" style="padding-bottom:10px;"><!--Box Starts Here-->
												<div class="widget-box widget-color-dark">
													<div class="widget-header widget-hea1der-small">
														<h6 class="widget-title">';
                echo  $row->scheme_name;
                echo '</h6>
													</div>
													<div class="widget-body">
														<div class="widget-main padding-4">
															<div class="scrollable" data-height="125">
																<div class="content">
																	<div class="alert alert-info">';
                echo $row->scheme_objectives;
                echo '<br>
																		<a href="'.base_url().'policy/viewpage/'.$row->scheme_id.'" class="label label-success">Read More</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!--Box Ends-->';
            }
            else if($count%3 ==2){
                echo '<div class="col-sm-4 widget-container-col" style="padding-bottom:10px;">
										<div class="widget-box widget-color-dark">
											<div class="widget-header widget-hea1der-small">
												<h6 class="widget-title">';
                echo  $row->scheme_name;
                echo '</h6>
											</div>
											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="scrollable" data-height="125">
														<div class="content">
															<div class="alert alert-info">';
                echo $row->scheme_objectives;
                echo '<br>
																<a href="'.base_url().'policy/viewpage/'.$row->scheme_id.'" class="label label-success">Read More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>';
            }
            else{
                echo '<div class="col-sm-4 widget-container-col" style="padding-bottom:10px;">
										<div class="widget-box widget-color-dark">
											<div class="widget-header widget-hea1der-small">
												<h6 class="widget-title">';
                echo  $row->scheme_name;
                echo '</h6>
											</div>
											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="scrollable" data-height="125">
														<div class="content">
															<div class="alert alert-info">';
                echo $row->scheme_objectives;
                echo '<br>
																<a href="'.base_url().'policy/viewpage/'.$row->scheme_id.'" class="label label-success">Read More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>';
            }
            $count = $count + 1;
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div id="modal-wizard" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" data-target="#modal-step-contents">
                                <ul class="wizard-steps">
                                    <li data-target="#modal-step1" class="active">
                                        <span class="step">1</span>
                                        <span class="title">Validation states</span>
                                    </li>

                                    <li data-target="#modal-step2">
                                        <span class="step">2</span>
                                        <span class="title">Alerts</span>
                                    </li>

                                    <li data-target="#modal-step3">
                                        <span class="step">3</span>
                                        <span class="title">Payment Info</span>
                                    </li>

                                    <li data-target="#modal-step4">
                                        <span class="step">4</span>
                                        <span class="title">Other Info</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="modal-body step-content" id="modal-step-contents">
                                <div class="step-pane active" id="modal-step1">
                                    <div class="center">
                                        <h4 class="blue">Step 1</h4>
                                    </div>
                                </div>

                                <div class="step-pane" id="modal-step2">
                                    <div class="center">
                                        <h4 class="blue">Step 2</h4>
                                    </div>
                                </div>

                                <div class="step-pane" id="modal-step3">
                                    <div class="center">
                                        <h4 class="blue">Step 3</h4>
                                    </div>
                                </div>

                                <div class="step-pane" id="modal-step4">
                                    <div class="center">
                                        <h4 class="blue">Step 4</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer wizard-actions">
                                <button class="btn btn-sm btn-prev">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Prev
                                </button>

                                <button class="btn btn-success btn-sm btn-next" data-last="Finish">
                                    Next
                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>

                                <button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
                                    <i class="ace-icon fa fa-times"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Zense</span>
							- Connected the Disconnected
						</span>

            &nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url();?>ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url();?>netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url();?>assets/js/fuelux/fuelux.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {

        $('[data-rel=tooltip]').tooltip();

        $(".select2").css('width','200px').select2({allowClear:true})
            .on('change', function(){
                $(this).closest('form').validate().element($(this));
            });


        var $validation = false;
        $('#fuelux-wizard')
            .ace_wizard({
                //step: 2 //optional argument. wizard will jump to step "2" at first
            })
            .on('change' , function(e, info){
                if(info.step == 1 && $validation) {
                    if(!$('#validation-form').valid()) return false;
                }
            })
            .on('finished', function(e) {
                bootbox.dialog({
                    message: "Thank you! Your information was successfully saved!",
                    buttons: {
                        "success" : {
                            "label" : "OK",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            }).on('stepclick', function(e){
                //e.preventDefault();//this will prevent clicking and selecting steps
            });


        //jump to a step
        $('#step-jump').on('click', function() {
            var wizard = $('#fuelux-wizard').data('wizard')
            wizard.currentStep = 3;
            wizard.setState();
        })
        //determine selected step
        //wizard.selectedItem().step



        //hide or show the other form which requires validation
        //this is for demo only, you usullay want just one form in your application
        $('#skip-validation').removeAttr('checked').on('click', function(){
            $validation = this.checked;
            if(this.checked) {
                $('#sample-form').hide();
                $('#validation-form').removeClass('hide');
            }
            else {
                $('#validation-form').addClass('hide');
                $('#sample-form').show();
            }
        })



        //documentation : http://docs.jquery.com/Plugins/Validation/validate


        $.mask.definitions['~']='[+-]';
        $('#phone').mask('(999) 999-9999');

        jQuery.validator.addMethod("phone", function (value, element) {
            return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        }, "Enter a valid phone number.");

        $('#validation-form').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                email: {
                    required: true,
                    email:true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                name: {
                    required: true
                },
                phone: {
                    required: true,
                    phone: 'required'
                },
                url: {
                    required: true,
                    url: true
                },
                comment: {
                    required: true
                },
                date: {
                    required: true,
                    date: true
                },
                state: {
                    required: true
                },
                platform: {
                    required: true
                },
                subscription: {
                    required: true
                },
                gender: 'required',
                agree: 'required'
            },

            messages: {
                email: {
                    required: "Please provide a valid email.",
                    email: "Please provide a valid email."
                },
                password: {
                    required: "Please specify a password.",
                    minlength: "Please specify a secure password."
                },
                subscription: "Please choose at least one option",
                gender: "Please choose gender",
                agree: "Please accept our policy"
            },


            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },

            errorPlacement: function (error, element) {
                if(element.is(':checkbox') || element.is(':radio')) {
                    var controls = element.closest('div[class*="col-"]');
                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                }
                else if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                }
                else error.insertAfter(element.parent());
            },

            submitHandler: function (form) {
            },
            invalidHandler: function (form) {
            }
        });




        $('#modal-wizard .modal-header').ace_wizard();
        $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


        /**
         $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

         $('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
         */
    })
</script>
</body>
</html>
