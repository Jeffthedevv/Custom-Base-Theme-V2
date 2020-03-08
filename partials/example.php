<!-- 

<?php if( have_rows('example') ): ;?>
    <?php while ( have_rows('example') ) : the_row(); ?>
        <?php if( get_row_layout() == 'photo' ): ; ?>
            <div class="col-sm-6 trivia-photo">
                <a href="<?php the_sub_field('article_link'); ?>" class="trivia-link">
                    <img src="<?php the_sub_field('image'); ?>" alt="" class="trivia-img">
                </a>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?> 




Pull Command 
<?php echo get_template_part('example' ); ?>

-->


