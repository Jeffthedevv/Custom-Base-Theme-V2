<?php
/**
 * The template for displaying all single posts.
 *
 * @package Base Theme
 */

get_header(); ?>

<?php if ( have_posts() ) :

while ( have_posts() ) : the_post(); ?>

<section class="article-header">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-md-1 col-md-offset-5">
				<div class="side-button">
					<a href="<?php echo site_url(); ?>#ask"><i class="fa fa-envelope fa-3x"></i></a>
				</div>
				<div class="side-button">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook-square fa-3x"></i></a>
				</div>
				<div class="side-button">
					<a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter fa-3x"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container page single">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php get_template_part( 'content', 'single' );?>
		</div>
			<div style="margin-top: 20px;" class="col-md-1">
				<a href="<?php echo site_url(); ?>#ask">
					<div class="side-button">
						<i class="fa fa-envelope fa-3x"></i>
					</div>
				</a>
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
					<div class="side-button">
						<i class="fa fa-facebook-square fa-3x"></i>
					</div>
				</a>
				<a href="https://twitter.com/home?status=<?php the_permalink(); ?>">
					<div class="side-button">
						<i class="fa fa-twitter fa-3x"></i>
					</div>
				</a>
			</div>
	</div>
</div><!-- .container -->

<?php endwhile;

endif; ?>

<?php get_footer(); ?>