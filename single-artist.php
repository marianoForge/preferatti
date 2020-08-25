<?php
/* Template Name: Artist Page */
/* Template Post Type: artist */


?>
<?php get_header(); ?>
<main id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
				<h2>BIO</h2>
				<p>
					<?php echo get_field('biography'); ?>
				</p>
				<?php the_post_thumbnail(); ?>
				<h2>ART</h2>
				<p>
					<?php echo get_field('art'); ?>
				</p>
				<h3 class="text-uppercase">Other Available Painting from this artist</h3>
				<?php $pieces = get_field('piece'); ?>
				<?php if ($pieces) : ?>
					<div class="flex flex-wrap painting__wrapper space-x-6">
						<?php foreach ($pieces as $piece) : ?>
							<div class="w-12 lg:w-3/12 painting--item__wrapper">
								<a href="<?php echo get_permalink($piece->ID); ?>">

									<div class="painting__item" style="background-image: url(<?php echo get_the_post_thumbnail_url($piece->ID, 'thumbnail'); ?>)"></div>
									<?php echo get_the_title($piece->ID); ?>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</header>
	<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>