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
?>


<?php
function specific_for($var){
	if($var == 0){
		return "Rural";}
	else if($var == 1){
		return "Urban";}
	else if($var == 2){
		return "All";}
}
?>


<?php
function gender($var){
	if($var == 0){
		return "Male";}
	else if($var == 1){
		return "Female";}
	else if($var == 2){
		return "All";}
}
?>

<?php
function poverty($var){
	if($var == 0){
		return "APL";}
	else if($var == 1){
		return "BPL";}
	else if($var == 2){
		return "All";}
}
?>


<?php
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
?>


<?php
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
	
<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 16 Jul 2014 11:39:32 GMT -->
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
							Connect the Disconnected
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">






						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
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



                <?php include 'navbar.php' ?>




				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">


				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="row">
								<div class="col-xs-12">

									<a target="blank" href="http://www.nrega.nic.in"><h1><?php echo $content[0]->scheme_name; ?></h1></a>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Funded By</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<dl id="dt-list-1">
													<dt><?php echo department($content[0]->scheme_funding);?></dt>
												</dl>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Objectives</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<dl id="dt-list-1">
													<dt><?php echo $content[0]->scheme_objectives;?></dt>
												</dl>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Eligibility</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<ol>
													<li><dt>Area</dt><p><?php echo specific_for($content[0]->area);?></p></li>
													<li><dt>Gender</dt><p><?php echo gender($content[0]->gender);?></p></li>
													<li><dt>Marital Status</dt><p><?php echo marital_status($content[0]->marital_status);?></p></li>
													<li><dt>Income Range</dt><p><?php echo poverty($content[0]->poverty_level);?></p></li>
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Registration/ Procedure</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<p><?php echo $content[0]->scheme_reginfo;?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Documents</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<p><?php echo $content[0]->scheme_documents;?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title smaller">Benefits</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<p><?php echo $content[0]->scheme_benefits;?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-xs-10">
									<p>
										<button class="btn btn-danger">Report Greivance about this Scheme </button>
										<button class="btn btn-primary">Suggest a Change</button>
										<a href="<?php echo base_url().'policy/validate/'.$content[0]->scheme_id?>"><button class="btn btn-warning">Validate</button></a>
                                        <a href="<?php echo base_url().'policy/modify/'.$content[0]->scheme_id?>"><button class="btn btn-warning">Modify this Scheme</button>

                                            <button class="btn btn-success">Export as CSV</button>
									</p>
								</div>
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
							<span class="blue bolder">Zense</span>
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

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 16 Jul 2014 11:39:32 GMT -->
</html>