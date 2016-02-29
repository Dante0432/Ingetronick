<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/leaflet.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu/ddsmoothmenu.css" media="screen, projection" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal/css/style.css" rel="stylesheet" />
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ddsmoothmenu.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <?php //Yii::app()->clientScript->registerCoreScript('jquery');?>
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="thrColElsHdr">
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<strong>Email: </strong>info@yourdomain.com
				&nbsp;&nbsp;
				<strong>Support: </strong>+90-897-678-44
			</div>

		</div>
	</div>
</header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal//img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
	<section class="menu-section">
        <div class="container">
		<div id="smoothmenu1" class="ddsmoothmenu" >
		   <?php
			if(Yii::app()->user->hasState('cedula') && Yii::app()->getSession()->get('id_modulo')!==""){
				Yii::app()->getClientScript()->registerScript('menuAjax','
					$(document).ready(function(){
						$.ajax({
							type: "post",
							url: "'.Yii::app()->createAbsoluteUrl('controlAp/menu').'",
							data: "id_modulo='.Yii::app()->getSession()->get('id_modulo').'",
							success: function(datos) {$(\'#smoothmenu1\').html(datos)},
							error: function(){
								
							}
						});	
					});
				');
			
			?>
		   <?php  } else {
			//echo Yii::app()->getSession()->get('menumodulo');
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Ingreso', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Inicio', 'url'=>array('/controlAp/index'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					
				),
			));}?>
			<br style="clear: left" />
		</div>
		</div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
		  <?php echo $content; ?>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/zontal/js/bootstrap.js"></script>
</body>
</html>
