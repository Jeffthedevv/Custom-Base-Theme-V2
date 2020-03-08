<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Base Theme
 */
?>

</div>
<footer>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => 'nav navbar-nav nav-justified'); wp_nav_menu($args); ?> 
					
				</div>
			</nav> </div> 
		</div>
	</div>



<div class="sb-slidebar sb-right sb-style-push"> 
	<?php $args = array( 'menu' => 'mainnav', 'container' => false, 'menu_id' => false, 'menu_class' => false); wp_nav_menu($args); ?>
</div>


<?php wp_footer(); ?>

</body>
</html>
