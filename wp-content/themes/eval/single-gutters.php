<?php get_header(); ?>
<section class="section single-gutter-hero">
	<div class="section__inner single-gutter-hero__inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="single-gutter-hero__primary">
				<?php echo the_post_thumbnail(); ?>
			</article>
			<article class="single-gutter-hero__secondary">
				<h1 class="single-gutter-hero__title"><?php echo the_title(); ?></h1>
				<div class="single-gutter-hero__content"><?php	echo the_content(); ?></div>
			</article>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_footer(); ?>
