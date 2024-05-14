<?php get_header(); ?>
<section class="section home-hero">
  <div class="section__inner section__inner--centered">
	  <?php the_content(); ?>
  </div>
</section>
<section class="section gutters-display">
  <div class="section__inner gutters-display__inner">
    <h2 class="gutters-display__heading">Types of Gutters</h2>
    <div class="gutters-display__items-wrapper">
	    <?php
		    $args = array('post_type' => 'gutters', 'posts_per_page' => '3');
		    $myQuery = new WP_Query($args);
	    ?>
	    <?php if ($myQuery->have_posts()) : ?>
		    <?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
          <?php
			      $slug = get_post_field( 'post_name', get_the_ID() );
            $postLink = '/gutters/'.$slug;
          ?>
          <a href="<?php echo $postLink ?>" class="gutters-display__item">
            <div class="gutters-display__item-image"><?php echo the_post_thumbnail(); ?></div>
            <h3 class="gutters-display__item-title"><?php echo the_title(); ?></h3>
            <p class="gutters-display__item-caption"><?php echo the_post_thumbnail_caption(); ?></p>
          </a>
		    <?php endwhile;  wp_reset_postdata(); ?>
	    <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
