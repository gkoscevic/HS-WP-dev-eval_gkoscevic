<?php get_header(); ?>
<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php //get_template_part( 'entry' ); ?>
<?php //endwhile; endif; ?>
<?php
	$args = array('post_type' => 'gutters', 'posts_per_page' => '3');
	$myQuery = new WP_Query($args);
?>
<?php if ($myQuery->have_posts()) : ?>
	<?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
		<?php
      echo the_title();
      echo the_content();
      echo the_post_thumbnail();
    ?>
	<?php endwhile;  wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer(); ?>
