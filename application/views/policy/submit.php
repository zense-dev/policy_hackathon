<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 16 Jul 2014 11:39:11 GMT -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Form Wizard - Ace Admin</title>

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


</div>

<div class="main-container" id="main-container">
<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <?php include 'navbar.php'?>

    </div><!-- /.sidebar-shortcuts -->



    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>

<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <div class="nav-search" id="nav-search">
        <form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
        </form>
    </div><!-- /.nav-search -->
</div>

<div class="page-content">
<div class="page-header">
    <h1>
        Form Wizard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            and Validation
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
    <h4 class="widget-title lighter">Form</h4>
</div>

<div class="widget-body">
<div class="widget-main">
<div id="fuelux-wizard" data-target="#step-container">
    <ul class="wizard-steps">
        <li data-target="#step1" class="active">
            <span class="step">1</span>
            <span class="title">Basic Info</span>
        </li>

        <li data-target="#step2">
            <span class="step">2</span>
            <span class="title">Details</span>
        </li>

        <li data-target="#step3">
            <span class="step">3</span>
            <span class="title">Details</span>
        </li>

        <li data-target="#step4">
            <span class="step">4</span>
            <span class="title">Details</span>
        </li>
    </ul>
</div>

<hr />
<form name="submit_form" id="submit_form">
<div class="step-content pos-rel" id="step-container">
<div class="step-pane active" id="step1">
    <h3 class="lighter block green">Enter the following information</h3>
    <?php
    if(strlen(validation_errors())>0){
        echo '<div class="alert alert-error">';
        echo validation_errors();
        echo '</div>';
    }
    ?>
    <div class="form-group has-info">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Name the Scheme</label>
        <div class="col-xs-12 col-sm-5">
														<span class="block input-icon input-icon-right">
															<input type="text" id="inputInfo" class="width-100" name="scheme_name"/>
														</span>
        </div>
    </div><br><br><br>

    <div class="form-group has-info">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Select Department</label>
        <div class="col-xs-12 col-sm-5">
            <div>
                <select class="form-control" id="form-field-select-1" name="scheme_department">
                    <option value="1">Department of Rural Development</option>
                    <option value="2">Karnataka State Co-operative Department</option>
                    <option value="3">Ministry of Health and Family Welfare</option>
                    <option value="4">The Directorate of Social Security and Pensions (DSSP), Revenue Department</option>
                    <option value="5">Department of Women and Child Development</option>
                    <option value="6">Karnataka Minorities Development Corporation Ltd</option>
                    <option value="7">Department of Labour</option>
                </select>
            </div>
        </div>
    </div><br><br>

    <div class="form-group has-info row">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right" >Objective</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" placeholder="Default Text" name="scheme_objective"></textarea>
        </div>
    </div>
    <div class="form-group has-info row">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right" >Registration Procedure</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" placeholder="Default Text" name="scheme_reginfo"></textarea>
        </div>
    </div>
    <div class="form-group has-info row">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right" >Documents Needed</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" placeholder="Default Text" name="scheme_documents"></textarea>
        </div>
    </div>
    <div class="form-group has-info row">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right" >Scheme Benefits</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" placeholder="Default Text" name="scheme_benefits"></textarea>
        </div>
    </div>
</div>

<div class="step-pane" id="step2">
    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">Specific For</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_spec_for" value="0"/>
                    <span class="lbl"> Rural</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_spec_for" value="1"/>
                    <span class="lbl"> Urban</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_spec_for" value="2"/>
                    <span class="lbl"> All</span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">Gender</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_gender" value="0"/>
                    <span class="lbl"> Male</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_gender" value="1"/>
                    <span class="lbl"> Female</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_gender" value="2"/>
                    <span class="lbl"> All</span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">Poverty Level</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_poverty" value="0"/>
                    <span class="lbl"> APL</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_poverty" value="1"/>
                    <span class="lbl"> BPL</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_poverty" value="2"/>
                    <span class="lbl"> All</span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="step-pane" id="step3">
    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">Maratial Status</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_marital" value="0"/>
                    <span class="lbl"> Married</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_marital" value="1"/>
                    <span class="lbl"> Unmarried</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input  type="radio" class="ace" name="scheme_marital" value="2"/>
                    <span class="lbl"> Divorced</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_marital" value="3"/>
                    <span class="lbl"> All</span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">Age Group</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_age" value="0"/>
                    <span class="lbl"> Child</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_age" value="1" />
                    <span class="lbl"> Adult</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_age" value="2"/>
                    <span class="lbl"> Senior Citizens</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_age" value="3"/>
                    <span class="lbl"> All</span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="control-group">
            <label class="control-label bolder blue">No. of Family Members</label>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_family"/>
                    <span class="lbl"> <=3</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input  type="radio" class="ace" name="scheme_family"/>
                    <span class="lbl"> <5</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" class="ace" name="scheme_family"/>
                    <span class="lbl"> >7</span>
                </label>
            </div>


        </div>
    </div>
</div>

<div class="step-pane" id="step4">
    <div class="form-group has-info">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Why This Scheme</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" name="scheme_why" placeholder="Default Text"></textarea>
        </div>
    </div>	<br><br><br>

    <div class="form-group has-info">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">How Does it Help</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" name="scheme_help" placeholder="Default Text"></textarea>
        </div>
    </div>	<br><br><br>
    <div class="form-group has-info">
        <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Any other Details</label>
        <div class="col-xs-12 col-sm-5">
            <textarea class="form-control" id="form-field-8" name="scheme_other_details" placeholder="Default Text"></textarea>
        </div>
    </div>	<br><br><br>
</div>
</div>
</form>

<hr />
<div class="wizard-actions">
    <button class="btn btn-prev">
        <i class="ace-icon fa fa-arrow-left"></i>
        Prev
    </button>

    <button class="btn btn-success btn-next" data-last="Finish">
        Next
        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
    </button>
</div>
</div><!-- /.widget-main -->
</div><!-- /.widget-body -->
</div>

<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">The Zense Community</span>
						</span>
						<span class="action-buttons">

							<a target="blank" href="https://www.facebook.com/zense.dev">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
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
    window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
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

                var formData = $('#submit_form').serialize()

                $.ajax({
                    type    : 'POST',
                    url     : '<?php echo base_url();?>policy/submit_data',
                    data    : formData,
                    dataType : 'json',
                    encode: true
                })

                    .done(function(data){
                        console.log(data)
                        alert('Submission Done')
                    })

                    .fail(function(data){
                        console.log(data)
                        alert('Submission Failed')
                    })

                console.log('formdata'+formData)
                bootbox.dialog({
                    message: "Submitted Successfully!",
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