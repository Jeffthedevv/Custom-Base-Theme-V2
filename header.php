<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package  Base Theme
 */

get_header('opening');
?>

<header class="dtheader">

	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 col-sm-2 col-sm-offset-0">
				<a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>assets/img/logo.png" class="logo"></a>
			</div>
			<div class="col-sm-10">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => 'nav navbar-nav nav-justified'); wp_nav_menu($args); ?>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>


 <!-- <div class="gradient-border sb-slide">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6">
				<a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>assets/img/logo.png" alt=" "></a>
			</div>
			<div class="col-xs-6">
				<i class="fa fa-bars fa-3x sb-toggle-right"></i>
			</div>
		</div>
	</div> -->
</div> 

<div id="sb-site">